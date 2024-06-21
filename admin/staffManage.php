

<div class="container-fluid" style="margin-top:98px">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4" >
			<form action="partials/_staffManage.php" method="post" enctype="multipart/form-data" id="adminsti" > 
				<div class="card mb-3" >
					<div class="card-header" style="background-color: rgb(111 202 203);">
						Add Stylists
				  	</div>
					<div class="card-body" >
							<div class="form-group">
								<label class="control-label">Name: </label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Email: </label>
								<input type="text" class="form-control" name="email" required>
							</div>
							<div class="form-group">
								<label class="control-label">Address: </label>
								<input type="text" class="form-control" name="address" required>
							</div>
							<div class="form-group">
								<label class="control-label">Contact: </label>
								<input type="text" class="form-control" name="contact" required>
							</div>
							<div class="form-group">
								<label class="control-label">Description: </label>
								<textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
							</div>
							
							<div class="form-group">
								<label for="image" class="control-label">Image</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="mx-auto">
								<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Create </button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->
			
			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table id="" class="table table-bordered table-hover mb-0">
							<thead style="background-color: rgb(111 202 203);">
								<tr>
								<th class="text-center"  data-sort="name" style="width:7%;">Id</th>
									<th class="text-center" data-sort="age">Image</th>
									<th class="text-center" data-sort="breed" style="width:58%;">Staff Detail</th>
									<th class="text-center" data-sort="gender" style="width:18%;">Action</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $sql = "SELECT * FROM `staffdetails`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $name = $row['name'];
									$email = $row['email'];
									$address = $row['address'];
                                    $contact = $row['contact'];
                                    $description = $row['description'];
                               

                                    echo '<tr>
                                            <td class="text-center">' .$id. '</td>
											<td>
											<img src="/OnlineSalon/assets/images/stylist-'.$id. '.jpg" alt="image for this item" style=" width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
										</td>
                                            
                                            <td>
                                                <p>Name : <b>' .$name. '</b></p>
												<p>Email : <b>' .$email. '</b></p>
												<p>Address : <b>' .$address. '</b></p>
                                                <p>Description : <b class="truncate">' .$description. '</b></p>
                                                <p>contact : <b>' .$contact. '</b></p>
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:112px">
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$id. '">Edit</button>
													<form action="partials/_staffManage.php" method="POST">
														<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
														<input type="hidden" name="id" value="'.$id. '">
													</form>
												</div>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
					
					</div>
				</div>
			</div>
			
			<!-- Table Panel -->
		</div>
	
  </div>	
  
</div>

<?php 
    $sql = "SELECT * FROM `staffdetails`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
		$email = $row['email'];
        $address = $row['address'];
        $contact = $row['contact'];
        $description = $row['description'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateItem<?php echo $id; ?>">Stylist Id: <?php echo $id; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_staffManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/OnlineSalon/assets/images/stylist-<?php echo $id; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" style=" width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
				</div>
			</div>
		</form>
		<form action="partials/_staffManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $name; ?>" type="text" required>
            </div>
			<div class="text-left my-2">
                <b><label for="email">Email</label></b>
                <input class="form-control" id="email" name="email" value="<?php echo $email; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
			<div class="form-group col-md-6">
					<b><label for="address">Address</label></b>
                	<input class="form-control" id="address" name="address" value="<?php echo $address; ?>" type="text" required>
				</div>
				<div class="form-group col-md-6">
                	<b><label for="contact">Contact</label></b>
                	<input class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" type="number" min="1" required>
				</div>
				
            </div>
            <div class="text-left my-2">
                <b><label for="description">Description</label></b>
                <textarea class="form-control" id="description" name="description" rows="2" required minlength="6"><?php echo $description; ?></textarea>
            </div>
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Update</button>
        </form>
	

      </div>
    </div>
  </div>
</div>

<?php
	}
?>