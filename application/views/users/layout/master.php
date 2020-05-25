<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
if (!isset($_SESSION)) :
redirect(site_url('login'));
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact-System</title>
	<link rel="stylesheet" href="<?= site_url('assets/css/bootstrap.css')?>">
	<link rel="stylesheet" href="<?= site_url('assets/font-awesome/css/font-awesome.css')?>">
	<script src="<?= site_url('assets/js/jquery.js') ?>"></script>
</head>
<body class="m-n3">
<div class="container-fluid">
	<header>
		<div class="flex-wrap mt-3 bg-dark py-3">
			<ul class="d-xl-inline-flex mb-0 pl-4">
				<a href="<?= site_url('/')?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark"><i class="fa fa-tachometer"></i> Dashboard</li></a>
				<a href="<?= site_url('register') ?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark"><i class="fa fa-user-plus"></i> Add New Contact</li></a>
				<a href="<?= site_url('states') ?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark"><i class="fa fa-globe"></i> States</li></a>
				<a href="<?= site_url('lgas') ?>" class="text-decoration-none px-2"><li class="nav-link bg-light rounded text-dark"><i class="fa fa-road"></i> Local Govt.</li></a>
			</ul>
			<div class="float-xl-right mx-xl-3">
				<form action="<?= site_url('logout') ?>" class="form-inline" method="post">
					<button class="btn btn-secondary"><i class="fa fa-sign-out"></i> Logout</button>
				</form>
			</div>
		</div>
	</header>
</div>

