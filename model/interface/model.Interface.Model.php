<?php

require_once __DIR__ . '/model.Interface.ModelClass.php';
require_once __DIR__ . '/model.interface.ModelProfil.php';
require_once __DIR__ . '/model.Interface.ModelProject.php';

interface Model
{
    const MODEL_CLASS = "class";
    const MODEL_PROFIL = "profil";
    const MODEL_PROJECT = "project";

    const MODEL_ARRAY = 
    [
        self::MODEL_CLASS => ModelClass::CLASS_ARRAY,
        self::MODEL_PROFIL => ModelProfil::PROFIL_ARRAY,
        self::MODEL_PROJECT => ModelProject::PROJECT_ARRAY
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

    /**
     * 
     */
    
    const NAME_ID = "ID";

    /**
     * 
     */

    const STAT_ADMIN = 1000;
    const STAT_STUDENT = 2000;

    const ARRAY_STAT = 
    [
        self::STAT_ADMIN,
        self::STAT_STUDENT
    ];

    const CURSUS_PRG = 3000;
    const CURSUS_MKT = 4000;

    const ARRAY_CURSUS = 
    [
        self::CURSUS_PRG,
        self::CURSUS_MKT
    ];
}
