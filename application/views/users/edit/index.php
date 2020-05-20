<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl">
	<div class="row my-5 justify-content-center">
		<div class="col-xl-8">
			<?php
			if (isset($success) || isset($upload_data)) {
				?>
				<div class="alert alert-success py-xl-3">
					<ul>
						<?php
						echo '<li>'. $success .'</li>';
						?>
					</ul>
				</div>
				<?php
			}
			if(validation_errors() || isset($error)) {
				?>
				<div class="alert alert-danger py-xl-3">
					<ul>
						<?php
						$form_errors = explode("\n",validation_errors());
						echo '<li>'. $error .'</li>';
						foreach ($form_errors as $form_error):?>
							<li><?php echo $form_error; ?></li>
						<?php endforeach;
						?>
					</ul>
				</div>
				<?php
			}
			?>
			<div class="card shadow">
				<div class="card-header bg-dark rounded-top">
					<h3 class="text-center my-xl-1 text-light">Edit User</h3>
				</div>
				<div class="card-body">
					<form action="user/update" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-xl-9">
								<div class="form-row">
									<div class="col-xl-6">
										<div class="form-group">
											<label for="first_name">First Name:</label>
											<input type="text" id="first_name" name="first_name" value="<?= $user['first_name']; ?>" class="form-control">
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="surname">Surname:</label>
											<input type="text" id="surname" name="surname" value="<?= $user['surname']; ?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="other_names">Other Names:</label>
									<input type="text" id="other_names" name="other_names" value="<?= $user['other_names']; ?>" class="form-control">
								</div>

								<div class="form-row">
									<div class="col-xl-6">
										<div class="form-group">
											<label for="contact">Contact:</label>
											<input type="tel" id="contact" name="contact" value="<?= $user['contact']; ?>" class="form-control">
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="email">Email:</label>
											<input type="email" id="email" name="email" value="<?= $user['email']; ?>" class="form-control">
										</div>
									</div>
								</div>

								<div class="form-row">
									<div class="col-xl-3">
										<div class="form-group">
											<label for="gender">Gender:</label>
											<select name="gender" id="gender" class="form-control">
												<option value="">Select gender</option>
												<option value="1" <?= ($user['gender'] == 'male')? 'selected' : '' ?> >Male</option>
												<option value="2"  <?= ($user['gender'] == 'female')? 'selected' : '' ?>>Female</option>
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
												<?php
												foreach ($states as $state) {
													?>
													<option value="<?= $state['id'] ?>"
														<?php echo  set_select('state_of_origin', $state['id']); ?> ><?= $state['name'] ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="lga">Local Government Area:</label>
											<select name="local_government_area" id="lga" class="form-control">
												<option value="">--select local government area--</option>
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

<script src="<?= site_url('assets/dist/imoViewer-min.js') ?>"></script>
<script>
    $(document).ready(function () {
        $('#state').change(function () {
            var state_id = $(this).val();
            $.get(window.origin + '/contact-system/state/' + state_id, null, function (data) {
                console.log(data);
                $('#lga').html(data);
            })
        });


        $('#file-input').imoViewer({
            'preview': '#image-previewer',
        })
    })
</script>