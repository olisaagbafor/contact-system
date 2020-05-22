
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl">
	<div class="row justify-content-center">
		<?php
		if (isset($success)): ?>
			<div class="alert alert-success col-xl-12 py-xl-3 mt-xl-3">
				<?= $success; ?>
			</div>
		<?php endif;
		if (isset($error)) : ?>
			<div class="alert alert-danger col-xl-12 py-xl-3 mt-xl-3">
				<?= $error; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="container-xl shadow">
	<div class="row my-3 p-2">
		<div class="col-xl-4 justify-content-center ">
			<div class="card my-xl-3 shadow">
				<div class="card-body">
					<div class="text-center overflow-hidden">
						<h4 class="text-uppercase my-xl-3 text-primary">Total Users</h4>
						<h1 class="text-muted"><?= count($users); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 justify-content-center ">
			<div class="card my-xl-3 shadow">
				<div class="card-body">
					<div class="text-center overflow-hidden">
						<h4 class="text-uppercase my-xl-3 text-warning">Total States</h4>
						<h1 class="text-muted"><?= count($states); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 justify-content-center">
			<div class="card my-xl-3 shadow">
				<div class="card-body">
					<div class="text-center overflow-hidden">
						<h4 class="text-uppercase my-xl-3 text-danger">Total L.G.A</h4>
						<h1 class="text-muted"><?= count($lga); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xl-11 mx-xl-auto">
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead class="thead-dark">
			<tr class="text-center">
				<th>Photo</th>
				<th>Name:</th>
				<th>Contact:</th>
				<th>Email:</th>
				<th>Gender:</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user) :	?>
				<tr class="text-center">
					<td><img src="<?= site_url('photo/'.$user['photo']) ?>" alt="" class="img-fluid rounded-circle ml-xl-4 shadow" style="width: 40px;"></td>
					<td><?= $user['surname'].' '.$user['first_name'].' '.$user['other_names'] ; ?></td>
					<td><?= $user['contact'] ; ?></td>
					<td><?= $user['email'] ; ?></td>
					<td><?= $user['gender'] ; ?></td>
					<td>
						<a href="<?= site_url('user/edit/'.$user['id'])?>" class="btn btn-primary btn-sm">Edit</a>
						<a href="<?= site_url('user/view/'.$user['id'])?>" class="btn btn-dark btn-sm">View</a>
						<a href="<?= site_url('user/delete/'.$user['id'])?>" class="btn btn-danger btn-sm">Delete</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
