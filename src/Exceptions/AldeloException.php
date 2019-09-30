<?php

namespace Luckykenlin\Aldelo\Exceptions;

use Exception;

class AldeloException extends Exception
{
    const SUCCESSFUL = 0;
    const NOT_FOUND = 10307;
    const ERROR_CODES = [
        10301,
        10302,
        10303,
        10304,
        10306,
        10307,
        10308,
        10309,
        10310,
        10311,
        10312,
        10313,
        10314
    ];
}