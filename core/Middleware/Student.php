<?php

namespace core\Middleware;

class Student{

    public function handle(){
        if ($_SESSION['role'] != "student") {
            header("Location: /homa10");
        }
    }
}