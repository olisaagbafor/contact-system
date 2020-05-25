<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact System - Login</title>
	<link rel="stylesheet" href="<?= site_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?= site_url('assets/css/custom.css')?>">
	<link rel="stylesheet" href="<?= site_url('assets/font-awesome/css/font-awesome.css')?>">
</head>
<body>
<div class="container-xl">
	<div class="row justify-content-center my-xl-5">
		<div class="col-xl-4 my-xl-5">
			<?php if (validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger my-xl-2">
				<ul>
					<?php $validation_errors = explode("\n",validation_errors()); ?>
					<?php if (isset($error) && ($error)) : ?>
					<li> <?= $error; ?> </li>
					<?php endif;?>
					<?php for ($i=0; $i<(count($validation_errors) - 1); $i++) : ?>
					<li> <?= $validation_errors[$i]; ?> </li>
					<?php endfor; ?>
				</ul>
			</div>
			<?php endif; ?>
			<div class="card shadow">
				<div class="card-header bg-dark">
					<h5 class="text-uppercase text-light">User Login</h5>
				</div>
				<div class="card-body">
					<form action="<?= site_url('login') ?>" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<div class="d-xl-flex">
								<input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" >
								<span class="bg-dark input-icon text-light text-center"><i class="fa fa-envelope"></i></span>
							</div>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<div class="d-xl-flex">
								<span class="input-icon-reversed text-center text-light bg-dark"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" id="password">
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<div class="form-group btn-group-sm">
							<button class="btn btn-dark float-xl-right"><i class="fa fa-sign-in"></i> Login</button>
							<a href="<?= site_url('/') ?>" class="btn btn-secondary mx-2 float-xl-right"><i class="fa fa-refresh"></i> Reset</a>
							<a href="<?= site_url('register') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Register</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
