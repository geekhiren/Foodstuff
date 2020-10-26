<?php
include('database/security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container">
	<hr class="mx-auto mt-4 mb-2">
	<h3 class="page-header text-center">Products CRUD</h3>
	<hr class="mx-auto mt-2 mb-2">
	<div class="text-center">
		<!-- Add Product -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
			Add New Product
		</button>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">ADD NEW PRODUCT</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" action="crud/addItem.php" enctype="multipart/form-data" id="add">

					<div class="modal-body">
						<input type="hidden" id="pid" name="pid" class="form-control" required>
						<div class="form-group">
							<label>Product Name :</label>
							<input type="text" id="pname" name="pname" class="form-control" placeholder="Enter product-name" required>
						</div>
						<div class="form-group">
							<label>Product Price :</label>
							<input type="text" id="pprice" name="pprice" class="form-control" placeholder="Enter product-price" required>
						</div>
						<div class="form-group">
							<label>Product Image :</label>

							<div class="form-control">
								<input type="file" id="p_image" name="pimage">
							</div>

						</div>
						<div class="form-group">
							<label>Product Code :</label>
							<input type="text" id="pcode" name="pcode" class="form-control" placeholder="Enter Uniqe Code" required>
						</div>						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Close</button>
						<button type="submit" name="iproduct" class="btn btn-primary"><i class="fa fa-floppy-o fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Save</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<hr class="mx-auto mt-2 mb-2">


	<div class="container mt-3">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr class="text-center">
					<th>ID</th>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Product Code</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 		
				$stmt = $conn->prepare("SELECT * FROM product");
				$stmt->execute();
				$result = $stmt->get_result();                
				while ($row = $result->fetch_assoc()) :
					?>
					<tr class="text-center">
						<td><?= $row['id'] ?></td>
						<td><img src="<?= $row['product_image'] ?>" width="50" height="50"></td>
						<td><?= $row['product_name'] ?></td>
						<td><?= $row['product_price'] ?></td>
						<td><?= $row['product_code'] ?></td>
						<td>
							<button type="button" data-toggle="modal" name="view" id="<?php echo $row["id"]; ?>" class="text-success view_data"><i class="fa fa-info-circle fa-lg"></i></button>
							<button type="button" class="text-primary deletebtn"><i class="fa fa-edit fa-lg"></i></button>								
							<button type="button" class="text-danger deletebtn"><i class="fa fa-trash fa-lg"></i></button>								
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr class="text-center">
					<th>ID</th>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Product Code</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>







<!--Delete View Modal -->
<div class="modal fade" id="deleteItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Close</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash fa-lg" aria-hidden="true" ></i>&nbsp;&nbsp;Delete</button>
			</div>
		</div>
	</div>
</div>

<!--Delete View Modal -->
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Product Details</h4>  
                </div>  
                <div class="modal-body" id="product_id">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  


<script>
	$(document).on('click', '.view_data', function(){  
           var product_id = $(this).attr("id");  
           if(product_id != '')  
           {  
                $.ajax({  
                     url:"action/view_product.php",  
                     method:"POST",  
                     data:{product_id:product_id},  
                     success:function(data){  
                          $('#product_id').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
</script>

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>