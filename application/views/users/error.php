<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl my-xl-5 py-xl-5">
	<div class="row justify-content-center">
		<?php
		if (isset($errors)):
				foreach ($errors as $error) : ?>
					<div class="alert alert-danger col-xl-6">
						<?= $error; ?>
					</div>
				<?php endforeach;
		endif;
		?>
	</div>
</div>

