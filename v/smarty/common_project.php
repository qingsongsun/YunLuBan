<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    global  $left;
    
    session_start();
    $id=$_SESSION[memberId];

    
    $title=null;
    $script=null;
    $content=null;

    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/i_style.css'>";
    
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
        if ($action=="price"){
            $title="预算清单-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                    $(function(){
                    $('#cityjqon').click(function(){
                    	$('#cityjq').slideToggle('slow');
                    });
                    });
                    </script>";
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>预算清单</div>
                    <div class='i-nr i-tcnr '>项目套餐内容</div>
                    <div class='i-nr i-tcjg'><p>888套餐</p><p style='float: right !important;'>合计：<i>1000.00</i></p></div>
                    <div class='i-nr i-tcsl'><p>数量：120/㎡</p><p>单价：￥800.00</p></div>
                    <div class='i-nr i-tcjc'>
                    <p>基础装修内容</p>
                    <ul>
                    	<li>1.大理铺垫工程</li>
                    	<li>2.大理铺垫工程</li>
                    	<li>3.大理铺垫工程</li>
                    	<li>4.大理铺垫工程</li>
                    	<li>5.大理铺垫工程</li>
                    	<li>6.大理铺垫工程</li>
                    	<li>7.大理铺垫工程</li>
                    	<li>8.大理铺垫工程</li>
                    </ul>
                    </div>
                    <div class='i-nr i-tcjc i-tczc '>
                    <p>主材内容</p>
                    <ul>
                    	<li>1.大理铺垫工程</li>
                    	<li>2.大理铺垫工程</li>
                    	<li>3.大理铺垫工程</li>
                    	<li>4.大理铺垫工程</li>
                    	<li>5.大理铺垫工程</li>
                    	<li>6.大理铺垫工程</li>
                    	<li>7.大理铺垫工程</li>
                    	<li>8.大理铺垫工程</li>
                    </ul>
                    </div>
                    <div class='i-nr i-tcjg'><p>个性化项目</p><p style='float: right !important;'>合计：<i>1000.00</i></p></div>
                    <div class='i-nr i-tcgx'><i>内容</i><i>材料及描述</i><i>数量(㎡)</i><i>单价(元)</i><i>小计(元)</i></div>
                    <div class='i-nr i-tcgxa'>
                    <ul>
                    	<li><i>1.这里填写内容</i><i>这里填写材料及描述</i><i>100</i><i>369</i><i>36900</i></li>
                    	<li><i>2.这里填写内容</i><i>这里填写材料及描述</i><i>100</i><i>369</i><i>36900</i></li>
                    	<li><i>3.这里填写内容</i><i>这里填写材料及描述</i><i>100</i><i>369</i><i>36900</i></li>
                    	<li><i>4.这里填写内容</i><i>这里填写材料及描述</i><i>100</i><i>369</i><i>36900</i></li>
                    </ul>
                    </div>
                    <div class='i-nr i-tczj'><p>项目总价格:<i>￥120000.00</i></p></div>
                    
                    </div>
                    </div>";
        }elseif ($action=="modify"){
            $title="修改项目-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                        <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                        <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                        <script src='../../public/js/i.js' type='text/javascript'></script>
                        <script type='text/javascript'>
                        $(function(){
                        $('#cityjqon').click(function(){
                        	$('#cityjq').slideToggle('slow');
                        });
                        });
                        </script>";
            
            $res=getAll("select pc.about,pc.date,pc.description,pc.sizeChange,pc.price,pc.changeAmount,pc.status from member mb,projects ps,projects_change pc where mb.id=ps.memberId and ps.id=pc.projectsId and mb.id=$id");
            if ($res)foreach ($res as $val){
                $status="<i><a href='javasript:void(0);' class='i-xgqrico i-xgqrico-on'>待确认</a></i>";
                if ($val['status']==1){
                    $status="<i><a href='javasript:void(0)' class='i-xgqrico'>已确认</a></i>";
                }
                $change.="<li><i>$val[about]</i><i>$val[date]</i><i><a href='javascript:void(0);' class='i-xgckico'>$val[description]</a></i><i>$val[sizeChange]</i><i>$val[price]</i><i>$val[changeAmount]</i>$status</li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>修改项目</div>
                    <div class='i-nr i-xgnr '>工程项目修改情况</div>
                    <div class='i-nr i-xgxq'><i>工种</i><i>日期</i><i>描述</i><i>与原合同增减</i><i>单位(元)</i><i>小计(元)</i><i>客户确认</i></div>
                    <div class='i-nr i-xgxmnr'>
                    	<ul>
                    		$change
                    	</ul>
                    <div class='i-xgckjq'><p style='color:  #e60641;'>修改项目描述:</p><p class='i-xgckjq-txt'>JQ控制显示内容</p><a href='javascript:void(0)' >关闭</a></div>
                    </div>
                    <div class='i-nr i-xgxmjg'><p>修改项目金额:<i>￥10000.00</i></p><p>项目变化后,套餐总金额:<i>￥50000.00</i></p></div>
                    
                    </div>
                    </div>";
        }elseif ($action=="team"){
            $title="项目团队-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                    $(function(){
                    $('#cityjqon').click(function(){
                    	$('#cityjq').slideToggle('slow');
                    });
                    });
                    </script>";
            
            $res=getAll("select wk.* from worker wk,projects_team pst,projects ps where ps.id=pst.projectsId and wk.id=pst.workerId and ps.memberId=$id");
            if ($res)foreach ($res as $val){
                $worker.="<li><img src='../../$val[icon]'/><i>$val[name]</i><p>职位:$val[pro]</p><p>手机:$val[mebile]</p></li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>项目团队</div>
                    <div class='i-nr i-xmtnr '>具体人员</div>
                    <div class='i-nr i-xmtli '>
                    <ul>
                    	$worker
                    </ul>
                    </div>
                    </div>";
        }elseif ($action=="resultPic"){
            $title="效果图-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                            $(function(){
                                    $('#cityjqon').click(function(){
                                    	$('#cityjq').slideToggle('slow');
                                    });
                                    
                                    $('.i-xgtl').click(function(){
                                    	var xgtc = $(this).parents('.i-xgtjq-xs').children('.i-xgtc');
                                    	var xgtcli = $(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('li').length;
                                    	var xgtcul = xgtcli*596;
                                    	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('ul').css('width',xgtcul);
                                    	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').animate({scrollLeft:'-=596px'},200);
                                      });
                                    
                                    $('.i-xgtr').click(function(){
                                    	var xgtc = $(this).parents('.i-xgtjq-xs').children('.i-xgtc');
                                    	var xgtcli = $(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('li').length;
                                    	var xgtcul = xgtcli*596;
                                    	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('ul').css('width',xgtcul);
                                    	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').animate({scrollLeft:'+=596px'},200);
                                      });
                            });
                    </script>";
            
            $xgt=getAll("select pid.name,pid.src from projects_images_design pid,projects ps,member mb where pid.projectsId=ps.id and ps.memberId=mb.id and mb.id='$id'");
            if ($xgt)foreach ($xgt as $val){
                $xgtName.="<a href='javascript:void(0)' >$val[name]</a>";
                $xgtSrc.="<li><img src='../../$val[src]'/></li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>效果图</div>
                    <div class='i-nr i-xgtxz '>$xgtName</div>
                    <div class='i-nr i-xgtjq'>
                            <span class='i-xgtjq-xs'>
                            <div class='i-xgtl'></div>
                            <div class='i-xgtc'>
                            <ul>
                            	$xgtSrc
                            </ul></div>
                            <div class='i-xgtr'></div>
                            </span>
                    </div>
                    </div>
                    </div>";
        }elseif ($action=="buildPic"){
            $title="施工图-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                        $(function(){
                                $('#cityjqon').click(function(){
                                	$('#cityjq').slideToggle('slow');
                                });
                                
                                $('.i-xgtl').click(function(){
                                	var xgtc = $(this).parents('.i-xgtjq-xs').children('.i-xgtc');
                                	var xgtcli = $(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('li').length;
                                	var xgtcul = xgtcli*596;
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('ul').css('width',xgtcul);
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').animate({scrollLeft:'-=596px'},200);
                                  });
                                
                                $('.i-xgtr').click(function(){
                                	var xgtc = $(this).parents('.i-xgtjq-xs').children('.i-xgtc');
                                	var xgtcli = $(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('li').length;
                                	var xgtcul = xgtcli*596;
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('ul').css('width',xgtcul);
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').animate({scrollLeft:'+=596px'},200);
                                  });
                            });
                        </script>";
            
            $sgt=getAll("select pic.name,pic.src from projects_images_constr pic,projects ps,member mb where pic.projectsId=ps.id and ps.memberId=mb.id and mb.id='$id'");
            if ($sgt)foreach ($sgt as $val){
                $sgtName.="<a href='javascript:void(0)'>$val[name]</a>";
                $sgtSrc.="<li><img src='../../$val[src]'/></li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>施工图</div>
                    <div class='i-nr i-xgtxz '>$sgtName</div>
                    <div class='i-nr i-xgtjq'>
                            <span class='i-xgtjq-xs'>
                            <div class='i-xgtl'></div>
                            <div class='i-xgtc'>
                            <ul>
                            	$sgtSrc
                            </ul></div>
                            <div class='i-xgtr'></div>
                            </span>
                    </div>
                    </div>
                    </div>";
        }elseif ($action=="hidePic"){
            $title="隐蔽工程图片-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                            $(function(){
                                $('#cityjqon').click(function(){
                                	$('#cityjq').slideToggle('slow');
                                });
                                
                                $('.i-xgtl').click(function(){
                                	var xgtc = $(this).parents('.i-xgtjq-xs').children('.i-xgtc');
                                	var xgtcli = $(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('li').length;
                                	var xgtcul = xgtcli*596;
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('ul').css('width',xgtcul);
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').animate({scrollLeft:'-=596px'},200);
                                	
                                  });
                                
                                $('.i-xgtr').click(function(){
                                	var xgtc = $(this).parents('.i-xgtjq-xs').children('.i-xgtc');
                                	var xgtcli = $(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('li').length;
                                	var xgtcul = xgtcli*596;
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').find('ul').css('width',xgtcul);
                                	$(this).parents('.i-xgtjq-xs').children('.i-xgtc').animate({scrollLeft:'+=596px'},200);
                                });
                            });
                    </script>";
            
            $ybt=getAll("select pih.name,pih.src from projects_images_hidden pih,projects ps,member mb where pih.projectsId=ps.id and ps.memberId=mb.id and mb.id='$id'");
            if ($ybt)foreach ($ybt as $val){
                $ybtName.="<a href='javascript:void(0)' > $val[name]</a>";
                $ybtSrc.="<li><img src='../../$val[src]'/></li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>隐蔽工程图片</div>
                    <div class='i-nr i-xgtxz '>$ybtName</div>
                    <div class='i-nr i-xgtjq'>
                            <span class='i-xgtjq-xs'>
                            <div class='i-xgtl'></div>
                            <div class='i-xgtc'>
                            <ul>
                            	$ybtSrc
                            </ul></div>
                            <div class='i-xgtr'></div>
                            </span>
                    </div>
                    </div>
                    </div>";
        }elseif ($action=="scenePic"){
            $title="装修现场-会员中心";
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                        $(function(){
                            $('#cityjqon').click(function(){
                            	$('#cityjq').slideToggle('slow');
                            });
                        });
                    </script>";
            
            $zbxq=getAll("select ps.resident,ps.layout,ps.size,mb.name,mb.icon,pil.* from member mb,projects ps,projects_images_live pil where mb.id=ps.memberId and ps.id=pil.projectsId and mb.id='$id'");
            if ($zbxq)foreach ($zbxq as $val){
                $zb.="<li>
                                <div class='i-zxzb-xx'>
                                <a href='javascript:void(0)'  class='i-zxzbico' >1</a><p class='i-zxzbico-txt'>施工阶段：$val[sessionName]工作</p>
                                <i>施工项目：$val[items]</i>
                                <i>日期：$val[date]</i>
                                <i>施工监理：$val[sup] </i>
                                <i>施工人员：$val[workers]</i>
                                </div>
                                <div class='i-zxzb-img'>
                                <div class='i-zxzbico i-zxzbico-adc808' ><img src='../../public/image/ico/noico.png'></div><p class='i-zxzbico-txt'>现在照片</p>
                                <a href='javascript:void(0)' class='i-zxzbimg mr15' ><img src='../../$val[src1]'0></a>
                                <a href='javascript:void(0)' class='i-zxzbimg mr15' ><img src='../../$val[src2]'0></a>
                                <a href='javascript:void(0)' class='i-zxzbimg' ><img src='../../$val[src3]'0></a>
                                </div>
                          </li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>施工现场</div>
                    <div class='i-nr i-zxxc '><a href='javascript:void(0)' class='i-xgtxz-aon'>我的装修直播</a></div>
                    <div class='i-nr i-zxzb'>
                    	<ul>
                        	$zb
                    	</ul>
                    </div>
                    </div>
                    </div>
                    <div class='imgjq'>
                    <img src='../../public/image/0zx03.jpg'><br />
                    <a href='javascript:void(0)'>关闭</a>
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