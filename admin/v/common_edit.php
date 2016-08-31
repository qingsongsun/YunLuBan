<?php 
include V . 'header.php';
if(!$data){//没有数据就从网址找
    foreach(self::$setting[add] as $add){
        if(isset($_GET[$add[code]]))
            $data[$add[code]]==$_GET[$add[code]];
    }
}
?>
<script type="text/javascript">
//下面用于图片上传预览功能
function setImagePreview(avalue) {
var docObj=document.getElementById("aaa");
 
var imgObjPreview=document.getElementById("preview");
if(docObj.files &&docObj.files[0])
{
//火狐下，直接设img属性
imgObjPreview.style.display = 'block';
imgObjPreview.style.width = '150px';
imgObjPreview.style.height = '180px'; 
//imgObjPreview.src = docObj.files[0].getAsDataURL();
 
//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
}
else
{
//IE下，使用滤镜
docObj.select();
var imgSrc = document.selection.createRange().text;
var localImagId = document.getElementById("localImag");
//必须设置初始大小
localImagId.style.width = "150px";
localImagId.style.height = "180px";
//图片异常的捕捉，防止用户修改后缀来伪造图片
try{
localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
}
catch(e)
{
alert("您上传的图片格式不正确，请重新选择!");
return false;
}
imgObjPreview.style.display = 'none';
document.selection.empty();
}
return true;
}
 
</script>
<div id="content2">
    <div class="box-content">
        <form class="formBox" method="post" enctype="multipart/form-data"  action="<?php if($add==1)echo self::$setting[url][doAdd];else echo self::$setting[url][doEdit]?>">
            <input type="hidden" name="id" value="<?=$data[id]?>">
            <fieldset>
                <?php foreach ($edit as $e)
                    if ($e[type] == 'str') { ?>
                        <div class="clearfix">
                            <div class="lab"><label for="input-one"><?= $e[name] ?></label></div>
                            <div class="con"><input type="text" class="input" value="<?= $data[$e[code]] ?>" name="<?= $e[code] ?>" id="input-one"></div>
                        </div>
    <?php } else if ($e[type] == 'text') { ?>
                        <div class="clearfix">
                            <div class="lab"><label for="textarea-one"><?= $e[name] ?></label></div>
                            <div class="con"><textarea name="<?= $e[code] ?>" cols="" rows="" class="textarea" id="textarea-one"><?= $data[$e[code]] ?></textarea></div>
                        </div>
    <?php }else if($e[type] == 'date'){?>
        <div class="clearfix ">
                <div class="lab"><label for="input-two"><?= $e[name] ?></label></div>
			          <div class="con"><input type="text" class="input datepicker dp-applied" value="<?= $data[$e[code]] ?>" name="<?=$e[code]?>" id="input-two" style="width: 315px !important;"><a href="#" class="ico-calendar" title="Choose date">Choose date</a></div><!-- // class datepicker switch on jQuery date picker -->
			        </div>
        <?php }else if ($e[type] == 'text2'){ ?>
                <div class="clearfix textarea-wysiwyg">
              <div class="lab"><label for="textarea-two"><?= $e[name] ?></label></div>
              <div class="con"><div class="wysiwyg" style="width: 873px;"><ul class="panel"><li><a class="bold"><!-- --></a></li><li><a class="italic"><!-- --></a></li><li class="separator"></li><li><a class="createLink"><!-- --></a></li><li><a class="insertImage"><!-- --></a></li><li class="separator"></li><li><a class="h1"><!-- --></a></li><li><a class="h2"><!-- --></a></li><li><a class="h3"><!-- --></a></li><li class="separator"></li><li><a class="increaseFontSize"><!-- --></a></li><li><a class="decreaseFontSize"><!-- --></a></li><li class="separator"></li><li><a class="html"><!-- --></a></li><li><a class="removeFormat"><!-- --></a></li></ul><div style="clear: both;"><!-- --></div><iframe id="textarea-twoIFrame" style="min-height: 92px; width: 865px;"></iframe></div><textarea cols="" name="<?= $e[code] ?>" rows="" class="textarea wysiwyg" id="textarea-two" style="display: none;"><?= $data[$e[code]] ?></textarea></div>
		        </div>
    <?php }else if($e[type]=='file'){?>
                <div class="clearfix file">
              <div class="lab"><label for="file"><?= $e[name] ?></label></div>
              <div class="con"><input type="file" name="<?=$e[code]?>">
                <!--<div class="bubble-left"></div>
	              <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	              <div class="bubble-right"></div>--> 
              </div>
            </div>
    <?php }else if($e[type]=='photo'){?>
                
            <div class="clearfix file">
              <div class="lab"><label for="file"><?= $e[name] ?></label></div>
              <div class="con"><div class="item">
                    <div class="thumb"><a target="_blank" href="../<?= $data[$e[code]] ?>"><img id="preview" width="150px;" src="../<?= $data[$e[code]] ?>" alt=""></a></div>
                  </div><input id="aaa"  onchange="javascript:setImagePreview();" type="file" name="<?=$e[code]?>"></div> 	
                <!--<div class="bubble-left"></div>
	              <div class="bubble-inner">JPEG, GIF 5MB max per image</div>
	              <div class="bubble-right"></div>--> 
              </div>
            </div>
    <?php }else if($e[type]=='pwd'){?>
                <div class="clearfix">
                            <div class="lab"><label for="input-one"><?= $e[name] ?></label></div>
                            <div class="con"><input type="password" class="input" value="" name="<?= $e[code] ?>" id="input-one"></div>
                </div>
    <?php }else if($e[type]=='select'){?>
                <div class="clearfix">
                <div class="lab"><label><?= $e[name] ?></label></div>
			          <div class="con">
                                      <select name="<?= $e[code] ?>" class="select">
                                          <?php  foreach($e[arr] as $opt=>$optValue){?>
                                          <option <?php if($data[$e[code]]==$optValue)echo ' selected="selected" '?> value="<?=$optValue?>"><?=$opt?></option>
                                          <?php }?>
                  </select>
                </div>
			        </div>
    <?php }?>
            </fieldset>
            <div class="btn-submit"><!-- Submit form -->
              <input type="submit" value="提交" class="button">
              or <a href="javascript:history.back(-1)"  class="cancel">取消</a>
            </div>
        </form>
    </div>
</div>