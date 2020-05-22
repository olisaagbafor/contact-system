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
					<h5 class="text-light text-center">State Setup</h5>
				</div>
				<div class="card-body">
					<?php if (isset($state['id']) && ($state['id'])) : ?>
					<form action="<?= site_url('state/setup/edit/'.$state['id']) ?>" method="post">
					<?php else: ?>
					<form action="<?= site_url('state/setup/create/') ?>" method="post">
					<?php endif; ?>
						<div class="row">
							<div class="col-xl-12">
								<div class="form-group">
									<label for="state">State</label>
									<?php if (isset($state)) : ?>
									<input type="text" id="state" value="<?=(isset($state['name']) && ($state['name'])) ? $state['name'] : '' ?>" <?= set_value('name') ?> name="name" class="form-control">
									<?php else: ?>
									<input type="text" id="state" <?= set_value('name') ?> name="name" class="form-control">
									<?php endif;?>
								</div>
								<div class="form-group btn-group-sm">
									<input type="submit" class="btn btn-dark float-xl-right mx-xl-3" value="Submit">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
