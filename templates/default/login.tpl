<!DOCTYPE HTML>
<HTML lang="{Language}">
	<head>
		<title>{$system_info.community_name} - {$system_lang.login}</title>
		<link rel="icon" href="include/css/images/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="include/css/images/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="include/css/style.css" />
		<link rel="stylesheet" type="text/css" href="include/css/bootstrap.min.css" />
		<meta http-equiv="Content-Type" content="text/html; charset={Character_Set}" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta name="copyright" lang="{Language}" content="&copy; {$system_info.community_name}" />
		<meta name="author" lang="{Language}" content="mailto: {$system_info.system_email}" />
		<meta name="robots" content="ALL" />
		<!--[if lt IE 9]>
			<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="include/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="include/js/login.js"></script>
	</head>
	<body>
		<form class="form-horizontal" name="login_form" onsubmit="login(); return FALSE;">
			<div id="login_return"></div>
			<label class="control-label" for="inputEmail">{$system_lang.email}</label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-envelope"></i></span>
					<input class="span2" id="inputEmail" placeholder="{$system_lang.email}" type="text" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">{$system_lang.password}</label>
				<div class="controls">
					<input type="password" id="inputPassword" placeholder="{$system_lang.password}" name="password" />
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox" />
						<input type="checkbox" name="remember_me" /><span>{$system_lang.remember_me}</span>
					</label>
				<button type="submit" class="btn btn-primary">{$system_lang.login}</button>
				</div>
			</div>
		</form>
	</body>
</HTML>