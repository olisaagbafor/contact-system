
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-xl shadow">
	<div class="row my-5 p-2">
		<div class="col-xl-4 justify-content-center ">
			<div class="card my-xl-3 shadow">
				<div class="card-body">
					<div class="text-center overflow-hidden">
						<h4 class="text-uppercase my-xl-3">Total Users</h4>
						<h1 class="text-muted"><?= count($users); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 justify-content-center ">
			<div class="card my-xl-3 shadow">
				<div class="card-body">
					<div class="text-center overflow-hidden">
						<h4 class="text-uppercase my-xl-3">Total States</h4>
						<h1 class="text-muted"><?= count($states); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 justify-content-center">
			<div class="card my-xl-3 shadow">
				<div class="card-body">
					<div class="text-center overflow-hidden">
						<h4 class="text-uppercase my-xl-3">Total L.G.A</h4>
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
			<tr>
				<th>#</th>
				<th>Name:</th>
				<th>Contact:</th>
				<th>Email:</th>
				<th>Gender:</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			foreach ($users as $user) {
				?>
				<tr>
					<td><?= $sn++;?></td>
					<td><?= $user['surname'].' '.$user['first_name'].' '.$user['other_names'] ; ?></td>
					<td><?= $user['contact'] ; ?></td>
					<td><?= $user['email'] ; ?></td>
					<td><?= $user['gender'] ; ?></td>
					<td>
						<a href="#" class="btn btn-primary">Edit</a>
					</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
