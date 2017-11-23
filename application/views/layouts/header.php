<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Parent Assessment</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?= base_url()?>">
			<img src="http://parent.eu/images/logo.png" class="d-inline-block align-top" alt="">
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">

				<li class="nav-item <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "product"){ echo "active";} ?>">
					<a class="nav-link" href="<?= base_url()?>">Products</a>
				</li>
				<li class="nav-item <?php if($this->uri->segment(1) == "collection"){ echo "active";} ?>">
					<a class="nav-link" href="<?= base_url()?>collection">Collections</a>
				</li>
				<li class="nav-item <?php if($this->uri->segment(1) == "order" && $this->uri->segment(2) == "show"){ echo "active";} ?>">
					<a class="nav-link" href="<?= base_url()?>order/show">Orders</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($this->uri->segment(1) == "order" && $this->uri->segment(2) == ""){ echo "active";} ?>" href="<?= base_url()?>order">Make Order</a>
				</li>
			</ul>
		</div>
	</nav>