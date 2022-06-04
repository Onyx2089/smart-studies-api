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

    /**
     * 
     */

    const TYPE_STRING = "string";
    const TYPE_INT = "int";
    const TYPE_DATE = "DATE";
    const TYPE_DATE_TIME = "DATE_TIME";

    const TYPE_ARRAY = 
    [
        self::TYPE_STRING,
        self::TYPE_INT,
        self::TYPE_DATE,
        self::TYPE_DATE_TIME
    ];

    /**
     * 
     */

    const WER_EQ = "eq";
    const WER_GT = "gt";
    const WER_LT = "lt";

    const WER_ARRAY = 
    [
        self::WER_EQ,
        self::WER_GT,
        self::WER_LT,
    ];
}
