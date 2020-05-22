<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl mt-xl-3">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<?php $key = md5(rand()); if (isset($user['message'])) : ?>
			<div class="alert alert-danger col-xl-12 text-center btn-group-sm py-xl-2" id="message_div">
				<h5><?= $user['message'] ?></h5>
				<div class="btn-group-sm">
					<button class="btn btn-primary" id="cancel_delete_btn">Cancel Delete</button>
					<button class="btn btn-danger" id="confirm_delete_btn">Confirm Delete</button>
				</div>
				<form action="<?= site_url('user/confirm/delete/'.$user['id'].'/'.$key) ?>" method="post" id="confirm_delete_form">
					<input type="hidden" value="<?= $key ?>" name="key">
				</form>
			</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-header bg-dark rounded-top">
					<h4 class="text-center my-xl-2 text-light">User Profile View</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-4">
							<div class="card-img rounded img-fluid">
								<img src="<?= site_url('photo/'.$user['photo']) ?>" alt="Profile Image" class="rounded" style="width: inherit">
							</div>
							<div class="py-xl-3">
								<div class="row justify-content-center">
									<h5 class="text-uppercase text-center"><?= $user['surname'].' '.$user['first_name'].' '.$user['other_names'] ?></h5>
								</div>
							</div>
						</div>

						<div class="col-xl-8 p-xl-4">
							<div class="row mb-xl-4">
								<div class="col-xl-6 shadow-sm">
									<h6><strong class="text-muted">Gender: </strong> <?= $user['gender'] ?></h6>
								</div>
								<div class="col-xl-6 shadow-sm">
									<h6><strong class="text-muted">Contact: </strong> <?= $user['contact'] ?></h6>
								</div>
							</div>

							<div class="row mb-xl-4">
								<div class="col-xl-12 shadow-sm">
									<h6><strong class="text-muted">Email Address: </strong> <br/><?= $user['email'] ?></h6>
								</div>
							</div>

							<div class="row mb-xl-4">
								<div class="col-xl-12 shadow-sm">
									<h6><strong class="text-muted">Residential Address: </strong> <br/><?= $user['address'] ?></h6>
								</div>
							</div>

							<div class="row mb-xl-4">
								<div class="col-xl-6 shadow-sm">
									<h6><strong class="text-muted">State of Origin: </strong> <br/><?= $user['state'] ?></h6>
								</div>
								<div class="col-xl-6 shadow-sm">
									<h6><strong class="text-muted">Local Govt: </strong> <br/><?= $user['lga'] ?></h6>
								</div>
							</div>

							<div class="row mb-xl-4">
								<div class="col-xl-6 shadow-sm">
									<h6><strong class="text-muted">Created on: </strong> <br/><?= date('D, d-M-Y, h:i a', strtotime($user['created_at'])) ?></h6>
								</div>
								<div class="col-xl-6 shadow-sm">
									<h6><strong class="text-muted">Modified on: </strong> <br/><?= date('D, d-M-Y, h:i a', strtotime($user['updated_at'])) ?></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer bg-dark">
					<div class="float-xl-right btn-group-sm">
						<a href="<?= site_url('/') ?>" class="btn btn-secondary">Back to home</a>
						<a href="<?= site_url('user/edit/'.$user['id']) ?>" class="btn btn-primary">Edit Profile</a>
						<a href="<?= site_url('user/delete/'.$user['id']) ?>" class="btn btn-danger">Delete Profile</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#cancel_delete_btn').click(function () {
			$('#message_div').hide();
        })
		$('#confirm_delete_btn').click(function () {
			$('#confirm_delete_form').submit();
        })
    })
</script>
