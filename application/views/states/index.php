
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$i = 0;
function color(&$i)
{
	$color = array('bg-success','bg-primary','bg-info','bg-secondary','bg-dark','bg-danger','bg-warning');
	if ($i >= count($color)) :
		$i = 0;
		return $color[$i];
	else:
		return $color[$i];
	endif;
}
?>


<div class="container-xl col-xl-8 mx-xl-auto my-xl-5">
	<div class="table-responsive">
		<table class="table table-striped table-hover shadow">
			<thead class="thead-dark">
			<tr class="text-center bg">
				<th>#</th>
				<th>State:</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($states as $state) : ?>
				<tr class="text-center">
					<td> <strong class="p-xl-2 rounded-pill text-light <?= color($i) ?>"><?= (strlen($state['id']) == 1) ? '0'.$state['id'] : $state['id']; ?></strong> </td>
					<td><?= $state['name']; ?></td>
					<td>
						<a href="<?= site_url('state/edit/'.$state['id'])?>" class="btn btn-primary btn-sm">Edit</a>
						<a href="<?= site_url('state/delete/'.$state['id'])?>" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
				<?php $i++;  ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

