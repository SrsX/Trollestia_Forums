{include file="header.tpl"}
<form class="form-horizontal" name="login_form" onsubmit="login(); return FALSE;">
	<div id="login_return"></div>
	<label class="control-label" for="inputEmail">{$_LANG.email}</label>
	<div class="controls">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<input class="span2" id="inputEmail" placeholder="{$_LANG.email}" type="text" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputPassword">{$_LANG.password}</label>
		<div class="controls">
			<input type="password" id="inputPassword" placeholder="{$_LANG.password}" name="password" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<label class="checkbox" />
				<input type="checkbox" name="remember_me" /><span>{$_LANG.remember_me}</span>
			</label>
		<button type="submit" class="btn btn-primary">{$_LANG.login}</button>
		</div>
	</div>
</form>
{include file="footer.tpl"}