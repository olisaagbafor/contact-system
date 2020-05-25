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
	<div class="row my-5 justify-content-center">
		<div class="col-xl-8">
			<?php if (isset($success) || isset($upload_data)) : ?>
				<div class="alert alert-success py-xl-3">
					<ul>
						<li><?= $success; ?></li>
					</ul>
				</div>
			<?php endif; ?>

			<?php if(validation_errors() || isset($error)) :
				$form_errors = explode("\n",validation_errors());?>
				<div class="alert alert-danger py-xl-3">
					<ul>
						<?php if ($error) : ?>
						<li><?= $error; ?></li>
						<?php endif;
						for ($i=0; $i<(count($form_errors) - 1); $i++) : ?>
						<li><?= $form_errors[$i]; ?></li>
						<?php endfor; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="card shadow">
				<div class="card-header bg-dark rounded-top">
					<h3 class="text-center my-xl-1 text-light">Register User</h3>
				</div>
				<div class="card-body">
					<form action="<?= site_url('register') ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xl-9">
								<div class="form-row">
									<div class="col-xl-6">
										<div class="form-group">
											<label for="first_name">First Name:</label>
											<input type="text" id="first_name" name="first_name" value="<?= set_value('first_name')?>" class="form-control">
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="surname">Surname:</label>
											<input type="text" id="surname" name="surname" value="<?= set_value('surname')?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="other_names">Other Names:</label>
									<input type="text" id="other_names" name="other_names" value="<?= set_value('other_names')?>" class="form-control">
								</div>

								<div class="form-row">
									<div class="col-xl-6">
										<div class="form-group">
											<label for="contact">Contact:</label>
											<input type="tel" id="contact" name="contact" value="<?= set_value('contact')?>" class="form-control">
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" id="email" name="email" value="<?= set_value('email')?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="col-xl-6">
										<div class="form-group">
											<label for="password">Password:</label>
											<input type="password" id="password" name="password" value="<?= set_value('password')?>" class="form-control">
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="confirm-password">Confirm Password:</label>
											<input type="password" id="confirm-password" name="confirm_password" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="col-xl-3">
										<div class="form-group">
											<label for="gender">Gender:</label>
											<select name="gender" id="gender" class="form-control">
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
									<div class="col-xl-9">
										<div class="form-group">
											<label for="address">Address:</label>
											<input type="text" id="address" name="address" value="<?= set_value('address')?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="col-xl-6">
										<div class="form-group">
											<label for="state">State of Origin:</label>
											<select name="state_of_origin" id="state" class="form-control">
												<option value="">--select state--</option>
												<?php foreach ($states as $state) : ?>
													<option value="<?= $state['id'] ?>" <?=  set_select('state_of_origin', $state['id']); ?> ><?= $state['name'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="lga">Local Government Area:</label>
											<select name="local_government_area" id="lga" class="form-control">
												<option value="">--select local government area--</option>
												<?php if ($lgas) :
													foreach ($lgas as $lga) : ?>
														<option value="<?= $lga['id'] ?>" <?=  set_select('local_government_area', $lga['id']); ?> ><?= $lga['name'] ?></option>
													<?php endforeach;
												endif;?>

											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-3">
								<div class="form-group">
									<div class="card-img bg-light shadow" style="min-height: 150px;">
										<img src="" alt="" id="image-previewer" class="img-fluid bg-dark rounded" style="width: 100%;">
									</div>
								</div>
								<div class="form-group">
									<div class="custom-file my-xl-2">
										<input type="file" id="file-input" value="<?=set_value('userfile')?>" name="userfile" class="custom-file-input">
										<label for="file-input" class="custom-file-label">Choose</label>
									</div>
								</div>
							</div>
						</div>

						<div class="dropdown-divider"></div>

						<div class="row flex-row-reverse mr-xl-0">
							<div class="form-group float-xl-right">
								<a href="<?= site_url('login') ?>" class="btn btn-primary mr-xl-5"><i class="fa fa-sign-in"></i> Login</a>
								<a href="<?= site_url('register') ?>" class="btn btn-secondary"><i class="fa fa-refresh"></i> Reset</a>
								<input type="submit" class="btn btn-dark" value="Register">
							</div>
						</div>
					<?= form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>
<footer>
	<script src="<?= site_url('assets/js/jquery.js') ?>"></script>
	<script src="<?= site_url('assets/dist/imoViewer-min.js') ?>"></script>
	<script>
        $(document).ready(function () {
            $('#state').change(function () {
                var state_id = $(this).val();
                $.get(window.origin + '/contact-system/state/' + state_id, null, function (data) {
                    $('#lga').html(data);
                })
            });


            $('#file-input').imoViewer({
                'preview': '#image-previewer',
            })
        })
	</script>
</footer>
</body>
</html>


