<div class="modal fade" id="deleterc<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center"><?php echo $row['name']; ?> || <?php echo $row['email']; ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                <a href="delete_rc.php?name=<?php echo $row['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                <?php include('modal/rcmodal.php'); ?>
            </div>
        </div>
    </div>
</div>
