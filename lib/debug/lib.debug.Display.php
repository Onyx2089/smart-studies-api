<?php

class Display
{
    public static function print($data)
    {
        echo "#################" . PHP_EOL;

        var_export($data);

        echo  PHP_EOL . "#################" . PHP_EOL;
    }
}