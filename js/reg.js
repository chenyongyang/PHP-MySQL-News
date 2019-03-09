function checkvalue(form)
{
	if(form.id.value=='')
	{
		alert('学号不能为空!');
		return false;
	}
	if(form.passwd.value=='')
	{
		alert('密码不能为空!');
		return false;
	}
	if(form.rpasswd.value=='')
	{
		alert('确认密码不能为空!');
		return false;
	}
	if(form.passwd.value!=form.rpasswd.value)
	{
		alert('两次输入密码不一致!');
		return false;
	}
}