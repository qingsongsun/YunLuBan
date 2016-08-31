 <?php

    
// $arr=array(
//     '云鲁班'=>array('无'=>array('123','456','789'),array('123','456','789'),array('123','456','789')),
//     '新世界'=>array(array('123','456','789'),array('123','456','789'),array('123','456','789')),
//     '宜家'=>array(array('123','456'))
// );

// $count=array();
// foreach ($arr as $key => $val)$count[]=$key;
// foreach ($count as $val){
//     echo $val;
// }

// $num=0;
// for ($i=0;$i<count($count);$i++){
//     foreach ($arr[$count[$i]] as $each){
//         if (is_array($each))$num++;
//     }
// }
// echo $num;
// session_start();
// $memberId=$_SESSION['memberId'];
//  $ids=unserialize($_COOKIE[$memberId.'shoppingCar']);
//  print_r($ids);
// //   var_dump($ids);
// //     echo $key;//."=>".$val."<br/>";
// foreach ($ids as $key => $val){
//     echo $key."=>".$val."<br/>";
//     foreach ($ids[$key] as $key1 => $val1){
//         echo $key1."=>".$val1."<br/>";
//     }    
// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<title>百度地图API自定义地图</title>
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<!-- <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script> -->
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>
  <!--百度地图容器-->
  <div style="width:717px;height:450px;border:#ccc solid 1px; margin-left:500px" id="dituContent"></div>
  <script src='../../public/js/map.js' type='text/javascript'></script>
</body>
        
</html>
