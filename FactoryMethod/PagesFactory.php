<?php

namespace FactoryMethod\Pagesfactory;


use FactoryMethod\Pages\Dantri;
use FactoryMethod\Pages\Vietnamnet;
use FactoryMethod\Pages\Vnexpress;

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
