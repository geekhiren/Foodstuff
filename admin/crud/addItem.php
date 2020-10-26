<?php
include('database/conn.php');

if(isset($_POST['iproduct'])){

	$pname=$_POST['pname'];
	$pprice=$_POST['pprice'];	
	$fileinfo=PATHINFO($_FILES["pimage"]["name"]);
	$pcode=$_POST['pcode'];

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
		$newfilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newfilename);
		$location="upload/" . $newfilename;
	}

	$query="insert into product (product_name, product_price, product_image, product_code) values ('$pname', '$pprice', '$location', '$pcode')";
	$query_run=mysqli_query($conn,$query);

	if ($query_run) {
		header('Location:../product.php');
	}else{
		header('Location:../product.php');
	}
	
}

?>