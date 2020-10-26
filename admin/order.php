<?php 
include('includes/header.php'); 
include('database/security.php');
include('includes/navbar.php');
?>

<div class="container">
	<hr class="mx-auto mt-4 mb-2">
	<h3 class="page-header text-center">Orders Details</h3>
	<hr class="mx-auto mt-2 mb-2"> 
	<div class="container mt-3">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr class="text-center">
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Payment Mode</th>
					<th>Products</th>
					<th>Amount Paid</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$stmt = $conn->prepare("SELECT * FROM orders");
				$stmt->execute();
				$result = $stmt->get_result();                
				while ($row = $result->fetch_assoc()) :
					?>					
					<tr class="text-center">
						<td><?= $row['id'] ?></td>
						<td><?= $row['name'] ?></td>
						<td><?= $row['email'] ?></td>
						<td><?= $row['phone'] ?></td>
						<td><?= $row['address'] ?></td>
						<td><?= $row['pmode'] ?></td>
						<td><?= $row['products'] ?></td>
						<td><?= $row['amount_paid'] ?></td>						
						<td>
							<a href="#myModal" data-toggle="modal" title="View Details" class="text-success"><i class="fa fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;							
							<a href="action/delete_order.php?id=<?= $row['id'] ?>" title="Delete" class="text-danger"><i class="fa fa-trash fa-lg"></i></a>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>


<!--Orders View Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Orders Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php 
				$stmt = $conn->prepare("SELECT * FROM orders");
				$stmt->execute();
				$result = $stmt->get_result();                
				while ($row = $result->fetch_assoc()) :
					?>
					<table class="table table-striped table-bordered text-center">
						<tr>
							<th>ID</th>
							<td><?= $row['id'] ?></td>
						</tr>

						<tr>
							<th>NAME</th>
							<td><?= $row['name'] ?></td>
						</tr>

						<tr>
							<th>EMAIL</th>
							<td><?= $row['email'] ?></td>
						</tr>

						<tr>
							<th>PHONE</th>
							<td><?= $row['phone'] ?></td>
						</tr>

						<tr>
							<th>ADDRESS</th>
							<td><?= $row['address'] ?></td>
						</tr>

						<tr>
							<th>PAYMENT MODE</th>
							<td><?= $row['pmode'] ?></td>
						</tr>

						<tr>
							<th>PRODUCTS</th>
							<td><?= $row['products'] ?></td>
						</tr>

						<tr>
							<th>TOTAL AMOUNT</th>
							<td><?= $row['amount_paid'] ?></td>
						</tr>

					</table>
					
				<?php endwhile; ?>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Close</button>
			</div>

		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function () {
		$('.open').click(function () {
        $('#myModal').modal('show'); // popup #myModal id modal
    });
		$('.close').click(function () {
        $('#myModal').modal('hide'); // close #myModal id modal
    });
		$('.toggle').click(function () {
			$('#myModal').modal('toggle');
		});
	});
</script>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>