<?php

include('../database/conn.php');

if(!empty($_POST))
{
   $output = '';
   $pname = $_POST["name"];  
   $pprice = $_POST["address"];  
   $pimage = $_POST["gender"];  
   $pcode = $_POST["designation"];  
  
   $query = "
   INSERT INTO employee(name, address, gender, designation, age)  
   VALUES('$name', '$address', '$gender', '$designation', '$age')
   ";
   if(mysqli_query($connect, $query))
   {
       $output .= '<label class="text-success">Data Inserted</label>';
       $select_query = "SELECT * FROM employee ORDER BY id DESC";
       $result = mysqli_query($connect, $select_query);
       $output .= '
       <table class="table table-bordered">  
       <tr>  
       <th width="70%">Employee Name</th>  
       <th width="30%">View</th>  
       </tr>

       ';
       while($row = mysqli_fetch_array($result))
       {
          $output .= '
          <tr>  
          <td>' . $row["name"] . '</td>  
          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
          </tr>
          ';
      }
      $output .= '</table>';
  }
  echo $output;
}
?>


select.php


<?php  
//select.php  
if(isset($_POST["employee_id"]))
{
   $output = '';
   $connect = mysqli_connect("localhost", "root", "", "testing");
   $query = "SELECT * FROM employee WHERE id = '".$_POST["employee_id"]."'";
   $result = mysqli_query($connect, $query);
   $output .= '  
   <div class="table-responsive">  
   <table class="table table-bordered">';
   while($row = mysqli_fetch_array($result))
   {
       $output .= '
       <tr>  
       <td width="30%"><label>Name</label></td>  
       <td width="70%">'.$row["name"].'</td>  
       </tr>
       <tr>  
       <td width="30%"><label>Address</label></td>  
       <td width="70%">'.$row["address"].'</td>  
       </tr>
       <tr>  
       <td width="30%"><label>Gender</label></td>  
       <td width="70%">'.$row["gender"].'</td>  
       </tr>
       <tr>  
       <td width="30%"><label>Designation</label></td>  
       <td width="70%">'.$row["designation"].'</td>  
       </tr>
       <tr>  
       <td width="30%"><label>Age</label></td>  
       <td width="70%">'.$row["age"].'</td>  
       </tr>
       ';
   }
   $output .= '</table></div>';
   echo $output;
}
?>
