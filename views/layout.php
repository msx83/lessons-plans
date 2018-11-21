<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo $this->data['title'] ?? ''; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
    </head>

    <body>
        <header id="page-header">
            <div class="container">
                <h1>
                    <a href="<?php echo base_url(); ?>" title="E14 Szczegółowy plan zajęć">E14 Szczegółowy plan zajęć</a>
                </h1>
                <nav>
                    <ul>
                        <?php if (isset($_SESSION['logged_in'])) : ?>
                        <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Strona Główna</a></li>
                        <li><a href="<?php echo base_url('meetings');?>"><i class="fa fa-clock"></i> Zjazdy</a></li>
                        <li><a href="<?php echo base_url('lessons');?>"><i class="fa fa-book-open"></i> Lekcje</a></li>
                        <li><a href="<?php echo base_url('subjects');?>"><i class="fa fa-list"></i> Tematy</a></li>
                        <li><a href="<?php echo base_url('teachers');?>"><i class="fa fa-users"></i> Nauczyciele</a></li>
                        <li><a href="<?php echo base_url('logout');?>"><i class="fa fa-sign-out-alt"></i> Wyloguj</a></li>
                        <?php else: ?>
                        <li><a href="<?php echo base_url('login');?>"><i class="fa fa-sign-in-alt"></i> Zaloguj</a></li>
                        <?php endif;?>
                    </ul>
                </nav>
            </div>
        </header>
        <div id="main-content-tet">
            <?php echo $this->data['yield']; ?>
        </div>
        <footer id="page-footer">
            <div class="container">
                <p>Created by: <a href="mailto:marcin.msx@gmail.com">Marcin Snoch</a></p>
            </div>
        </footer>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src="<?php echo base_url('assets/js/script.js') ?>"></script>
    </body>

</html>