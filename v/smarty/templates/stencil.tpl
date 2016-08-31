<!doctype html>
{config_load file='config.conf'}

<html>

	<head>
		{#meta#}
		<title>{$title}</title>
		<link rel="shortcut icon" href="/YLB/public/image/logo32.ico" type="image/x-icon">
		<link rel="icon" href="/YLB/public/image/logo32.ico" type="image/x-icon">
		{$css}
		{$script}
	</head>
	
	<body style="background-color:#fff">
	
	<body>
		{$header}
		{$content}
		{#footer#}
		<!-- {#setCity#} -->
	</body>
	
</html>