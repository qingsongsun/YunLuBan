<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/5/18
 * Time: 19:29
 */
 
require 'frame.php';
session_start();
$memberId=checkLogin();
$shopping=unserialize($_COOKIE[$memberId.'shoppingCar']);       //购物车cookie

$c=$_POST['c'];
$s=$_POST['s'];
if (!empty($_POST['id'])){
$id=$_POST['id'];
$ids=$id.",";
}

if (!$c&&!$s)exit();


if ($c=='al'|$s=='dz'){                         //案例点赞
    $aldz=getOne("select like_pid from member where id=$memberId")[like_pid];
    $likes=getOne("select likes from projects_images_design where id=$id")[likes];

    if (strpos($aldz, $ids) !== false){
        $dz=str_replace(array($ids),"",$aldz);
        $dzs=$likes-1;
        $msg= 0;
    }else{
        $dz=$aldz.$ids;
        $dzs=$likes+1;
        $msg= 1;
    }

    update(projects_images_design,array('likes'=>$dzs) ,'id=?',$id );                //更改member表数据
    update(member,array('like_pid'=>$dz) ,'id=?',$memberId );                       //更改projects_images_design表数据
    echo json_encode(array('msg'=>$msg,'dzs'=>$dzs,'id'=>$id));

}elseif ($c=='al'&$s=='sc'){                    //案例收藏
    $alsc=getOne("select Pid_Ids from member where id=$memberId")[Pid_Ids];

    if (strpos($alsc,$ids) !==false){
        $sc=str_replace(array($ids),"",$alsc);
        $msg=0;
    }else{
        $sc=$alsc.$ids;
        $msg=1;
    }
    update(member,array('Pid_Ids'=>$sc) ,'id=?',$memberId );
    echo json_encode(array('msg'=>$msg,'id'=>$id));

}elseif ($c=='sjs'&$s=='yhdz'){                   //设计师点赞
    $sjsdz=getOne("select like_dg from member where id=$memberId")['like_dg'];
    $likes=getOne("select likes from designer where id=$id")['likes'];

    if (strpos($sjsdz, $ids)!==false){
        $dz=str_replace(array($ids),"",$sjsdz);
        $dzs=$likes-1;
        $msg= 0;
    }else{
        $dz=$sjsdz.$ids;
        $dzs=$likes+1;
        $msg= 1;
    }

    update(designer,array('likes'=>$dzs) ,'id=?',$id);
    update(member,array('like_dg'=>$dz) ,'id=?',$memberId);
    echo json_encode(array('msg'=>$msg,'dzs'=>$dzs,'id'=>$id));

}elseif ($c=='sjs'&$s=='sc'){                    //设计师收藏
    $sjssc=getOne("select dg_Ids from member where id=$memberId")['dg_Ids'];

    if (strpos($sjssc,$ids) !==false){
        $sc=str_replace(array($ids),"",$sjssc);
        $msg= 0;
    }else{
        $sc=$sjssc.$ids;
        $msg= 1;
    }
    update(member,array('dg_Ids'=>$sc) ,'id=?',$memberId);
    echo json_encode(array('msg'=>$msg,'id'=>$id));

}elseif ($c=='sc'&$s=='sjs'){                   //删除收藏设计师
    $dg_Ids=getOne("select dg_Ids from member where id=$memberId")[dg_Ids];
    $sc=str_replace(array($ids),"",$dg_Ids);
    update(member,array('dg_Ids'=>$sc) ,'id=?',$memberId );
    echo true;

}elseif ($c=='sc'&$s=='al'){                    //删除收藏案例
    $Pid_Ids=getOne("select Pid_Ids from member where id=$memberId")[Pid_Ids];
    $sc=str_replace(array($ids),"",$Pid_Ids);
    update(member,array('Pid_Ids'=>$sc) ,'id=?',$memberId );
    echo true;
    
}elseif ($c=='xm'&$s=='dd'){                //项目订单
    $phone=$_POST['phone'];
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $condition=$_POST['condition'];
    $village=$_POST['village'];
    $city=$_POST['city'];
    $addIn=$_POST['addIn'];
    $type=$_POST['type'];
    $Style=$_POST['Style'];
    $areas=$_POST['areas'];
    $setmeal=$_POST['setmeal'];

    if ($name) update(member,array('name'=>$name) ,'id=?',$memberId );

    $project=array(
        'memberId'=>$memberId,
        'sex'=>$sex,
        'newold'=>$condition,
        'resident'=>$village,
        'city'=>$city,
        'address'=>$addIn,
        'layout'=>$type,
        'type'=>$Style,
        'size'=>$areas,
        'package'=>$setmeal,
        'amount'=>$areas*$setmeal,
        'status'=>'未付款',
        'date'=>getOne("select now()")['now()'],
        'order_num'=>date('ymd').substr(time(),-5).substr(microtime(),2,5)
    );
    if(insert(projects, $project)){
        echo true;
    }
}elseif ($c=="mb"&&$s=="set"){                      //修改资料
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $date=$_POST['date'];
    
    $mb=array(
        'name'=>$name,
        'sex'=>$sex,
        'birthday'=>$date
    );

    if(update(member,$mb ,'id=?',$memberId )){
        echo "修改成功";
    }
    
}elseif ($c=="pwd"&&$s=="reset"){                   //修改密码
    $Oldpwd=$_POST['Password'];
    $NewPwd=$_POST['NewPassword'];
    
    $password=getOne("select password from member where id=$memberId")['password'];
    if ($password==md5($Oldpwd)){
        if (update(member, array('password'=>md5($NewPwd)), "id=?",$memberId)){
            echo json_encode(array('msg'=>'修改成功','boo'=>true));
            exit();
        }
            echo json_encode(array('msg'=>'修改失败'));
            exit();
    }else {
        echo json_encode(array('msg'=>'原密码错误'));
        exit();
    }
    
}elseif ($c=="address"&&$s=="add"){             //添加收货地址
    $add=$_POST['add'];
    $num=$_POST['num'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    
    //限制用户收货地址条数
    if (getOne("select count(id) as tale from address where memberId=$memberId")['tale'] > 10){
        echo "添加失败，收货地址最大为10条";
        exit();
    }
    
    //判断同一用户收货地址 电话号码是否同时重复
    $shdz=getAll("select address,phone,count(id) from address where memberId=$memberId");
    if ($shdz)foreach ($shdz as $val){
        if ($val['address']==$add&&$val['phone']==$phone){
            echo "请勿重复添加！";
            exit();
        }
    }
    
    $address=array(
        'address'=>$add,
        'post'=>$num,
        'name'=>$name,
        'memberId'=>$memberId,
        'phone'=>$phone
    );
    
   insert(address, $address);
   
}elseif ($c=="address"&&$s=="default"){           //设置默认收货地址
    update(address, array('default'=>0), "memberId=?", $memberId);
    if(update(address, array('default'=>1), "id=?",$id)){
        echo true;
        exit();
    }
    return false;
    exit();
    
}elseif ($c=="address"&&$s=="delete"){            //删除收货地址
    query ("delete from address where id=$id");
    
}elseif ($c=="address"&&$s=="modify"){          //修改收货地址
    $add=$_POST['add'];
    $num=$_POST['num'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    
    $address=array(
        'address'=>$add,
        'post'=>$num,
        'name'=>$name,
        'phone'=>$phone
    );
    
    update(address, $address, "id=?", $id);
    
 }
//elseif ($c=="firmOrder"&&$s=="getCookie"){                         //确认订单页面数据展示
//     $ids=$_POST['ids'];
//     $temp="";

//     $brand=getAll("select bdname from shoppingcar where id in ($ids) group by bdname");
//     $fl="";
//     if ($brand)foreach ($brand as $val){
//         $spxx="";
//         $spxq=getAll("select * from shoppingcar where id in ($ids) and bdname='$val[bdname]'");
//         if($spxq)foreach ($spxq as $val1){
//             $spxx.="<li class='spxx'>
//                         <i class='i-sp-img'><a href='../../?c=supermarket&a=showOne&id=$val1[productId]'><img src='../../$val1[src]'></a></i>
//                         <i class='i-sp-txt  i-qrsp-txt'><p><a href='../../?c=supermarket&a=showOne&id=$val1[productId]' class='spm' title='[$val1[bdname]] $val1[name]'> $val1[name]</a></p><p class='spxs'>$val1[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$val1[type]</a></p></i>
//                         <i class='i-sp-jg'><p class='p-xh'>$val1[marketPrice]</p><p class='spdj'>$val1[price]</p></i>
//                         <i class='i-sp-sl'><p class='i-sp-left' id='subtract' value='$val1[id]'>-</p><input type='text' rel='$val1[id]' name='spjs'  value='$val1[number]' class='i-sp-input spjs' autoComplete='off' /><p class='i-sp-right' id='add'  value='$val1[id]'>+</p></i>
//                         <i class='i-sp-xj '>".$val1[price]*$val1[number]."</i>
//                         <i class='i-sp-ps'>-</i>
//                         </li>";
//         }
//         $fl.="<div class='i-spz'>
//                     <div class='i-gwc-fb'><i class='i-checkbox-txt'>$val[bdname]</i></div>
//                     <ul class='i-gwc-ul i-qrsp-bg'>
//                     $spxx
//                     </ul></div>";
//     }else {
//         $fl="暂未选定商品";
//     }
//     echo $fl;
// }
elseif ($c=='scAjax'){                             //购物车（增减，删除）
    
    if ($s=="count"){                                //增减
        
        $res=getOne("select * from shoppingcar where id=$id");
        $bdname=$res['bdname'];
        $productId=$res['productId'];
        $type=$res['type'];
        $num=$_POST['num'];
        $kc=$_POST['kc'];
        $mess=1;
        
        update(shoppingcar, array('number'=>$num), 'id=?', $id);                       //更新数据库
        if (is_array($shopping[$bdname])&&count($shopping[$bdname])>0){     //更新cookie
            foreach ($shopping[$bdname] as $key=>&$val){
                if ($val['productId']==$productId && $val['type']==$type){
                    $val['number']=$num;
                    $mess=0;
                }
            }
         }else {
             unset($shopping[$bdname]);
         }
         
        if ($mess==1){
            $temp=array(
                'scId'=>$id,
                'name'=>$res['name'],
                'shortDesc'=>$res['shortDesc'],
                'price'=>$res['price'],
                'marketPrice'=>$res['marketPrice'],
                'type'=>$type,
                'number'=>$num,
                'src'=>$res['src'],
                'productId'=>$productId,
                'kc'=>$kc
            );
            $shopping[$res['bdname']][]=$temp;
        }
        $no=1;
        
    }elseif ($s=='delete'){                         //删除
        
        $ids=explode(',', $id);
        foreach ($ids as $i){
            query("delete from shoppingcar where id=$i and memberId=$memberId");//更新数据库
            foreach($shopping as $key=>&$val) {                                                         //更新cookie
                if (is_array($val)&&count($val)>0)foreach ($val as $k=>&$v){
                    if ($v['scId']==$i)unset($shopping[$key][$k]);
                }
            }
        }
        $no=2;
     }
    
    //删除没有数据的元素
    foreach ($shopping as $key => &$val){
        if (is_array($val)&&count($val)>0){
            foreach ($val as $k=>&$v){
                if (!is_array($v)||count($v)<=0){
                    unset($shopping[$key][$k]);
                }
            }
        }else {
            unset($shopping[$key]);
        }
    }
    
    setcookie($memberId.'shoppingCar', serialize($shopping), time()+2*7*24*3600);
    echo json_encode(array('msg'=>$no));
    
}elseif ($c=='sp'){                   
    $pp=$_POST['pp'];
    $name=$_POST['name'];
    $shortDesc=$_POST['shortDesc'];
    $price=$_POST['price'];
    $marketPrice=$_POST['marketPrice'];
    $type=trim($_POST['type']);
    $number=$_POST['number'];
    $src=$_POST['src'];
    $kc=$_POST['kc'];           //对应库存
 
    if ($s=='gwc'){                 //加入购物车
        //查询用户购物车商品是否存在
        $scId=0;
        $cart=getOne("select id,number from shoppingcar where productId='$id' and type='$type' and memberId='$memberId'");
        if ($cart){
            $scId=$cart['id'];
            update(shoppingCar,array('number'=>($cart[number]+$number)) ,'id=?',$scId );
        }else {
            $count=getOne("select count(id) as tale from shoppingcar where memberId='$memberId'")['tale'];
            if ($count>=99){
                echo "购物车商品过多，无法加入";
                exit();
            }
            $shoppingCar=array(
                'bdname'=>$pp,
                'name'=>$name,
                'shortDesc'=>$shortDesc,
                'price'=>$price,
                'marketPrice'=>$marketPrice,
                'type'=>$type,
                'number'=>$number,
                'src'=>$src,
                'productId'=>$id,
                'memberId'=>$memberId
            );
            insert(shoppingCar, $shoppingCar );
            $scId=getOne("select id from shoppingcar where productId=$id and type='$type' and memberId='$memberId'")['id'];
        }
        
    //    设置cookie
        $mess=1;
        $arr=$pp;
        if ($shopping[$arr]){
            foreach ($shopping[$arr] as $key=>&$val){
                if ($val['productId']==$id && $val['type']==$type){
                    $val['number']+=$number;
                    $mess=0;
                }
            }
         }
         
            if ($mess==1){
                $temp=array(
                    'scId'=>$scId,
                    'name'=>$name,
                    'shortDesc'=>$shortDesc,
                    'price'=>$price,
                    'marketPrice'=>$marketPrice,
                    'type'=>$type,
                    'number'=>$number,
                    'src'=>$src,
                    'productId'=>$id,
                    'kc'=>$kc
                );
                $shopping[$pp][]=$temp;
            }
            
//           setcookie($memberId.'shoppingCar',null);
          setcookie($memberId.'shoppingCar', serialize($shopping), time()+2*7*24*3600);
            echo "添加成功！";//.print_r($shopping).$type;
    }elseif ($s=='gm'){             //立即购买
        $ljgm=array(
                'bdname'=>$pp,
                'name'=>$name,
                'shortDesc'=>$shortDesc,
                'price'=>$price,
                'marketPrice'=>$marketPrice,
                'type'=>$type,
                'number'=>$number,
                'src'=>$src,
                'productId'=>$id,
                'memberId'=>$memberId,
                'kc'=>$kc
            );
        setcookie($memberId.'temp',serialize($ljgm));//, time()+2*7*24*3600);
    }
        
}elseif ($c=='order'&&$s=='submit'){                            //购物车========〉确认订单
    $addid=$_POST['addid'];                     //收货地址ID
    $freight=$_POST['freight'];                 //运费
    $score=$_POST['score'];                     //当前积分
    $integral=$_POST['integral'];               //使用积分
    $hdintegral=$_POST['hdintegral'];       //可获积分
    $money=$_POST['money'];                                                            //应付金额
    $beizhu=$_POST['beizhu'];                  //备注

    $dt=getOne("select now()")['now()'];                                              //订单时间
    $on=date('ymd').substr(time(),-5).substr(microtime(),2,5);               //订单编号
    $ids=rtrim($id, ',');
    $car=getAll("select * from shoppingcar where id in($ids)");
    $good=array();
    if ($car){
        //order表添加数据
        $ord=array(
            'order_num'=>$on,
            'date'=>$dt,
            'freight'=>$freight,
            'remarks'=>$beizhu,
            'integral'=>$integral,
            'hdintegral'=>$hdintegral,
            'money'=>$money,
            'addid'=>$addid,
            'status'=>0,
            'memberId'=>$memberId
        );
        insert(orders, $ord);
        
        //order_list表添加数据
        foreach ($car as $val){
            $ty=$val['type'];
            $good=array(
                'name'=>$val['name'],
                'shortDesc'=>$val['shortDesc'],
                'price'=>$val['price'],
                'marketPrice'=>$val['marketPrice'],
                'type'=>$ty,
                'number'=>$val['number'],
                'src'=>$val['src'],
                'productId'=>$val['productId'],
                'order_num'=>$on
            );
            insert(order_list, $good );
            
            //更新shoppingcar表数据
            query("delete from shoppingcar where id=$val[id] and memberId=$memberId");
            
            //product表更新数据
            if ($ty=='标准'){
                $stock=getOne("select stock from product where id=$val[productId]")['stock'];
                update(product, array('stock'=>($stock-$val['number'])), 'id=?',$val['productId']);
            }else {
                $pdi=getOne("select id,stock from product_images where productId=$val[productId] and name=$ty");
                update(product_images, array('stock'=>($pdi['stock']-$val['number'])), 'id=?',$pdi['id']);
            }
        }
            //member表更新数据
            update(member, array('score'=>($score-$integral)), 'id=?', $memberId);
    }
    echo $on;
    
}elseif ($c=='ljgm'&&$s=='submit'){                         //立即购买========〉确认订单
    $numb=$_POST['number'];                 //数量
    $addid=$_POST['addid'];                     //收货地址ID
    $freight=$_POST['freight'];                 //运费
    $score=$_POST['score'];                     //当前积分
    $integral=$_POST['integral'];               //使用积分
    $hdintegral=$_POST['hdintegral'];       //可获积分
    $money=$_POST['money'];                 //应付金额
    $beizhu=$_POST['beizhu'];                  //备注
    $dt=getOne("select now()")['now()'];                                              //订单时间
    $on=date('ymd').substr(time(),-5).substr(microtime(),2,5);               //订单编号
    
    $temp=unserialize($_COOKIE[$memberId.'temp']);
    if ($temp){
        //order表添加数据
        $ord=array(
            'order_num'=>$on,
            'date'=>$dt,
            'freight'=>$freight,
            'remarks'=>$beizhu,
            'integral'=>$integral,
            'hdintegral'=>$hdintegral,
            'money'=>$money,
            'addid'=>$addid,
            'status'=>0,
            'memberId'=>$memberId
        );
        insert(orders, $ord);
        
        $ty=$temp['type'];
        //order_list表添加数据
        $good=array(
            'name'=>$temp['name'],
            'shortDesc'=>$temp['shortDesc'],
            'price'=>$temp['price'],
            'marketPrice'=>$temp['marketPrice'],
            'type'=>$ty,
            'number'=>$numb,
            'src'=>$temp['src'],
            'productId'=>$temp['productId'],
            'order_num'=>$on
        );
        insert(order_list, $good );
        
        //product表更新数据
        if ($ty=='标准'){
            $stock=getOne("select stock from product where id=$temp[productId]")['stock'];
            update(product, array('stock'=>($stock-$numb)), 'id=?',$temp['productId']);
        }else {
            $pdi=getOne("select id,stock from product_images where productId=$temp[productId] and name=$ty");
            update(product_images, array('stock'=>($pdi['stock']-$numb)), 'id=?',$pdi['id']);
        }
        
        //member表更新数据
        update(member, array('score'=>($score-$integral)), 'id=?', $memberId);
    }
    setcookie($memberId."temp",null);
    echo $on;
    
}elseif ($c=='ordered'){
    if ($s=='qx'){
        //取消订单回复商品库存
        $goods=getAll("select type,number,productId from order_list where order_num=$id");
        if ($goods)foreach ($goods as $val){
            $ty=$val['type'];
            $nu=$val['number'];
            $pid=$val['productId'];
            if ($ty=='标准'){
                $stock=getOne("select stock from product where id=$pid")['stock'];
                update(product, array('stock'=>($stock+$nu)), 'id=?', $pid);
            }else {
                $pdi=getOne("select id,stock from product_images where productId=$pid and name=$ty");
                update(product_images, array('stock'=>($pdi['stock']+$nu)), 'id=?',$pdi['id']);
            }
        }
        
       //回复用户已使用积分
       $integral=getOne("select integral from orders where order_num=$id and memberId=$memberId")['integral'];
       $score=getOne("select score from member where id=$memberId")['score'];
       update(member, array('score'=>($score+$integral)), 'id=?',$memberId);
    }
    
    //删除订单
    query("delete from orders where order_num=$id and memberId=$memberId");
    //删除订单详细商品
    query("delete from order_list where order_num=$id");
    
}elseif ($c=='order'&&$s=='qrsh'){                  //确认收货
    update(orders, array('status'=>3), 'order_num=?',$id);
} elseif ($c=='lyb'&&$s=='tj'){
    $content=$_POST['txt'];
    $time=$_POST['time'];
    insert(message, array('mess'=>$content,'date'=>$time,'memberId'=>$id));
}


//检查登录
function checkLogin(){
    if(!$_SESSION['memberId']){
        echo "请先登录";
        exit();
    }else{
        return $_SESSION['memberId'];
    }
}