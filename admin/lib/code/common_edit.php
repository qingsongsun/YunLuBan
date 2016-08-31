<?php
self::checkLogin();
if($_GET[id])
$data= getOne("select * from ".self::$setting[table]." where id=?",$_GET[id]);
        $edit=self::$setting[edit];
        if($add)
            $edit=self::$setting[add];
        include V.'common_edit.php';