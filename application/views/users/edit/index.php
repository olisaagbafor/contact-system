<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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

			<?php if(validation_errors() || isset($errors)) : ?>
				<?php $form_errors = explode("\n",validation_errors());?>
				<div class="alert alert-danger py-xl-3">
					<ul>
						<?php if ($errors) :
							foreach ($errors as $error) : ?>
							<li><?= $error?></li>
							<?php endforeach;
						endif;
						for ($i=0; $i<(count($form_errors) - 1); $i++) : ?>
							<li><?= $form_errors[$i]; ?></li>
						<?php endfor; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="card shadow">
				<div class="card-header bg-dark rounded-top">
					<h3 class="text-center my-xl-1 text-light">Edit User</h3>
				</div>
				<div class="card-body">
					<form action="<?= site_url('user/update/'.$user['id']) ?>" method="post" enctype="multipart/form-data">
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
											<input type="text" id="address" name="address" value="<?= $user['address']; ?>" class="form-control">
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
													<option value="<?= $state['id'] ?>" <?= ($user['state_of_origin'] == $state['id']) ? 'selected' : '' ?> ><?= $state['name'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group">
											<label for="lga">Local Government Area:</label>
											<select name="local_government_area" id="lga" class="form-control">
												<option value="">--select local government area--</option>
												<?php foreach ($lgas as $lga) : ?>
													<option value="<?= $lga['id'] ?>" <?= ($user['local_government_area'] == $lga['id']) ? 'selected' : '' ?> ><?= $lga['name'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

							</div>
							<div class="col-xl-3">
								<div class="form-group">
									<div class="card-img bg-light shadow" style="min-height: 150px;">
										<img src="<?= site_url('photo/'.$user['photo']) ?>" alt="" id="image-previewer" class="img-fluid bg-dark rounded" style="width: 100%;">
									</div>
								</div>
							</div>
						</div>

						<div class="row flex-row-reverse mr-xl-5">
							<div class="form-group">
								<input type="submit" class="btn btn-dark" value="Update">
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
                $('#lga').html(data);
            })
        });


        $('#file-input').imoViewer({
            'preview': '#image-previewer',
        })
    })
</script>
