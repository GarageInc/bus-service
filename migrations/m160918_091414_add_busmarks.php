<?php

use yii\db\Migration;

class m160918_091414_add_busmarks extends Migration
{
    public static $buses = array(
        "ANKAI",
        "AYATS",
        "BAW",
        "DAEWOO",
        "FOTON",
        "GOLDEN DRAGON",
        "HIGER",
        "HYUNDAI",
        "IRISBUS",
        "ISUZU",
        "IVECO",
        "JAC",
        "KIA",
        "KING LONG",
        "MERCEDES",
        "NEOPLAN",
        "OTOKAR",
        "SCANIA",
        "SETRA",
        "SOLARIS",
        "SUNLONG",
        "TEMSA",
        "TOYOTA",
        "TROLIGA",
        "VAN HOOL",
        "VDL",
        "VOLVO",
        "YUTONG",
        "ZHONGTONG",
        "ZONDA",
        "АВТО-ПРОФИ",
        "БЕЛКОММУНМАШ",
        "БОГДАН",
        "ВОЛЖАНИН",
        "ГОЛАЗ",
        "ЗИЛ",
        "КАВЗ",
        "КАМАЗ",
        "КРОНА",
        "ЛАЗ",
        "ЛИАЗ",
        "МАЗ",
        "МАЗ-МАН",
        "МАРЗ",
        "НЕМАН",
        "НЕФАЗ",
        "ОЛИМП",
        "ПАЗ",
        "ПРОМАВТО",
        "РОАЗ",
        "УРАЛ",
        "УРАЛ-КУПАВА",
        "УРАЛСПЕЦТРАНС"
    );

    public function safeUp()
    {
        foreach (self::$buses as $bus) {
            $this->insert("busmarks", [ "markname" => $bus, "is_deleted" => false]);
        }
    }

    public function safeDown()
    {
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
