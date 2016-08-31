<?php $admin=getOne("select * from admin where id='{$_SESSION['adminUserId']}'");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name='robots' content='all, follow' />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title></title>   
    <?php include V.'header.php';?>
  </head>   
  <body>
  <div id="main">
    <!-- #header -->
    <div id="header"> 
      <!-- #logo --> 
      <!--
      <div id="logo">
        <a href="index.html" title="Go to Homepage"><span>Great Admin</span></a>
      </div>
       -->
      <!-- /#logo -->
      <!-- #user -->                        
      <div id="user">
        <h2><?=$admin[username]?></h2>
        <a href=""></a> - <a href=""></a> - <a href="?a=logout">logout</a>
      </div>
      <!-- /#user -->  
    </div>
    <!-- /header -->
    <!-- #content -->
    <div id="content"><iframe width="909px" scrolling="no" height="1500px;"  frameborder="0" src="" id="mainFrame"   name="mainFrame"> </iframe>
</div>
    <!-- /#content -->
    <!-- #sidebar -->
    <div id="sidebar">

        <!-- mainmenu -->
        <ul id="floatMenu" class="mainmenu">
          <li class="first"><a href="#">首页</a></li>
          <li><a>基本信息设置</a>
              <ul class="submenu" style="display: block;">
                <li><a  target="mainFrame" href="?c=infotype&a=lists">信息分类</a></li>   
              <li><a  target="mainFrame" href="?c=info&a=lists">信息列表</a></li>
              <li><a  target="mainFrame" href="?c=setmeal&a=lists">套餐图片</a></li>
              <li><a  target="mainFrame" href="?c=feedback&a=lists">反馈信息</a></li>        
            </ul>
          </li>
          <li><a href="#">会员信息</a>
            <ul class="submenu">
              <li><a  target="mainFrame" href="?c=member&a=lists">会员列表</a></li>  
              <li><a  target="mainFrame" href="?c=message&a=lists">留言板</a></li>          
            </ul>
          </li>
          <li><a href="#">装修订单</a>
            <ul class="submenu">
              <li><a href="?c=projects&a=lists">装修单处理</a></li> 
              <li><a href="?c=worker&a=lists">工作人员</a></li> 
            </ul>
          </li>
          <li><a href="#">展示</a>
            <ul class="submenu">
              <li><a  target="mainFrame" href="?c=cases&a=lists">案例</a></li>          
              <li><a  target="mainFrame" href="?c=designer&a=lists">设计师</a></li>
              <li><a  target="mainFrame" href="?c=store&a=lists">体验馆</a></li>
            </ul>
          </li>
          <li><a href="#">商城</a>
            <ul class="submenu">
              <li><a href="?c=category&a=lists">大分类</a></li>         
              <li><a href="?c=smallClass&a=lists">小分类</a></li>         
              <li><a href="?c=brand&a=lists">品牌</a></li>
              <li><a href="?c=product&a=lists">产品</a></li>
              <li><a href="?c=order&a=lists">订单</a></li>
            </ul>
          </li>
          
          
          
        </ul>
        <!-- /.mainmenu -->

    </div>
    <!-- /#sidebar -->
    <!-- #footer -->
    <div id="footer">
      <p>? 2016 yunluban  | <a href="#main">Top</a></p>
    </div>
    <!-- /#footer -->
	
  <!-- MODAL WINDOW -->
	

  <!-- HELP WINDOW -->
	
	
	
  </div>
  <!-- /#main --> 
  </body>
</html>