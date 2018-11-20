<section class="container">
    <div class="boxes">
        <div class="box box-red">
            <div class="text"><i class="fas fa-calendar-alt"></i> <?php echo date('Y-m-d'); ?></div>
            <div class="description">Aktualna data</div>
        </div>
        <div class="box box-blue">
            <?php
            $data = $this->data['next_meeting']->date;
            $earlier = new DateTime();
            $later = new DateTime($data);
            $diff = $later->diff($earlier)->format("%a");
            ?>
            <div class="text"><i class="fas fa-business-time"></i> <?php echo $diff; ?></div>
            <div class="description">Dni do następnych zajęć</div>
        </div>
        <div class="box box-orange">
            <div class="text"><i class="far fa-clock"></i> <?php echo $this->data['count_hours']->hours ?></div>
            <div class="description">Godzin do końca kursu</div>
        </div>
        <div class="box box-green">
            <div class="text"><i class="far fa-calendar-check"></i> <?php echo $this->data['count_days']->meetings ?></div>
            <div class="description">Zjazdów do końca kursu</div>
        </div>
    </div>
</section>