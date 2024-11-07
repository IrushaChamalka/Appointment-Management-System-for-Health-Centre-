<?php 

?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Please Confirm Your Details</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">NAME:</label>
                <input class="form-control" type="text" id="name" name="name" disabled value="<?php echo $row['name_with_initials']?>">
            </div>
            <div class="form-group">
                <label for="tel">TEL:</label>
                <input class="form-control" type="tel" name="tel" id="tel" disabled value="<?php echo $row['mobile_number']?>">
            </div>
            <div class="form-group">
                <label for="nic">NIC:</label>
                <input class="form-control" type="text" name="nic" id="nic" disabled value="<?php echo $row['nic']?>">
            </div>
            <div class="form-group">
                <label for="date">DATE:</label>
                <input type="text" class="form-control" name="date" id="date" disabled value="<?php echo $selected ?>">
            </div>
            <div class="form-group">
                <label for="sheet">SHEET:</label>
                <input type="text" class="form-control" name="sheet" id="sheet" disabled value="<?php echo $sheet ?>">
            </div>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Additional Information</h5>
        </div>
        <form action="submit_appointment.php" method="post">
        <div class="modal-body">
            <div class="form-group">
                <label for="">REMARK:</label>
                <textarea class="form-control" name="remark"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href='.'">Close</button>
            
            <input type="submit" name="appoinment_submit" class="btn btn-primary" values="Place your appointment"/>
            
            
        </div>
        </form>
    </div>
</div>
