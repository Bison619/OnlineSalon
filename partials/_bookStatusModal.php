<style>
    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative;
    }

    .track .step.active:before {
        background: #FF5722;
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px;
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff;
    }

    .track .step.deactive:before {
        background: #030303;
    }

    .track .step.deactive .icon {
        background: #030303;
        color: #fff;
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd;
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000;
    }

    .track .text {
        display: block;
        margin-top: 7px;
    }
</style>
<?php
$statusmodalsql = "SELECT * FROM `bookings` WHERE `user_id` = $id";
$statusmodalresult = mysqli_query($conn, $statusmodalsql);

while ($statusmodalrow = mysqli_fetch_assoc($statusmodalresult)) {
    $bookingId = $statusmodalrow['id'];
    $status = $statusmodalrow['bookStatus'];

    if ($status == 0)
        $bookingStatus = "Booking Placed";
    elseif ($status == 1)
        $bookingStatus = "Booking Complete";
    elseif ($status == 2)
        $bookingStatus = "Missed Booking";
    elseif ($status == 3)
        $bookingStatus = "Booking Denied";
    else
        $bookingStatus = "Booking Cancelled";
?>
    <!-- Modal -->
    <div class="modal fade" id="bookStatus" tabindex="-1" role="dialog" aria-labelledby="bookStatus" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="zoom:150%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookStatus">Booking Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="printThis" style="background-color: #eeeeee; font-family: 'Open Sans', serif; padding-right: 0px; padding-left: 0px;">
                    <div class="container">
                        <article class="card" style="position: relative; display: -webkit-box; display: -ms-flexbox; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column; min-width: 0; word-wrap: break-word; background-color: #fff; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 0.10rem;">
                            <div class="card-body" style="padding: 0.75rem 1.25rem; margin-bottom: 0; background-color: #fff; border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
                                <h6><strong>Book ID:</strong> #<?php echo $bookingId; ?></h6>
                                <p><strong>Status:</strong> <?php echo $bookingStatus; ?></p>
                                <div class="track" style="position: relative; background-color: #ddd; height: 7px; display: -webkit-box; display: -ms-flexbox; display: flex; margin-bottom: 60px; margin-top: 50px;">

                                    <?php
                                    if ($status == 0) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Booking Placed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Booking Complete</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Missed Booking</span> </div>';
                                    } elseif ($status == 1) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Booking Placed</span> </div>
                                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Booking Complete</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Missed Booking</span> </div>';
                                    } elseif ($status == 2) {
                                        echo '<div class="step deactive">
                                            <span class="icon"> <i class="fa fa-times"></i> </span>
                                            <span class="text">Booking Missed.</span>
                                        </div>
                                        <script>alert("You have missed the booking time. Please visit our store for refund process and further information.");</script>';
                                    } elseif ($status == 3) {
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Booking Placed</span> </div>
                                            <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Booking Denied.</span> </div>
                                            <script>alert("We are very sorry but we have declined your booking. Please visit our store for the refund process and further information.");</script>';
                                    } else {
                                        echo '<div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Booking Cancelled.</span> </div>
                                            <script>alert("We are very sorry but we have cancelled your booking. Please visit our store for the refund process and further information.");</script>';
                                    }
                                    ?>
                                </div>
                                <a href="contact.php" class="btn btn-warning" data-abc="true" style="color: #ffffff; background-color: #ee5435; border-color: #ee5435; border-radius: 1px;">Help <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>
