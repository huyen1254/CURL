<?php

namespace Controllers;

use Controller\Controller;
use FactoryMethod\Pagesfactory\PagesFactory;

class FactoryController extends Controller
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
        $this->model->addPage($data['path'], $data['host'], $data['title'], $data['content'], $data['image'], $data['date']);
    }
}
