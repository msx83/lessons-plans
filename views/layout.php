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
        <header id="top-bar">
            <div class="container">
                <h1 class="brand">
                    <a href="<?php echo base_url(); ?>" title="E14 Szczegółowy plan zajęć">E14 Szczegółowy plan zajęć</a>
                </h1>
                <nav class="main-nav">
                    <ul>
                        <?php if(isset($_SESSION['logged_in'])): ?>
                        <li><a href="<?= base_url(); ?>"><i class="fas fa-home"></i> Strona Główna</a></li>
                        <li><a href="<?= base_url('meetings'); ?>"><i class="fas fa-clock"></i> Zjazdy</a></li>
                        <li><a href="<?= base_url('lessons'); ?>"><i class="fas fa-book-open"></i> Lekcje</a></li>
                        <li><a href="<?= base_url('subjects'); ?>"><i class="fas fa-list"></i> Tematy</a></li>
                        <li><a href="<?= base_url('teachers'); ?>"><i class="fas fa-users"></i> Nauczyciele</a></li>
                        <li><a href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> Wyloguj</a></li>
                        <?php else: ?>
                        <li><a href="<?= base_url('login'); ?>"><i class="fas fa-sign-in-alt"></i> Zaloguj</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
        <?php echo $this->data['yield']; ?>
        <footer id="page-footer">
            <div class="container">
                <p>Created by: Marcin Snoch</p>
            </div>
        </footer>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src="<?php echo base_url() ?>assets/js/script.js"></script>
    </body>

</html>