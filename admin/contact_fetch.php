<?php
include('includes/header.php');
include('database/security.php');
include('includes/navbar.php');
include('database/conn.php');
?>
<div class="container">
    <hr class="mx-auto mt-4 mb-2">
    <h3 class="page-header text-center">Contact-us Records</h3>
    <hr class="mx-auto mt-2 mb-2"> 
    <div class="container mt-3">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Send_Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $conn->prepare("SELECT * FROM contactus");
                $stmt->execute();
                $result = $stmt->get_result();                
                while ($row = $result->fetch_assoc()) :
                    ?>
                    <tr class="text-center">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['message'] ?></td>
                        <td><?= $row['send_time'] ?></td>                                      
                        <td>
                            <a href="action/delete_rc.php?id=<?= $row['id'] ?>" title="Delete" class="text-danger"><i class="fa fa-trash fa-lg"></i></a> 
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        showdata();
    });
    function deleterc(id) {
        var conf = confirm("Are you Sure to Delete Record?");
        if (conf == true) {
            $.ajax({
                url: "delete_rc.php",
                type: 'post',
                data: {
                    id: id
                },

                success: function(data, status) {
                    showdata();
                }
            });
        }
    }
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>