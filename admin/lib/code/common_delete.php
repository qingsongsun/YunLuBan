<?php
self::checkLogin();
if($_GET[id])
            query ("delete from ".self::$setting[table]." where id={$_GET[id]}");
        header("location:" . self::$setting[url][afterDelete]);