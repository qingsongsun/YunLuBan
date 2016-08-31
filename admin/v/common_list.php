<?php include V.'header.php';?>
<div id="content2">
    <!-- box -->
    <div class="box">
        <div class="headlines">
            <h2><span><?=$actionName?></span></h2>
            <?php if(self::$setting[nav])foreach(self::$setting[nav] as $nav=>$navUrl){?>
            <a style="    float: right;    margin-right: 10px;    color: #fff;  line-height: 38px;" href="<?=$navUrl?>" class=""><?=$nav?></a>
            <?php }?>
            <a href="#" class="show-filter">显示过滤</a>
        </div>
        <!-- filter -->
        <?php if($filter){ ?>
        <form action="?c=<?=$_GET[c]?>&a=<?=$_GET[a]?>" method="POST" >
        <div class="filter">
            <?php foreach($filter as $f){?>
            <input type="text" name="<?=$f[code]?>" value="<?=$f[name]?>" title="<?=$f[name]?>" class="input" />
            <?php }?>
            <input type="submit" value="搜索" class="submit" />
        </div></form>
        <?php }?>
        <!-- /filter -->

        <!-- table -->
        <table class="tab tab-drag">
            <tr class="top nodrop nodrag">
                <th class="dragHandle">&nbsp;</th>
                <th class="checkbox"><input type="checkbox" name="" value="" class="check-all" /></th>
                <?php if($lists)foreach($lists as $l){?>
                <th><?=$l[name]?></th>
                <?php }?>
                <th class="action">操作</th>
            </tr>
            <?php if($data)foreach($data as $d){?>
            <tr>
                <td class="dragHandle">&nbsp;</td>
                <td class="checkbox"><input type="checkbox" name="id" value="<?=$d[id]?>" /></td>
                <?php foreach($lists as $l){?>
                <td><?php 
                if($l[type]=='select'){
                    if(strstr($l[code], 'parentId'))
                            echo getOne ("select name from ".self::$setting[table]." where id=".$d[$l[code]])[name];
                    else if(strstr($l[code], 'Id'))
                            echo getOne ("select name from ".ex($l[code],'Id',0)." where id=".$d[$l[code]])[name];
                    else echo $d[$l[code]];
                }
                else if($l[type]=='photo'){
                    echo "<img src='../{$d[$l[code]]}' width='120px;'/>";
                }else echo $d[$l[code]];?></td>
                <?php } ?>
                <td class="action">
                    <?php if($action)foreach ($action as $a){?>
                    <a href="<?=str_replace('{id}',$d[id],$a[url])?>" <?php if($a[comfirm]){?>onclick="return confirm('确认?')<?php }?>"><?=$a[name]?></a>
                    <?php }?>
                </td>
            </tr>
            <?php }?>
            
        </table>
        <!-- /table -->

        <!-- box-action -->  
        <div class="tab-action">
            <select class="select">
                <option>操作</option>
            </select>
            <input type="submit" value="确定" class="submit" />
        </div>
        <!-- /box-action -->

        <!-- /pagination -->
        <?php if($page_total>1){    
            $query=urlGet($_SERVER[QUERY_STRING]);
            $qPageFirst=$qPagePrev=$qPageNext=$qPageLast=$temp=$query;
            $qPageFirst[page]=1;
            $qPagePrev[page]=$page-1;
            $qPageNext[page]=$page+1;
            $qPageLast[page]=$page_total;
        ?>
        <div class="pagination">
            <ul>
                <li class="graphic first"><a href="<?=  urlMake($qPageFirst)?>"></a></li>
                <li class="graphic prev"><a href="<?=  urlMake($qPagePrev)?>"></a></li>
                <?php 
                for($i=-3; $i<=4;$i++){
                $otherPage=$page+$i;
                $temp[page]=$otherPage;
                if($otherPage>0 and $otherPage<=$page_total){
                ?>
                <li <?php if($i==0)echo ' class="active" ';?>><a  href="<?=  urlMake($temp);?>"><?=$otherPage?></a></li>
        <?php }}?>
                
                <li class="graphic next"><a href="<?=  urlMake($qPageNext)?>"></a></li>
                <li class="graphic last"><a href="<?=  urlMake($qPageLast)?>"></a></li>
            </ul>
            <p>Pages <?=$page?> of <?=$page_total?></p>
        </div>
        <?php }?>
        <!-- /pagination --> 
    </div>
    <!-- /box -->
</div>