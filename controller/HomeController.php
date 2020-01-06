<?php

namespace controllers;

class HomeController
{
    public function index()
    {
        include APP . "/View/header.php";
        include APP . "/View/index.php";
        include APP . "/View/footer.php";
        
    }
}
