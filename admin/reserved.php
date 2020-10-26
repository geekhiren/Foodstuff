<?php
include('includes/header.php');
include('database/security.php');
include('includes/navbar.php');
include('database/conn.php');

?>

<div class="container">
    <hr class="mx-auto mt-4 mb-2">
    <h3 class="page-header text-center">Reserved Data</h3>
    <hr class="mx-auto mt-2 mb-2">   
    <div class="container mt-3">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Person</th>
                    <th>Time_Stamp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $conn->prepare("SELECT * FROM reservation");
                $stmt->execute();
                $result = $stmt->get_result();                
                while ($row = $result->fetch_assoc()) :
                    ?>
                    <tr class="text-center">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['time'] ?></td>
                        <td><?= $row['person'] ?></td>
                        <td><?= $row['timestemp'] ?></td>                     
                        <td>
                            <button data-toggle="tooltip" data-placement="top" title="SEND" class="btn btn-success btn-sm" onclick="yes('<?php echo $row['id'] ?>')">
                                <i class="fa fa-check" aria-hidden="true"></i></button> ||
                                <button data-toggle="tooltip" data-placement="top" title="FAIL" class="btn btn-danger btn-sm" onclick="no('<?php echo $row['id'] ?>')">
                                    <i class="fa fa-times" aria-hidden="true"></i></button> || 
                                    <a href="action/delete_reserved.php?id=<?= $row['id'] ?>" ><i class="fa fa-trash fa-lg text-danger btn"></i></a>
                                    
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
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

        <?php
        include('includes/scripts.php');
        include('includes/footer.php');
        ?>

        <script>
            function yes(id) {
            // var conf = confirm("Are you Sure to Delete Food?");
            //if (conf == true) {
                $.ajax({
                    url: "phpmailer/sendmail.php",
                    type: 'post',
                    data: {
                        id: id
                    },

                    success: function(data, status) {
                        showdata();
                    }
                });
           // }
        }

        function no(id) {
            //var conf = confirm("Are you Sure to Delete Food?");
           // if (conf == true) {
                $.ajax({
                    url: "phpmailer/rejectedmail.php",
                    type: 'post',
                    data: {
                        id: id
                    },

                    success: function(data, status) {
                        showdata();
                    }
                });
           // }
        }
    </script>