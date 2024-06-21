<?php 
    $itemModalSql = "SELECT * FROM `bookings`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $id = $itemModalRow['id'];
        $bookStatus = $itemModalRow['bookStatus'];
    
?>

<!-- Modal -->
<div class="modal fade" id="bookStatus" tabindex="-1" role="dialog" aria-labelledby="bookStatus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="bookStatus<?php echo $id; ?>">Order Status and Delivery Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_bookmanage.php" method="post" style="border-bottom: 2px solid #dee2e6;">
            <div class="text-left my-2">    
                <b><label for="name">Order Status</label></b>
                <div class="row mx-2">
    <div class="col-md-6">
        <select class="form-control" id="status" name="status" required>
            <option value="">Select Order Status</option>
            <option value="0">Booking Placed</option>
            <option value="1">Booking Complete</option>
            <option value="2">Booking Missed</option>
            <option value="3">Booking Denied</option>
            <option value="4">Booking Cancelled</option>
        </select>
    </div>
</div>

            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>

<style>
    .popover {
        top: -77px !important;
    }
</style>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>