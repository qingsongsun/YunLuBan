<?php 
ini_set('short_open_tag', true);//启用短标签
session_start();//启用session
include 'frame.php';

/**
 * 例子
 */
//insert('test', array(id=>'11',test=>'22',name=>'33'));
//print_r(getOne("select * from test where id=?",array(11)));
//print_r(query("select * from test")->fetch_all(1));
//update(test, array(test=>8,name=>9), "id=?",'11');

