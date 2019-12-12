<?php

namespace Factory;

use Factory\MatchesData;
use Factory\Dantri;
use Factory\Vietnamnet;
use Factory\Vnexpress;


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
