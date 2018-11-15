<?php

class Database
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', DBUSER, DBPASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function login($email, $password)
    {
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_OBJ);
        if ($row) {
            if (password_verify($password, $row->password)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $row->username;
                return true;
            }
        }
    }

    public function getHours()
    {
        $res = $this->db->query('SELECT * FROM hours');
        return $res->fetchAll();
    }

    public function getAllLessons()
    {
        $sql = "SELECT l.id, m.date, h.start, h.end, s.name subject, t.full_name AS teacher
        FROM lessons AS l
        LEFT JOIN meetings AS m ON l.meeting_id=m.id
        LEFT JOIN hours AS h ON l.hour_id=h.id
        LEFT JOIN subjects AS s ON l.subject_id=s.id
        LEFT JOIN teachers AS t ON s.teacher_id=t.id
        ORDER BY l.id ASC";
        $res = $this->db->query($sql);
        return $res->fetchAll();
    }

    public function getAllLessonsByDate($from = null, $to = null)
    {
        $where = '';
        if ($from && $to) {
            $where = " WHERE m.date BETWEEN '$from' AND '$to' ";
        } elseif ($from) {
            $where = " WHERE m.date >= '$from' ";
        } elseif ($to) {
            $where = " WHERE m.date <= '$to' ";
        }
        $sql = "SELECT l.id, m.date, h.start, h.end, s.name subject, t.full_name AS teacher
        FROM lessons AS l
        LEFT JOIN meetings AS m ON l.meeting_id=m.id
        LEFT JOIN hours AS h ON l.hour_id=h.id
        LEFT JOIN subjects AS s ON l.subject_id=s.id
        LEFT JOIN teachers AS t ON s.teacher_id=t.id
        $where
        ORDER BY l.id ASC";
        $res = $this->db->query($sql);
        return $res->fetchAll();
    }

    public function getLessonsByMeetingId($id)
    {
        $sql = "SELECT l.id, m.date, h.start, h.end, s.name subject, t.full_name AS teacher
        FROM lessons AS l
        LEFT JOIN meetings AS m ON l.meeting_id=m.id
        LEFT JOIN hours AS h ON l.hour_id=h.id
        LEFT JOIN subjects AS s ON l.subject_id=s.id
        LEFT JOIN teachers AS t ON s.teacher_id=t.id
        WHERE m.id = $id
        ORDER BY h.id ASC";
        $res = $this->db->query($sql);
        return $res->fetchAll();
    }

    public function getTeacher($id)
    {
        $res = $this->db->prepare('SELECT * FROM teachers WHERE id=:id');
        $res->bindParam(':id', $id);
        $res->execute();
        return $res->fetch();
    }

    public function getTeachers()
    {
        $res = $this->db->query('SELECT * FROM teachers');
        return $res->fetchAll();
    }

    public function getSubjects()
    {
        $res = $this->db->query('SELECT * FROM subjects');
        return $res->fetchAll();
    }

    public function countSubjects()
    {
        $res = $this->db->query("SELECT s.`name` subject_name, t.full_name AS teacher, COUNT(l.id) AS hours_qty
        FROM subjects AS s
        LEFT JOIN lessons AS l ON l.subject_id=s.id
        LEFT JOIN meetings AS m ON l.meeting_id=m.id
        LEFT JOIN teachers AS t ON s.teacher_id=t.id
        GROUP BY s.id
        ORDER BY s.name");
        return $res->fetchAll();
    }

    public function getMeetings()
    {
        $res = $this->db->query("SELECT m.id, m.date, COUNT(hour_id) hours
        FROM meetings AS m
        LEFT JOIN lessons AS l ON l.meeting_id=m.id
        GROUP BY m.id");
        return $res->fetchAll();
    }

    public function getMeetingById($id)
    {
        $res = $this->db->prepare('SELECT * FROM meetings WHERE id=:id');
        $res->bindParam(':id', $id);
        $res->execute();
        return $res->fetch();
    }

    public function getMeetingByDate($date)
    {
        $res = $this->db->prepare('SELECT * FROM meetings WHERE date=:date');
        $res->bindParam(':date', $date);
        $res->execute();
        return $res->fetch();
    }

}
