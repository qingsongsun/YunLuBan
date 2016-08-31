<?php
self::checkLogin();
$actionName='列表';
        //基本sql
        $sql="select * from ".self::$setting[table]." where 1";
        //条件过滤
        foreach (self::$setting[lists] as $l)
        if($_GET[$l[code]])
            $sql.=" and `$l[code]` like '".$_GET[$l[code]]."'";
        //默认排序
            $sql.=" order by id desc";
        //分页控制
        $data_total=getCount($sql);
        $page_total=ceil($data_total/self::$setting[page][everyPage]);
        $page=$_GET[page];
        if(!$page)$page=1;
        $limit=' limit '.(($page-1)*self::$setting[page][everyPage]).",".  self::$setting[page][everyPage];
        //获取数据
        $data=  getAll($sql.$limit);
$lists=  self::$setting[lists];
$filter=  self::$setting[filter];
//操作
$action=self::$setting[action];
include V.'common_list.php';