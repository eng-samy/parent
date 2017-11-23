<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('layouts/header.php');
if(get_cookie('itemsNum')){ 
	$itemsNum = get_cookie('itemsNum');
}else{
	$itemsNum = 0;
}
?>

<div class="container main-content">
	<h1 class="page-title">Select from products <button type="button" class="btn btn-info float-right add-btn" data-toggle="modal" data-target="#productModal"><span class="order_nums"><?= $itemsNum ?></span> Make Order</button> </h1>

	<div class="row">
		<!-- BEGIN PRODUCTS -->
		<?php foreach ($products as $product) { ?>
		<div class="col-4">
			<span class="thumbnail">
				<img src="http://placehold.it/500x400" alt="...">
				<h4><?= $product->name ?></h4>
				<div class="ratings">
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star"></span>
					<span class="glyphicon glyphicon-star-empty"></span>
				</div>
				<p><?= $product->subcategory.'/'.$product->category ?> </p>
				<h5 class="collection"><?= $product->collection_name ?> </h5>
				<hr class="line">
				<div class="row">
					<div class="col">
						<p class="price">$ <span id="price_<?= $product->id ?>"><?= $product->price ?></span></p>
					</div>
					<div class="col">
						<button class="btn btn-success right addtocart" id="<?= $product->id ?>"> ADD TO CART</button>
					</div>

				</div>
			</span>
		</div>

		<?php } ?>

	</div>



</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="checkout">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Your Email" required>
					</div>

					<div class="form-group">
						<label>Payment Method</label>
						<select class="form-control" name="payment_method" required>
							<option value="Cash on delivery">Cash on delivery</option>
							<option value="VISA">VISA</option>
						</select>
					</div>

					<div class="alert alert-primary" role="alert">
					  + $10 Shipping Cost
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info" id="save_data">Confirm</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/order.js"></script>

</body>
</html>