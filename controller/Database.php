<?php

namespace Controller;

use Controller\Controller;
use FactoryMethod\InterfaceData;
use FactoryMethod\Pagesfactory\PagesFactory;
use lib\Curl;

class Database extends Controller implements InterfaceData
{
   function __construct(Curl $curl, Database $databases, $webPages)
    {
        $this->curl = $curl;
        $this->database = $databases;
        $this->allWebPages = $webPages;
    }

    public function getConnectDatabase()
    {
        return $this->database->mysqlConnect();
    }

    public function parsePage($url)
    {
        $mysql_conn = $this->getConnectDatabase();
        //Parse URL and get Components
        $url_components = parse_url($url);
        if ($url_components === false) {
            die('Unable to Parse URL');
        }
        $url_host = $url_components['host'];
        $url_path = '';
        //Download Page
        $contents = $this->curl->_http($url);
        //Parse Contents
        $pages = $this->allWebPages;

        //set Value for Pages
        foreach ($pages as $key => $page) {
            if (preg_match("/$key/", $url_host)) {
                $page->html = $contents['body'];
                $page->connectDB = $mysql_conn;
                $page->host = $url_host;
                $page->path = $url_path;
                $page->Show();
            }
        }

        return true;
    }
}
