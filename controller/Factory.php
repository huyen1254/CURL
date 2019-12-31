<?php
namespace controller;
use controllers\HomeController;
use FactoryMethod\Pagesfactory\PagesFactory;
use lib\Crawler;
use lib\Curl;


class Factory
    {    
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
                $factory = new PagesFactory();
                $database = new Database();
                $data = $database-> getFactory($dataParse,$factory);
                $database -> addToTheDatabase($data);
                
            }
        }
    }
    
    
?>
