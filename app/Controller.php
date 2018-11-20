<?php

class Controller
{
    protected $view;
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->view = new View;
    }
    
    public function index()
    {
        $this->_logged_in();

        $this->view->assign('title', 'Strona główna');
        $this->view->render('index');
    }

    public function lessons()
    {
        $this->_logged_in();

        $from = filter_input(INPUT_GET, 'from');
        $to = filter_input(INPUT_GET, 'to');

        if ($from !== '' && $to !== '') {
            $data = $this->db->getAllLessonsByDate($from, $to);
        } else if ($from !== '') {
            $data = $this->db->getAllLessonsByDate($from);
        } else if ($to !== '') {
            $data = $this->db->getAllLessonsByDate($to);
        } else {
            $data = $this->db->getAllLessons();
        }
        $this->view->assign('lessons', $data);
        $this->view->assign('title', 'Strona główna');
        $this->view->render('lessons');
    }

    public function meetings($id=null)
    {
        $this->_logged_in();
        
        $this->view->assign('title', 'Strona główna');
        if ($id) {
            $this->view->assign('lessons', $this->db->getLessonsByMeetingId($id));
            $this->view->render('meeting');
        } else {
            $this->view->assign('meetings', $this->db->getMeetings());
            $this->view->render('meetings');
        }
    }

    public function subjects()
    {
        $this->_logged_in();

        $this->view->assign('title', 'Tematy');
        $this->view->assign('subjects', $this->db->countSubjects());
        $this->view->render('subjects');
    }

    public function teachers()
    {
        $this->_logged_in();

        $this->view->assign('title', 'Nauczyciele');
        $this->view->assign('teachers', $this->db->getTeachers());
        $this->view->render('teachers');
    }

    // auth methods
    public function login()
    {
        $email = filter_input(INPUT_POST, 'login', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if (isset($email) && isset($password)) {
            if ($this->db->login($email, $password)) {
                unset($_SESSION['login_error']);
                header('location: index');
            }
            $_SESSION['login_error'] = 'Niepoprawny login lub hasło.<br>Spróbuj ponownie.';
        }
        
        $this->view->assign('title', 'Zaloguj');
        $this->view->render('login_form');
    }

    public function logout()
    {
        session_destroy();
        header('location: login');
    }

    public function _logged_in()
    {
        if (!isset($_SESSION['logged_in'])) {
            header('location: login');
        }
    }
    
    // error page
    public function error()
    {
        $this->view->error();
    }

}
