<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    global  $left;
    
    session_start();
    $id=$_SESSION['memberId'];
    $shopping=unserialize($_COOKIE[$id.'shoppingCar']);
    
    $content=null;

    $title="我的购物车-会员中心";
    
    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
               <link rel='stylesheet'  type='text/css' href='../../public/css/i_style.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/jquery.cookie.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script src='../../public/js/selector.js' type='text/javascript'></script>
                    <script src='../../public/js/method.js' type='text/javascript'></script>
                    <script src='../../public/js/pct.js' type='text/javascript'></script>
                    <script src='../../public/js/click.js' type='text/javascript'></script>";
    
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
        
        if ($action=='shoppingCar'){
            $count=0;
            $keys=array();
            $num=getOne("select count(id) as num from shoppingCar where memberId=$id")['num'];
            
            if ($shopping){
                //用于判断缓存商品数量与数据库是否一致
                $scid=array();
                foreach ($shopping as $key => $val)$keys[]=$key;        //得到所有key值

                foreach ($keys as $val){
                    if(is_array($shopping[$val])){
                        foreach ($shopping[$val] as $val1){
                            if (is_array($val1)&&count($val1)>0){
                                $count++;
                                $scid[]=$val1['scId'];
                            }
                        }
                    }
                }
            }
            //用于判断缓存商品是否存在数据库
            $ss=getAll("select id from shoppingcar where memberId=$id");
            if ($ss)foreach ($ss as $v){
                $sss.=($v['id'].',');
            }
            $me=1;
            if($scid)foreach ($scid as $i){
                    if (!strpos($sss, $i))$me=0;
            }
            
            if ($count==$num&&$me==1){
                foreach ($keys as $val){
                    $jtsp="";
                    if (is_array($shopping[$val])&&count($shopping[$val])>0){
                        foreach ($shopping[$val] as $val1){
                            $jtsp.="<li  class='spxx' value='$val1[scId]'>
                                    	  	<i class='i-checkbox-txt'><div class='checkbox-1 i-gwc-sp-checkbox'>
                                      		<input type='checkbox' class='sp' />
                                    	  	<label ></label></div></i>
                                    	  	<i class='i-sp-img'><a href='../../?c=supermarket&a=showOne&id=$val1[productId]'><img src='../../$val1[src]'></a></i>
                                    	  	<i class='i-sp-txt '><p><a href='../../?c=supermarket&a=showOne&id=$val1[productId]' class='spm'  title='[$val] $val1[name]'> $val1[name]</a></p><p class='spxs'>$val1[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$val1[type]</a></p></i>
                                    	  	<i class='i-sp-jg'><p class='p-xh'>$val1[marketPrice]</p><p class='spdj'>$val1[price]</p></i>
                                    	  	<i class='i-sp-sl'><p class='i-sp-left button' id='subtract' rel='-' >-</p><input type='text' name='spjs'  value='$val1[number]' class='i-sp-input spjs' autoComplete='off' /><p class='i-sp-right button' id='add' rel='+'>+</p></i>
                                    	  	<i class='spkc' style='display: none;'>$val1[kc]</i>
                                    	  	<i class='i-sp-xj '>".$val1[price]*$val1[number]."</i>
                                    	  	<i class='i-sp-ico'><a href='javascript:void(0)' class='shanchu'>删除</a></i>
                                    	</li>";
                            }
                        $sp.="<span class='i-spz'><div class='i-gwc-fb'><i class='i-checkbox-txt'><div class='checkbox-1 h35'>
                        <input type='checkbox' class='pp' />
                        <label ></label></div>$val</i></div>
                        <ul class='i-gwc-ul'>
                        $jtsp
                        </ul></span>";
                    }
                }
            }else {
                $shopping=array();
                $brand=getAll("select bdname from shoppingCar where memberId=$id group by bdname");
                if ($brand)foreach ($brand as $val){
                    $shopping[]=$val['bdname'];
                    $shop=getAll("select sc.* from shoppingCar sc where sc.memberId=$id and bdname='$val[bdname]'");
                    $jtsp="";
                    if ($shop)foreach ($shop as $val1){
                        $kc=getOne("select pdi.stock from shoppingcar sc,product_images pdi where pdi.productId=sc.productId and sc.type=pdi.name and pdi.name='$val1[type]'")['stock'];
                        if (trim($val1['type'])=='标准'){
                            $kc=getOne("select stock from product where id='$val1[productId]'")['stock'];
                        }
                            $jtsp.="<li  class='spxx' value='$val1[id]'>
                                	  	<i class='i-checkbox-txt'><div class='checkbox-1 i-gwc-sp-checkbox'>
                                  		<input type='checkbox' class='sp' />
                                	  	<label ></label></div></i>
                                	  	<i class='i-sp-img'><a href='../../?c=supermarket&a=showOne&id=$val1[productId]'><img src='../../$val1[src]'></a></i>
                                	  	<i class='i-sp-txt '><p><a href='../../?c=supermarket&a=showOne&id=$val1[productId]' class='spm'  title='[$val1[bdname]] $val1[name]'> $val1[name]</a></p><p class='spxs'>$val1[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$val1[type]</a></p></i>
                                	  	<i class='i-sp-jg'><p class='p-xh'>$val1[marketPrice]</p><p class='spdj'>$val1[price]</p></i>
                                	  	<i class='i-sp-sl'><p class='i-sp-left button' id='subtract' rel='-' >-</p><input type='text' name='spjs'  value='$val1[number]' class='i-sp-input spjs' autoComplete='off' /><p class='i-sp-right button' id='add' rel='+'>+</p></i>
                                	  	<i class='spkc' style='display: none;'>$kc</i>
                                	  	<i class='i-sp-xj '>".$val1[price]*$val1[number]."</i>
                                	  	<i class='i-sp-ico'><a href='javascript:void(0)'  class='shanchu'>删除</a></i>
                                	</li>";
                            $temp=array(
                                                    'scId'=>$val1['id'],
                                                    'name'=>$val1['bdname'],
                                                    'shortDesc'=>$val1['shortDesc'],
                                                    'price'=>$val1['price'],
                                                    'marketPrice'=>$val1['marketPrice'],
                                                    'type'=>$val1['type'],
                                                    'number'=>$val1['number'],
                                                    'src'=>$val1['src'],
                                                    'productId'=>$val1['productId'],
                                                    'kc'=>$kc
                                                );
                            $shopping[$val['bdname']][]=$temp;
                    }
                    
                    $sp.="<span class='i-spz'><div class='i-gwc-fb'><i class='i-checkbox-txt'><div class='checkbox-1 h35'>
                    <input type='checkbox' class='pp' />
                    <label ></label></div>$val[bdname]</i></div>
                    <ul class='i-gwc-ul'>
                    $jtsp</ul></span>";
                }
                setcookie($id.'shoppingCar', serialize($shopping), time()+2*7*24*3600);
            }
            
            $content="<div class='i-web'>
                            $left
                            <div id='body' class='gwc'></div>
                            <div class='i-right'>
                            <div class='i-bt'>我的购物车<P>全部商品<i class='gwc-spjs'></i></P></div>
                            <div class='i-lc'><a class='ico-on'><span class='i-ico'>1</span>查看购物车</a><a>-------</a><a><span class='i-ico'>2</span>确认订单</a><a>-------</a><a><span class='i-ico'>3</span>付款并完成下单</a></div>
                            <div class='i-nr i-gwc'>
                            	<span class='i-gwc-bt'>
                            		<i class='i-checkbox-txt'><div class='checkbox-1'>
                              		<input type='checkbox' ' id='qx'  class='qx' />
                            	  	<label for='qx'></label></div>全选</i>
                            		<i>商品信息</i>
                            		<i>单价(元)</i>
                            		<i>数量</i>
                            		<i>小计(元)</i>
                            		<i>操作</i>
                            	</span>
                            	   $sp
                                </div>
                                <div class='i-nr i-gwc-zj'>
                                <i class='i-spjs-qx'><div class='checkbox-1 i-spjs-checkbox'>
                                <input type='checkbox'  id='qx'  class='qx'  />
                                <label for='qx'></label></div>全选</i>
                                <a href='javascript:void(0);' class='checkbox-delete'>删除</a>
                                <p class='i-spjs-yx'>已选商品<i>0</i>件</p>
                                <p class='i-spjs-hj'>合计(不含运费):<i class='hjzj'>￥0.00</i></p>
                                <a href='../../?c=admin&a=firmOrder' class='i-spjs-js ' onclick='return gwcsubmit();'>结算</a>
                                </div>
                                </div>
                                </div>";
            
        }elseif ($action=='order'){
            $sta=$_GET['sta'];
            $where="";
            if ($sta==1)$where="and status=0";
            
            $orders=getAll("select id,date_add(date, interval 3 day) as enddate,date,order_num,money,freight,status from orders where memberId=$id $where");
            $order="";
            if ($orders)foreach ($orders as $val){
                $vaw="";
                $ys="";
                if ($val['status']==0){
                    $ys="i-spdd-wf";
                    $vaw="<div class='checkbox-1 h35'>
                                <input type='checkbox'  id='order$val[id]'  class='selector-button'/>
                                <label for='order$val[id]'></label></div>";
                    
                    $status="<i class='i-spdd-zt '>
                    <p class='status'>待付款</p>
                    <p class='pon end-time label' endTime='$val[enddate]'>
                    订单取消
                    </p></i>
                    <i class='i-spdd-fk operate'><input  type='submit' value='立即支付'  class='spdd_json' rel='f' />
                    <a class='quxiaodd spdd_json' href='javascript:void(0)' rel='q'>取消订单</a>
                    </i>";
                }elseif ($val['status']==1){
                    $status="<i class='i-spdd-zt '>
                    <p class='status'>已支付</p>
                    <p class='pon end-time label' endTime='' >商家未发货</p></i>
                    <i class='i-spdd-fk operate'><input  type='submit' value='提醒商家' class='spdd_json' rel='t' /></i>";
                }elseif ($val['status']==2){
                    $status="<i class='i-spdd-zt '>
                    <p class='status'>已支付</p>
                    <p class='pon end-time label' endTime='' >商家已发货</p></i>
                    <i class='i-spdd-fk operate'><input  type='submit' value='确认收货'  class='spdd_json' rel='s'/></i>";
                }elseif ($val['status']==3){
                    $status="<i class='i-spdd-zt '>
                    <p class='status'>已收货</p>
                    <p class='pon end-time label'  endTime='' >交易成功</p></i>
                    <i class='i-spdd-fk operate'><input  type='submit' value='删除' class='aon spdd_json' rel='c' /></i>";
                }
                
                $good="";
                $goods=getAll("select productId,src,name,shortDesc,type,marketPrice,price,number from order_list where order_num=$val[order_num]");
                if ($goods)foreach ($goods as $val1){
                    $good.="<i >
                                <div class='i-spdd-img'><a href='../../?c=supermarket&a=showOne&id=$val1[productId]'><img src='../../$val1[src]'></a></div>
                                <div class='i-spdd-txt'><p><a href='../../?c=supermarket&a=showOne&id=$val1[productId]' class='spm'>$val1[name]</a></p><p class='spxs'>$val1[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$val1[type]</a></p></div>
                                <div class='i-spdd-dj'><p class='p-xh'>".$val1['marketPrice']*$val1['number']."</p><p>".$val1['price']*$val1['number']."</p></div>
                                <div class='i-spdd-sls'>$val1[number]</div>
                                </i>";
                }
                $order.="<li class='$ys commodity-order' value='$val[order_num]'>
                            <span class='i-spdd-lispan1  '>
                            <i class='i-checkbox-txt'>
                            $vaw
                            <p class='rise-time'>$val[date]</p></i>
                            <P class='order-number'>订单编号:$val[order_num]</P>
                            </span>
                            <span class='i-spdd-lispan2 order-information '>
                            <span class='i-spdd-lileft commodity-information '>
                            $good
                            </span>
                            <span class='i-spdd-liright order-status '>
                            <i class='i-spdd-zj '><p class='price '>$val[money]</p><p class='freight '>运费($val[freight])</p></i>
                            $status
                            </span>
                            </span>
                            </li> ";
                
            }
            
           

            $content="<div class='i-web'>
                            $left
                            <div id='body' class='spdd'></div>
                            <div class='i-right'>
                            <div class='i-bt'>我的订单</div>
                            <div class='i-lc'><a href='../../?c=admin&a=mall_order' class='ico-on' style='margin-right: 45px !important;'>所有订单</a><a  href='common_mall.php?a=order&sta=1'>待付款</a></div>
                            <div class='i-spdd-bt'>
                            	<i>商品信息</i>
                            	<i>单价(元)</i>
                            	<i>数量</i>
                            	<i>实付总价(元)</i>
                            	<i>交易状态</i>
                            	<i>操作</i>
                            </div>
                            <div class='i-spdd-ul'>
                            	<ul>
                            	$order
                            	</ul>
                            </div>
                            <div class='i-nr i-spdd-hp'>
                            <i class='i-spjs-qx'><div class='checkbox-1 i-spdd-checkbox'>
                            <input type='checkbox' value='3' id='check-all'class='check-all' />
                            <label for='check-all'></label></div>全选</i>
                            <p class='i-spdd-yx'>已选合拼订单<i class='joint-order'>0</i>件</p>
                            <p class='i-spdd-hj'>合拼后总需要支付价钱:<i class='need-price '>￥0.00</i></p>
                            <a href='#gwc-qrdd.html' class='i-spdd-js together '>合拼付款</a>
                            </div>
                            </div>
                            </div>";
        }elseif ($action=='address'){
            $num=getOne("select count(id) as num from address where memberId=$id")[num];
            
            $res=getAll("select * from address where memberId=$id");
            if ($res)foreach ($res as $val){
                $default="off";
                if ($val['default']==1){
                    $default="on";
                }
                $dz.="<li value='$val[id]' class='xxadd'> 
                          <i class='name'>$val[name]</i>
                          <i  class='add' title='$val[address]'>$val[address]</i>             
                          <i class='bm' >$val[post]</i>
                          <i class='num' >$val[phone]</i>
                          <i><a href='javascript:void(0)' class='xiugaiOn'>修改</a>|<a href='javascript:void(0)' class='delete'>删除</a>|<a href='javascript:void(0)'class='moren' rel='$default'></a></i>
                          </li>";
            }
            
            $content="<div class='i-web'>
                            $left
                            <div id='body' class='shdz'></div>
                            <div class='i-right'>
                            <div class='i-bt'>收货地址</div>
                            <div class='i-lc'><a href='javascript:void(0)' class='ico-on' style='margin-right: 45px !important;'>新增收货地址</a></div>
                            <div class='i-shdz-bg'>
                            	
                            <ul class='tjdz i-shlrjq-xjdz selectint' style='display: block; width: 858px;'>
                        	<li class='cityint'><p>所在地区</p>
                        	<dl class='select tjdz-select'>
                        		<dt class='province' rel='0'>选择省份</dt>
                        		<dd style='display: none;'>
                        			<ul class='province-ul'>
                        			
                        			</ul>
                        		</dd>
                        	</dl>
                        	
                            <dl class='select tjdz-select'>
                        		<dt class='city'>选择城市</dt>
                        		<dd style='display: none;'>
                        			<ul class='city-ul'>
                        				
                        			</ul>
                        		</dd>
                        	</dl>
                        	
                        	<dl class='select tjdz-select'>
                        		<dt class='township'>选择镇区</dt>
                        		<dd style='display: none;'>
                        			<ul class='township_ul'>
                        			
                        			</ul>
                        		</dd>
                        	</dl>
                        		</li>
                        		
                            <li class='add-play'><p>详细地址</p><input type='text' name='shdz' value='' class='add'/></li>
                        	<li class='num-play'><p>邮政编号</p><input type='text' name='shdz' value='' class='num'/></li>
                        	<li class='name-play'><p>收货人姓名</p><input type='text'  name='shdz' value='' class='name'/></li>
                        	<li class='ipone-play'><p>手机</p><input type='text' name='shdz' value='' class='phone'/></li>
                        	<a href='javascript:void(0)' class='qrdz'>确认地址,并使用地址</a>
                        </ul>
                                                    	
                                                    	
                                                    </div>
                                                    <div class='i-shdz-sl'><p>已保存了<i>$num</i>条地址</p></div>
                                                    <div class='i-shdz-dz'>
                                                    	<span class='i-shdz-dzbt'>
                                                    				<i>收货人</i>
                        		<i>收货地址</i>
                        		<i>邮政编码</i>
                        		<i>手机号码</i>
                        		<i>操作</i>
                                                    	</span>
                                                    	<ul class='i-shdz-dzul'>
                                                    	    $dz
                                                    	</ul>
                                                    	
                                                    </div>
                                                    <div class='xiugai' value=''>
                        <div class='xgbiaoti'>修改该收货地址</div>	
                        <ul class='xiugaidz selectint' style='display: block; width: 858px;'>
                        	<li  class='cityint'><p>所在地区</p>
                        	<dl class='select tjdz-select'>
                        		<dt class='province' rel='0'>选择省份</dt>
                        		<dd style='display: none;'>
                        			<ul class='province-ul'>
                        				
                        			</ul>
                        		</dd>
                        	</dl>
                        	
                        	<dl class='select tjdz-select'>
                        		<dt class='city'>选择城市</dt>
                        		<dd style='display: none;'>
                        			<ul class='city-ul'>
                        				
                        			</ul>
                        		</dd>
                        	</dl>
                        	
                        	<dl class='select tjdz-select'>
                        		<dt class='township'>选择镇区</dt>
                        		<dd style='display: none;'>
                        			<ul class='township_ul'>
                        				
                        			</ul>
                        		</dd>
                        	</dl>
                        		</li>
                        		
                            <li class='add-play'><p>详细地址</p><input type='text' name='shdz' value='' class='add'/></li>
                        	<li class='num-play'><p>邮政编号</p><input type='text' name='shdz' value='' class='num'/></li>
                        	<li class='name-play'><p>收货人姓名</p><input type='text'  name='shdz' value='' class='name'/></li>
                        	<li class='ipone-play'><p>手机</p><input type='text' name='phone' value='' class='phone'/></li>
                        </ul>
                        <a href='javascript:void(0)' class='xgqrdz'>确认修改</a><a href='javascript:void(0)' class='xiugaiOff'>取消</a>		
                        		
                        </div>
                                                    </div>
                                                    </div>";
                   }elseif ($action=='firmOrder'){
                       //收货地址
                       $default=getOne("select id,name,phone,address from address where memberId=$id and `default`=1");
                       $address=getAll("select id,name,phone,address from address where memberId=$id order by `default` desc");
                       $shdz="";
                       if ($address)foreach ($address as $val){
                           $shdz.="<li><a href='javascript:void(0)' value='$val[id]'><p class='name' >收货人: $val[name]</p><p class='num' >联系电话: $val[phone]</p><p class='add'>收货地址: $val[address]</p></a></li>";
                       }
                       $freight=0;
                       $cl="gwc-qrdd";
                       $an="<a href='../../?c=admin&a=mall_shoppingCar'>返回修改订单</a>";
                       
                       if ($_GET[pdt]=="sale"){
                           
                            $temp=unserialize($_COOKIE[$id.'temp']);
                            $freight=getOne("select freight from product where id=$temp[productId]")['freight']*$temp['number'];
                            $fl="<div class='i-spz'>
                                            <div class='i-gwc-fb'><i class='i-checkbox-txt'>$temp[bdname]</i></div>
                                            <ul class='i-gwc-ul i-qrsp-bg'>
                                                <li class='spxx' value=''>
                                                    <i class='i-sp-img'><a href='../../?c=supermarket&a=showOne&id=$temp[productId]'><img src='../../$temp[src]'></a></i>
                                                    <i class='i-sp-txt  i-qrsp-txt'><p><a href='../../?c=supermarket&a=showOne&id=$temp[productId]' class='spm' title='[$temp[bdname]] $temp[name]'> $temp[name]</a></p><p class='spxs'>$temp[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$temp[type]</a></p></i>
                                                    <i class='i-sp-jg'><p class='p-xh'>$temp[marketPrice]</p><p class='spdj'>$temp[price]</p></i>
                                                    <i class='i-sp-sl'><p class='i-sp-left' id='subtract' value=''>-</p><input type='text' rel='' name='spjs'  value='$temp[number]' class='i-sp-input spjs' autoComplete='off' /><p class='i-sp-right' id='add'  value=''>+</p></i>
                                                    <i class='spkc' style='display: none;'>$temp[kc]</i>
                                                    <i class='i-sp-xj '>".$temp['price']*$temp['number']."</i>
                                                    <i class='i-sp-ps'>-</i>
                                                </li>
                                            </ul></div>";
                            $cl="qrdd";
                            $an="<a href='javascript:void(0)'></a>";
                            
                       }else {
                                    $ides=$_COOKIE['selected'];
                                    if ($ides==''){
                                        header("Location: common_mall.php?a=shoppingCar");
                                        exit();
                                    }
                                    $ids=explode(',', $ides);
                                    
                                    
                                    
                                    //商品信息
                                    /*  确认订单从缓存读取不安全！*/
//                                     if (is_array($shopping)&&count($shopping)>0){
//                                         //从缓存读取数据
//                                         foreach ($shopping as $key => &$val){
//                                             if (!is_array($val)||count($val)<=0){
//                                                 unset($shopping[$key]);
//                                             }
//                                         }
                                        
//                                         foreach ($shopping as $key=>$val){
//                                             $spxx="";
//                                             if (is_array($val)&&count($val)>0)foreach ($val as $key1=>$val1){
//                                                     foreach ($ids as $v){
//                                                         if ($val1['scId']==$v){
//                                                             $spxx.="<li class='spxx' value='$v'>
//                                                             <i class='i-sp-img'><a href='../../?c=supermarket&a=showOne&id=$val1[productId]'><img src='../../$val1[src]'></a></i>
//                                                             <i class='i-sp-txt  i-qrsp-txt'><p><a href='../../?c=supermarket&a=showOne&id=$val1[productId]' class='spm' title='[$key] $val1[name]'> $val1[name]</a></p><p class='spxs'>$val1[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$val1[type]</a></p></i>
//                                                             <i class='i-sp-jg'><p class='p-xh'>$val1[marketPrice]</p><p class='spdj'>$val1[price]</p></i>
//                                                             <i class='i-sp-sl'><p class='i-sp-left' id='subtract' value='$val1[id]'>-</p><input type='text' rel='$val1[id]' name='spjs'  value='$val1[number]' class='i-sp-input spjs' autoComplete='off' /><p class='i-sp-right' id='add'  value='$val1[id]'>+</p></i>
//                                                             <i class='i-sp-xj '>".$val1[price]*$val1[number]."</i>
//                                                             <i class='i-sp-ps'>-</i>
//                                                             </li>";
//                                                         }
//                                                     }
//                                                 }
//                                             $fl.="<div class='i-spz'>
//                                             <div class='i-gwc-fb'><i class='i-checkbox-txt'>$key</i></div>
//                                             <ul class='i-gwc-ul i-qrsp-bg'>
//                                             $spxx
//                                             </ul></div>";
//                                         }
                                        
//                                     }else {
                                        //从DB读取数据
                                        $bd=getOne("select bdname from shoppingcar where id in($ides) group by bdname");
                                        if ($bd)foreach ($bd as $val){
                                            $spxx="";
                                            foreach ($ids as $v){
                                                $val1=getOne("select id,productId,src,name,shortDesc,type,marketPrice,price,number from shoppingcar where id=$v and bdname='$val'");
                                                $freight+=getOne("select freight from product where id=$val1[productId]")['freight']*$val1['number'];
                                                $spxx.="<li class='spxx' value='$val1[id]'>
                                                <i class='i-sp-img'><a href='../../?c=supermarket&a=showOne&id=$val1[productId]'><img src='../../$val1[src]'></a></i>
                                                <i class='i-sp-txt  i-qrsp-txt'><p><a href='../../?c=supermarket&a=showOne&id=$val1[productId]' class='spm' title='[$key] $val1[name]'> $val1[name]</a></p><p class='spxs'>$val1[shortDesc]</p><p><a href='javascript:void(0)' class='spys'>$val1[type]</a></p></i>
                                                <i class='i-sp-jg'><p class='p-xh'>$val1[marketPrice]</p><p class='spdj'>$val1[price]</p></i>
                                                <i class='i-sp-sl'><p class='i-sp-left' id='subtract' value='$val1[id]'>-</p><input type='text' rel='$val1[id]' name='spjs'  value='$val1[number]' class='i-sp-input spjs' autoComplete='off' /><p class='i-sp-right' id='add'  value='$val1[id]'>+</p></i>
                                                <i class='i-sp-xj '>".$val1['price']*$val1['number']."</i>
                                                <i class='i-sp-ps'>-</i>
                                                </li>";
                                            }
                                            $fl.="<div class='i-spz'>
                                            <div class='i-gwc-fb'><i class='i-checkbox-txt'>$val</i></div>
                                            <ul class='i-gwc-ul i-qrsp-bg'>
                                            $spxx
                                            </ul></div>";
                                        }
                                    }
                                    
                                    $content="<div class='i-web'>
                                                     $left
                                                    <div id='body' class='$cl'></div>
                                                    <div class='i-right'>
                                                    <div class='i-bt'>我的购物车</div>
                                                    <div class='i-lc'><a ><span class='i-ico'>1</span>查看购物车</a><a>-------</a><a class='ico-on'><span class='i-ico'>2</span>确认订单</a><a>-------</a><a><span class='i-ico'>3</span>付款并完成下单</a></div>
                                                    <div class='i-nr i-gwcqr'>
                                                    <div class='i-gwc-qrxbt'><p>收货地址</p><a href='javascript:void(0)'  rel='off'>修改</a></div>
                                                    <div class='i-gwc-shlr'>
                                                    <i class='shdzqr'><a href='javascript:void(0)' value='$default[id]'><p class='name'>收货人: $default[name]</p><p class='num'>联系电话: $default[phone]</p><p class='add'>收货地址: $default[address]</p></a></i>
                                                    <ul class='shdzxz'>
                                                    	$shdz
                                                    	<a href='javascript:void(0);' class='append'>添加其他地址</a>
                                                    </ul>
                                                    <ul class='tjdz'>
                                                    	<li  class='cityint'><p>所在地区</p>
                                                    	<dl class='select tjdz-select'>
                                                    		<dt class='province' rel='0'>选择省份</dt>
                                                    		<dd style='display: none;'>
                                                    			<ul class='province-ul'>
                                                    			</ul>
                                                    		</dd>
                                                    	</dl>
                                                    	<dl class='select tjdz-select'>
                                                    		<dt class='city'>选择城市</dt>
                                                    		<dd style='display: none;'>
                                                    			<ul class='city-ul'>
                                                    			</ul>
                                                    		</dd>
                                                    	</dl>
                                                    	<dl class='select tjdz-select'>
                                                    		<dt class='township'>选择镇区</dt>
                                                    		<dd style='display: none;'>
                                                    			<ul class='township_ul'>
                                                    			</ul>
                                                    		</dd>
                                                    	</dl>
                                                    		</li>
                                                        <li class='add-play'><p>详细地址</p><input type='text' name='shdz' value='' class='add-detail'/></li>
                                                    	<li class='num-play'><p>邮政编号</p><input type='text' name='shdz' value='' class='daknum'/></li>
                                                    	<li class='name-play'><p>收货人姓名</p><input type='text'  name='shdz' value='' class='shname'/></li>
                                                    	<li class='ipone-play'><p>手机</p><input type='text' name='shdz' value='' class='phone'/></li>
                                                    	<a href='javascript:void(0)' class='qrsydz' >添加地址</a>
                                                    </ul>
                                                    </div>
                                                    <div class='i-gwc-qrxbt'><p>确认订单信息</p></div>
                                                    <div class='i-gwc-qrxxbt'><i>商品信息</i><i>单价(元)</i><i>数量</i><i>小计(元)</i><i>配送方式</i></div>
                                                    <div class='spidPLay'>  </div>
                                                        $fl
                                                    <div class='i-qrsp-bz'>	
                                                    	<span>订单备注 <input type='text' class='ddbz'/></span>
                                                    </div>
                                                    <div class='i-qrsp-ze'>
                                                    	<span><p class='spze'>自动填写</p><p><i class='spzjs'></i>件商品,商品总额:</p></span>
                                                    	<span><p class='zyf'>￥$freight</p><p>运费:</p></span>
                                                    	<div class='yfq'  style='display: none;'>$freight</div>
                                                    	<span><p><input type='text' value='0' name='jfval' class='integral-play'/></p><p>可使用积分:<i class='mr15 integral'></i>输入使用积分</p></span>
                                                    	<span><p class='yfje'>自动填写</p><p>应付总额:</p></span>
                                                    </div>
                                                    <div class='i-qrdd'>
                                                    	$an
                                                    	<p>应付金额:<i class='yfzje'>自动填写</i></p>
                                                    	<a href=''javascript:void(0);' class='i-qrdd-ico queren'>提交订单</a>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    </div>";
        }elseif ($action=='pay'){
            $num=$_COOKIE['order_num'];
            $order=getOne("select date_add(date, interval 3 day) as enddate,money from orders where memberId=$id and order_num=$num");
            if (!$order){
                header("Location: v/smarty/common_mall.php?a=shoppingCar");
                exit();
            }
            $content="<div class='i-web'>
                            $left
                            <div id='body' class='payment'></div>
                            <div class='i-right'>
                            <div class='i-bt'>我的购物车</div>
                            <div class='i-lc'><a ><span class='i-ico'>1</span>查看购物车</a><a>-------</a><a><span class='i-ico'>2</span>确认订单</a><a>-------</a><a  class='ico-on'><span class='i-ico'>3</span>付款并完成下单</a></div>
                            <div class='i-nr' style='background-color: rgb(253,240,221) !important;'>
                            <div class='i-tx'>
                            <div class='i-tx-nr'>
                            	<img src='../../public/image/hyt.png'class='i-tx-nr-ico'>
                            	<p class='i-tx-nr-t1'>订单提交成功，您的订单将保留 <i class='end-time' endTime='$order[enddate]'></i>，请您尽快完成付款！</p>
                            	<p class='i-tx-nr-t2'>订单号: ".$num."（系统生成16位数字）</p>
                            	<p class='i-tx-nr-t3'>应付总额：<i>￥$order[money]</i></p>
                            </div>
                            </div>
                            </div>
                            
                            <div class='i-nr i-fk'>
                            	<a href='javascript:void(1)' class='i-fk-aon'>银联支付</a>
                            	<a href='javascript:void(1)'>企业支付</a>
                            	<a href='javascript:void(1)'>储蓄卡支付</a>
                            	<a href='javascript:void(1)'>信用卡支付</a>
                            </div>
                            <div class='i-nr i-fk-jk'>
                            	<i class='i-fk-jk-xs'>
                                    <form class='api-form' method='post' action='Pay/api_01_gateway/Form_6_2_FrontConsume.php' target='_blank'>
                                    <p style='display: none;'>
                                    <label>商户号：</label>
                                    <input id='merId' type='text' name='merId' placeholder='' value='$merId' title='默认商户号仅作为联调测试使用，正式上线还请使用正式申请的商户号' required='required' />
                                    </p>
                                    <p style='display:none ;'>
                                    <label>交易金额：</label>
                                    <input id='txnAmt' type='text' name='txnAmt' placeholder='交易金额' value='$order[money]' title='单位为分 ' required='required'/>
                                    </p>
                                    <p style='display:none ;'>
                                    <label>订单发送时间：</label>
                                    <input id='txnTime' type='text' name='txnTime' placeholder='订单发送时间，YYYYMMDDhhmmss格式' value=".date('YmdHis')." title='取北京时间' required='required'/>
                                    </p>
                                    <p style='display:none ;'>
                                    <label>商户订单号：</label>
                                    <input id='orderId' type='text' name='orderId' placeholder='商户订单号' value='$num' title='自行定义，8-32位数字字母 ' required='required'/>
                                    </p>
                                    <p>
                                    <label>&nbsp;</label>
                                    <div class='i-nr i-fkon'><input type='submit' class='button' value='立即支付' /></div></i>
                                    </p>
                                    </form>
                            	<i>
                            	<div class='i-nr i-fkon'><input type='submit' value='立即付款' /></div></i>
                            	<i>
                            	<div class='i-nr i-fkon'><input type='submit' value='立即付款' /></div></i>
                            	<i>
                            	<div class='i-nr i-fkon'><input type='submit' value='立即付款' /></div></i>
                            </div>
                            </div>
                            </div>";
        }
    }
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>
