<?php
include('includes/header.php');
include('database/security.php');
include('includes/navbar.php');
?>

<div class="container">
	<hr class="mx-auto mt-4 mb-2">
	<h3 class="page-header text-center">User CRUD</h3>
	<hr class="mx-auto mt-2 mb-2">
	<div class="container mt-3">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr class="text-center">
					<th>ID</th>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Phone</th>					
					<th>Role</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 		
				$stmt = $conn->prepare("SELECT * FROM users");
				$stmt->execute();
				$result = $stmt->get_result();                
				while ($row = $result->fetch_assoc()) :
					?>
					<tr class="text-center">
						<td><?= $row['id'] ?></td>
						<td><?= $row['name'] ?></td>
						<td><?= $row['username'] ?></td>
						<td><?= $row['email'] ?></td>	
						<td><?= $row['mobileno'] ?></td>
						<td><?= $row['user_role'] ?></td>
						<td>
							<a href="#" title="View Details" class="text-success"><i class="fa fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
							<a href="#" title="Edit" class="text-primary"><i class="fa fa-edit fa-lg"></i></a>&nbsp;&nbsp;
							<a href="#" title="Delete" class="text-danger"><i class="fa fa-trash fa-lg"></i></a> 
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>


	<?php 
	include('includes/scripts.php');
	include('includes/footer.php');
	?>