
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


<div class="container-xl col-xl-8 mx-xl-auto my-xl-2">
	<div class="row">
		<div class="col-xl-12 float-xl-right my-xl-3">
			<a href="<?= site_url('lga/setup/create') ?>" class="btn btn-dark float-xl-right">Add New LGA</a>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover shadow">
			<thead class="thead-dark">
			<tr class="text-center bg">
				<th>#</th>
				<th>State:</th>
				<th>LGA:</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($lgas as $lga) : ?>
				<tr class="text-center">
					<td> <strong class="p-xl-2 rounded-pill text-light <?= color($i) ?>"><?= (strlen($lga['id']) == 1) ? '0'.$lga['id'] : $lga['id']; ?></strong> </td>
					<td><?= $lgas['state']['name']; ?></td>
					<td><?= $lga['name']; ?></td>
					<td>
						<a href="<?= site_url('lga/setup/edit/'.$lga['id'])?>" class="btn btn-primary btn-sm">Edit</a>
						<a href="<?= site_url('lga/delete/'.$lga['id'])?>" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
				<?php $i++;  ?>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

