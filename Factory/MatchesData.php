<?php

namespace Factory;

use Factory\MatchesData;
use Factory\Dantri;
use Factory\Vietnamnet;
use Factory\Vnexpress;


class PagesFactory
{
    

    function makeWebsite(string $param)
    {
        switch (strtolower($param)) {
            case 'vnexpress':
                return new Vnexpress;
                break;
            case 'vietnamnet':
                return new Vietnamnet;
                break;
            case 'dantri':
                return new Dantri;
                break;
            default:
                return null;
                break;
        }
    }
}
