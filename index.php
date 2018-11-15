<?php
session_start();
require_once 'config.php';
require_once 'app/Functions.php';

require_once 'app/Bootstrap.php';
require_once 'app/Database.php';
require_once 'app/Controller.php';
require_once 'app/View.php';

$app = new Bootstrap;