<?php

self::checkLogin();
$id = $_POST[id];
if ($id) {
    $field = self::$setting[edit];
    $after=self::$setting[url][afterEdit];
} else {
    $field = self::$setting[add];
    $after=self::$setting[url][afterAdd];
    if(!$after)$after=self::$setting[url][afterEdit];
}

foreach ($field as $e) {
    if (!in_array($e[type], array('photo', 'file'))) {
        if (isset($_POST[$e[code]])) {
            if ($e[type] == 'pwd')
                $updateArray[$e[code]] = md5($_POST[$e[code]]);
            else
                $updateArray[$e[code]] = $_POST[$e[code]];
        }
    }

    if (in_array($e[type], array('photo', 'file'))) {
        if ($_FILES[$e[code]][name]) {
            $newFileName = 'upload/images/' . date('Ymdhis') . rand(0, 9999) . '.' . pathinfo($_FILES[$e[code]][name])[extension];
            copy($_FILES[$e[code]][tmp_name], '../' . $newFileName);
            $updateArray[$e[code]] = $newFileName;
        }
    }
}
if ($id)//更新
    update(self::$setting[table], $updateArray, "id=?", $id);
else//新增
    insert(self::$setting[table], $updateArray);
header("location:" .$after);
