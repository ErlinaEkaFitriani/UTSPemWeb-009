<?php 


require_once 'core/init.php';

if(Session::exists('username'))
{
	header('Location:profile.php');
}


if(Input::get('submit'))
{
	$validation = new Validation();

	$validation = $validation->check(array(
	'username' =>array('required' =>true),
	'password' =>array('required' =>true)

	));


	if ($validation->passed())
	{
		if($user->cek_nama(Input::get('username')))
		{
			if($user->login_user(Input::get('username'),Input::get('password')))
			{

			Session::set('username',Input::get('username'));
			header('Location: profile.php');
			}
			else
			{
				$errors[]='login gagal';
			}
		}else
		{
			$errors[] = 'namanya belum terdaftar';
		}
	
	}else
	{
		$errors = $validation->errors();
	}
}	

require_once 'templates/header.php'; ?>

 <h2>Login Di Sini</h2>


 <form action="register.php" method="post">
 	<label>Username</label>
 	<input type="text" name="username"><br>

 	<label>Password</label>
 	<input type="password" name="password"><br>

 	<input type="submit" name="submit" value="Login Sekarang">

 </form>

 <?php require_once'templates/footer.php'; ?>