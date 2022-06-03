<?php

require_once __DIR__ . '/model.Interface.ModelClass.php';

interface Model extends ModelClass
{
    const MODEL_CLASS = "class";
    const MODEL_PROJECT = "project";

    const MODEL_ARRAY = 
    [
        self::MODEL_CLASS,
        self::MODEL_PROJECT
    ];

    const TYPE_STRING = "string";
    const TYPE_INT = "int";

    const TYPE_ARRAY = 
    [
        self::TYPE_STRING,
        self::TYPE_INT
    ];
}
