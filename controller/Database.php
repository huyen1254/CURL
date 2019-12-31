<?php

namespace controller;

use Controller\Controller;
use FactoryMethod\InterfaceData;
use FactoryMethod\Pagesfactory\PagesFactory;

class Database extends Controller implements InterfaceData
{
    public function getFactory($dataPage, PagesFactory $page)
    {
        $keyPage = array(
            'vnexpress', 'vietnamnet', 'dantri'
        );

        foreach ($keyPage as $param) {
            if (preg_match("/$param/", $dataPage['host'])) {
                $page->html = $dataPage['html'];
                $website = $page->makeWebsite($param);
                $title = $website->getTitle();
                $date = $website->getDate();
                $content = $website->getContent();
            }
        }
        // echo data
        echo '<h2> ' . $title . '</h2> ' . $date  . '><br>' . $content;

        $data = [
            'host' => $dataPage['host'],
            'path' => $dataPage['path'],
            'title' => $title,
            'content' => $content,
            'date' => $date
        ];

        return $data;
    }

    public function addToTheDatabase($data)
    {
        $this->model->addPage($data['path'], $data['host'], $data['title'], $data['content'], $data['date']);
    }
}
