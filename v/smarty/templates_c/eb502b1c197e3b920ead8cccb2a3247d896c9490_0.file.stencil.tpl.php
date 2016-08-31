<?php
/* Smarty version 3.1.29, created on 2016-08-31 23:04:12
  from "D:\Zend\workspaces\DefaultWorkspace12.5\YLB\v\smarty\templates\stencil.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c6f1ecde71f5_90297931',
  'file_dependency' => 
  array (
    'eb502b1c197e3b920ead8cccb2a3247d896c9490' => 
    array (
      0 => 'D:\\Zend\\workspaces\\DefaultWorkspace12.5\\YLB\\v\\smarty\\templates\\stencil.tpl',
      1 => 1472655851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c6f1ecde71f5_90297931 ($_smarty_tpl) {
?>
<!doctype html>
<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'config.conf', null, 0);
?>


<html>

	<head>
		<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'meta');?>

		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<link rel="shortcut icon" href="/YLB/public/image/logo32.ico" type="image/x-icon">
		<link rel="icon" href="/YLB/public/image/logo32.ico" type="image/x-icon">
		<?php echo $_smarty_tpl->tpl_vars['css']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['script']->value;?>

	</head>
	
	<body style="background-color:#fff">
	
	<body>
		<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'footer');?>

		<!-- <?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'setCity');?>
 -->
	</body>
	
</html><?php }
}
