<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('layouts/header.php');
?>

<div class="container main-content">
	<h1 class="page-title">All Products <button type="button" class="btn btn-info float-right add-btn" data-toggle="modal" data-target="#productModal">New Product</button> </h1>

	

	<table class="table table-striped" id="load_data">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">Category</th>
				<th scope="col">Sub Category</th>
				<th scope="col">Collection</th>
				<th scope="col">Tags</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>

</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="new_product">
				<input type="hidden" value="0" name="item_id">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" name="name" class="form-control" placeholder="Product Name" required>
					</div>

					<div class="form-group">
						<label>Price</label>
						<input type="number" name="price" min="1" class="form-control" placeholder="Price" required>
					</div> 

					<div class="form-group">
						<label>Category</label>
						<input type="text" name="category" class="form-control" placeholder="Category" required>
					</div>

					<div class="form-group">
						<label>Sub Category</label>
						<input type="text" name="subcategory" class="form-control" placeholder="Sub Category" required>
					</div>

					<div class="form-group">
						<label>Collection</label>
						<select class="form-control" name="collection_id" required>
							<option value="">Choose from collections</option>
							<?php foreach ($collections as $collection) {
								echo "<option value=".$collection->id.">".$collection->name."</option>";
							} ?>
						</select>
					</div>

					<div class="form-group">
						<label>Tags</label>
						<input type="text" name="tags" class="form-control" placeholder="Speard tags with ," required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info" id="save_data">Save</button>
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
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>