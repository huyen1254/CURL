<?php

namespace controller;

use model\ControlData;


class Factory extends Model
{
    public function getFactory($dataPage, PagesFactory $page)
    {   
        $keyPage = array(
            'vnexpress', 'vietnamnet', 'dantri'
        );
         //set Value for Pages
        foreach ($keyPage as $param) {
            if (preg_match("/$param/", $dataPage['host'])) {
                $page->html = $dataPage['html'];
                $website = $page->makeWebsite($param);
                $title = $website->getTitle();
                $date = $website->getDate();
                $content = $website->getContent();
            }
        }
        echo '<h2> ' . $title . '</h2> ' . $date . '><br>' . $content;

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
