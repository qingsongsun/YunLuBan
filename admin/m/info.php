<?php

class info_M {

    static function get($code, $secondValue = null) {
        $infotypeId = getOne("select id from infotype where code='$code'")[id];
        foreach (getAll("select * from info where infotypeId='$infotypeId'") as $d) {
            if (!$secondValue)
                $new[$d[name]] = $d[value1];
            else
                $new[$d[name]] = array($d[value1], $d[value2]);
        }
        return $new;
    }

}
