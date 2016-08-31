<?php
require 'frame.php';

if (is_uploaded_file($_FILES['icon']['tmp_name'])){
    $newFileName = 'upload/images/' . date('Ymdhis') . rand(0, 9999) . '.' . pathinfo($_FILES['icon']['name'])['extension'];
    copy($_FILES['icon']['tmp_name'], '../../' . $newFileName);
    $updateArray['icon'] = $newFileName;
    session_start();
    update(member,$updateArray , "id=?",$_SESSION['memberId']);
}
    
    header("Location: ../../v/smarty/common_set.php?a=head");
    exit();