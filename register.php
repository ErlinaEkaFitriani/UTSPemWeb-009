<?php 


require_once 'core/init.php';

if(Input::get('submit'))
{
	$validation = new Validation();

	$validation = $validation->check(array(
	'username' =>array(
					'required' =>true,
					'min' => 3,
					'max' => 50,
				 ),
	'password' =>array(
					'required' =>true,
					'min' => 3,
					
					 ),

	));


	if ($validation->passed())
	{

	$user->register_user(array(
		'username' => Input::get('username'),
		'password' => password_hash(Input::get('password'),PASSWORD_DEFAULT)
	));

	Session::set('username',Input::get('username'));
	header('location: profile.php');
	}else{
		$errors($validation->errors());
	}
}	

require_once 'templates/header.php'; ?>

 <h2>Daftar Di Sini</h2>


 <form action="register.php" method="post">
 	<label>Username</label>
 	<input type="text" name="username"><br>

 	<label>Password</label>
 	<input type="password" name="password"><br>

 	<input type="submit" name="submit" value="Daftar Sekarang">

 </form>

 <?php require_once'templates/footer.php'; ?>