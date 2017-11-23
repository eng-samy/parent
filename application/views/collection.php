<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('layouts/header.php');
?>

	<div class="container main-content">
		<h1 class="page-title">All Collections <button type="button" class="btn btn-info float-right add-btn" data-toggle="modal" data-target="#collectionModal">New Collection</button> </h1>

		

		<table class="table table-striped" id="load_data">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Has Discount?</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="collectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form id="new_collection">
					<input type="hidden" value="0" name="item_id">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New Collection</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Collection Name</label>
							<input type="text" name="name" class="form-control" placeholder="Collection Name" required>
						</div>

						<div class="form-group">
							<label>Has Discount?</label>
							<select class="form-control" name="has_discount" required>
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
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
	<script src="<?php echo base_url(); ?>assets/js/collection.js"></script>

</body>
</html>