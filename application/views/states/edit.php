<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl col-xl-5 my-xl-5">
	<div class="row justify-content-center align-middle">
		<div class="col-xl-12">
			<?php if (validation_errors() || ((isset($state['error'])) && ($state['error']))) :
				$form_errors = explode("\n",validation_errors());?>
				<div class="col-xl-12 alert alert-danger my-xl-2">
					<ul>
						<?php if (isset($state['error']) && ($state['error'])): ?>
							<li><?= $state['error'] ?></li>
						<?php endif;
						for ($i=0; $i<(count($form_errors) - 1); $i++) : ?>
							<li><?= $form_errors[$i]; ?></li>
						<?php endfor; ?>
					</ul>
				</div>
			<?php endif;?>
			<?php if (isset($state['success']) && ($state['success'])) : ?>
				<div class="col-xl-12 alert alert-success my-xl-2">
					<?= $state['success'] ?>
				</div>
			<?php endif;?>
			<div class="card shadow">
				<div class="card-header bg-dark">
					<h5 class="text-light text-center">Edit State</h5>
				</div>
				<div class="card-body">
					<form action="<?= site_url('state/edit/'.$state['id']) ?>" method="post">
						<div class="row">
							<div class="col-xl-12">
								<div class="form-group">
									<label for="state">State</label>
									<input type="text" id="state" value="<?=($state['name']) ? $state['name'] : '' ?>" <?= set_value('name') ?> name="name" class="form-control">
								</div>
								<div class="form-group btn-group-sm">
									<input type="submit" class="btn btn-dark float-xl-right mx-xl-3" value="Update">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
