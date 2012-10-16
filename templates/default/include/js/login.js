function login()
{
	var message = '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please be patient while we log you in.</strong></div>';
	$("#login_return").empty().append(message);
	var email = document.forms['login_form']['email'];
	var password = document.forms['login_form']['password'];
	$.post('index.php', { email: email, password: password }, function(data) {
		if(data != "")
		{
			message = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>You have successfully logged in as '+data+'</strong></div>';
		}
		else
		{
			message = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Login failed.</strong></div>';
		}
		$("#login_return").empty().append(message);
	});
}