<?php

namespace Core;


use Core\Pages\Dantri;
use Core\Pages\Vietnamnet;
use Core\Pages\Vnexpress;

class PagesFactory
{
    public $html;

    function makeWebsite(string $param)
    {
        switch (strtolower($param)) {
            case 'vnexpress':
                return new Vnexpress($this->html);
                break;
            case 'vietnamnet':
                return new Vietnamnet($this->html);
                break;
            case 'dantri':
                return new Dantri($this->html);
                break;
            default:
                return null;
                break;
        }
    }
}
