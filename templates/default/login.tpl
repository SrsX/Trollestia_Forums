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