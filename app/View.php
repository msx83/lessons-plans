<?php

class View
{
    protected $data = array();

    public function assign($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function render($view_name)
    {
        ob_start();
        require('views/' . $view_name . '.php');
        $this->data['yield'] = ob_get_clean();
        require_once 'views/layout.php';
    }

    public function error()
    {
        require_once 'views/error.php';
    }

}
