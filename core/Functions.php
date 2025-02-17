<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "<pre>";
    die();
}

function getURI()
{
    return strtolower(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));
}

function messagesHandler()
{
    if (!isset($_SESSION['error'])) $_SESSION['error'] = "";
    if (!isset($_SESSION['success'])) $_SESSION['success'] = "";
}

function request_method()
{
    if (isset($_POST["method"])) return $_POST["method"];
    return $_SERVER['REQUEST_METHOD'];
}

function formatPreferences($preferences)
{
    $preferences = json_decode($preferences, true);
    if (is_string($preferences)) {
        return $preferences;
    }

    if (!is_array($preferences) || empty($preferences)) {
        return "No preferences set.";
    }

    $res = "";
    foreach ($preferences as $preference) {
        $res .= "$preference || ";
    }
    return $preferences[0];
}
