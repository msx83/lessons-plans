<?php

// base functions
function base_url($url = null)
{
    $base_url = rtrim(BASE_URL, '/');
    if ($url) {
        return $base_url . '/' . $url;
    }
    return $base_url . '/';
}

// html functions
function anchor($url = '', $name = null, $params = null)
{
    $url_out = rtrim($url, '/');
    $base_url = rtrim(BASE_URL, '/');
    if ($params) {
        return '<a href="' . $base_url . '/' . $url_out . '" '. $params .'>' . $name . '</a>';
    }
    
    return '<a href="' . $base_url . '/' . $url_out . '">' . $name . '</a>';
}
