 

 <!-- Sign up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true" >
      <div class="modal-dialog" role="document">
        <div class="modal-content" >
          <div class="modal-header" style="background-color: rgb(42, 32, 28);">
            <h5 class="modal-title" id="signupModal" style=" font-size: 250%; color:white;" ><b>SignUp Here</b></h5>
            <button style=" font-size: 300%; color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleSignup.php" method="post">
              <div class="form-group">
                  <label for="username" style=" font-size: 200%;">Username</label>
                  <input style=" font-size: 150%;" class="form-control" id="username" name="username" placeholder="Choose a unique Username" type="text" required minlength="3" maxlength="11">
              </div>
              <div class="form-group">
                  <label for="fullname" style=" font-size: 200%;">FullName :</label>
                  <input style=" font-size: 150%;"type="text" class="form-control" id="fullName" name="fullName" placeholder="FullName" required>
              </div>
              <div class="form-group">
                  <label for="email" style=" font-size: 200%;">Email:</label>
                  <input style=" font-size: 150%;" type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
              </div>
              <div class="form-group">
                <label for="phone" style=" font-size: 200%;">Phone No:</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span style=" font-size: 150%;" class="input-group-text" id="basic-addon">+977</span>
                  </div>
                  <input  style=" font-size: 150%;"type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10">
                </div>
              </div>
              <div class="text-left my-2">
                  <label for="password" style=" font-size: 200%;">Password:</label>
                  <input style=" font-size: 150%;"class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <div class="text-left my-2">
                  <label for="password1" style=" font-size: 200%;">Renter Password:</label>
                  <input style=" font-size: 150%;" class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
              </div>
              <button style=" font-size: 200%;" type="submit" class="btn btn-success">Submit</button>
            </form>
            <p class="mb-0 mt-1"style=" font-size: 120%;">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a>.</p>
          </div>
        </div>
      </div>
    </div>
