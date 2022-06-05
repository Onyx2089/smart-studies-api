<?php 

interface ModelProfil 
{
    const NAME = "NAME";
    const BIRTH = "BIRTH";
    const EMAIL = "EMAIL";
    const CURSUS = "CURSUS";
    const STAT = "STAT";

    const PROFIL_ARRAY = 
    [
        self::NAME,
        self::BIRTH,
        self::EMAIL,
        self::CURSUS,
        self::STAT
    ];
}