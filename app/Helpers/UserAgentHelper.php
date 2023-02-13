<?php

namespace App\Helpers;

class UserAgentHelper
{
    public static function substr($userAgent)
    {
        return substr($userAgent ?? '', 0, 255);
    }
}
