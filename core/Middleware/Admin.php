<?php

namespace core\Middleware;

class Admin
{

    public function handle()
    {
        if ($_SESSION['role'] != "admin") {
            header("Location: /jguifgoieroigfq");
        }
    }
}
