<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('layouts/header.php');
?>

	<div class="container main-content">
		<h1 class="page-title">All Orders <a href="<?= base_url() ?>api/v1/order.json" class="btn btn-info float-right add-btn">JSON API</a></h1>

		

		<table class="table table-striped" id="load_data">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Email</th>
					<th scope="col">Payment Method</th>
					<th scope="col">Shipping Costs</th>
					<th scope="col">Discount Value</th>
					<th scope="col">Total Amount </th>
				</tr>
			</thead>
			<tbody>

			<?php foreach ($orders as $order) { ?>
			<tr>
				<td><?= $order->id; ?></td>
				<td><?= $order->email; ?></td>
				<td><?= $order->payment_method; ?></td>
				<td>$<?= $order->shipping_costs; ?></td>
				<td>$<?= $order->discount_value; ?></td>
				<td>$<?= $order->total_amount_net; ?></td>
			</tr>
			<?php } ?>
				
			</tbody>
		</table>

	</div>

	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>