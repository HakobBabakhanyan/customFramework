<?php


function dd(...$attributes)
{
    echo '<pre>';
    var_dump(...$attributes);
    die;

}

function view($path, $variables = [])
{

    require __DIR__ . '/../Views/' . $path;
}

function check($array, $data)
{

    foreach ($array as $item) {
        if (empty($data[$item])) {
            return false;
        }
    }
    return true;
}

function auth()
{
    return isset($_SESSION['login']) && $_SESSION['login'];
}

function current_page()
{
    if (empty($_GET['page'])){
        return 1;
    }
    return $_GET['page'];
}
function get_order_params()
{
    if (isset($_GET['order_column']) && isset($_GET['order_direction'])){
        return "&order_column={$_GET['order_column']}&order_direction={$_GET['order_direction']}";
    }
    return null;
}