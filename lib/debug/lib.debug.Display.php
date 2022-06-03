<?php

class Display
{
    public static function print($data)
    {
        echo "#################" . PHP_EOL;

        print_r($data);

        echo  PHP_EOL . "#################" . PHP_EOL;
    }
}