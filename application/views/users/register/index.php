<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl">
	<div class="row my-5 justify-content-center">
		<div class="col-xl-8">
			<?php
			if (isset($success)) {
				?>
				<div class="alert alert-success py-xl-3">
					<?php echo $success; ?>
				</div>
				<?php
			}

			if(validation_errors()) {
				$errors = explode("\n",validation_errors())
				?>
				<div class="alert alert-danger">
					<ul>
						<?php
						foreach ($errors as $error) {
							?>
							<li><?php echo $error ?></li>
							<?php
						}
						?>
					</ul>
				</div>
			<?php
			} ?>
			<div class="card shadow">
				<div class="card-header bg-dark rounded-top">
					<h3 class="text-center my-xl-1 text-light">Register User</h3>
				</div>
				<div class="card-body">
					<form action="registry" method="post">
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
									<div class="col-xl-3">
										<div class="form-group">
											<label for="gender">Gender:</label>
											<select name="gender" id="gender" class="form-control">
												<option value="1">Male</option>
												<option value="2">Female</option>
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
												<option value="1">--select state--</option>
											</select>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="lga">Local Government Area:</label>
											<select name="local_government_area" id="lga" class="form-control">
												<option value="2">--select local government area--</option>
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
										<input type="file" id="file-input" name="photo" class="custom-file-input">
										<label for="file-input" class="custom-file-label">Choose</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row flex-row-reverse mr-xl-5">
							<div class="form-group">
								<input type="submit" class="btn btn-dark" value="Register">
							</div>
						</div>
					<?= form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="assets/dist/imoViewer-min.js"></script>
<script>
	$(document).ready(function () {
        $('#file-input').imoViewer({
            'preview': '#image-previewer',
        })
    })
</script>
