<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact-System</title>
	<link rel="stylesheet" href="<?= site_url('assets/css/bootstrap.css')?>">
	<script src="<?= site_url('assets/js/jquery.js') ?>"></script>
</head>
<body class="m-n3">
<div class="container-fluid">
	<header>
		<div class="flex-wrap mt-3 bg-dark py-3 row justify-content-center">
			<ul class="d-xl-inline-flex mb-0 pl-4">
				<a href="<?= site_url('/')?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark">Dashboard</li></a>
				<a href="<?= site_url('register') ?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark">Add Contact</li></a>
				<a href="<?= site_url('states') ?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark">States</li></a>
				<a href="#" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark">Local Govt.</li></a>
			</ul>
		</div>
	</header>
</div>

