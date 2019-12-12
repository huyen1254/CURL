<?php

namespace core;

use lib\Crawler;
use lib\Curl;
use controller\controller;
use controller\Factory;
use Factory\MatchesData;

class FactoryProducer
    public function __construct()
    {
        //Show Index
        $page = new controller();
        $page->index();

        $this->getData();
    }

    public function getData()
    {
        if (isset($_POST['submit'])) {
            $urlPages = $_POST['urlPages'];
            if (empty($urlPages)) {
                die("Error: Please Enter the Website URL<br> ");
            }
            if (!filter_var($urlPages, FILTER_VALIDATE_URL)) {
                die("Url not fount");
            }

            $curl = new Curl();
            $crawler = new Crawler($curl);
            $dataParse = $crawler->parsePage($urlPages);

            $factory = new MatchesData();
            $factoryController = new factory();

            $data = $factoryController->getFactory($dataParse, $factory);
            $factoryController->addToTheDatabase($data);
        }
    }
}
