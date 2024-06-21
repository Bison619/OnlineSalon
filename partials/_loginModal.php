<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" >
          <div class="modal-header" style="background-color: rgb(42, 32, 28); ">
            <h5 class="modal-title" id="loginModal" style=" font-size: 250%; color:white;"><b>Login Here</b></h5>
            <button style=" font-size: 300%; color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="partials/_handleLogin.php" method="post">
              <div class="text-left my-2">
                  <label for="username" style=" font-size: 200%;">Username</label>
                  <input style=" font-size: 150%;" class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
              </div>
              <div class="text-left my-2">
                  <label for="password" style=" font-size: 200%;">Password</label>
                  <input style=" font-size: 150%;" class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password">
              </div>
              <button style=" font-size: 200%;" type="submit" class="btn btn-success">Submit</button>
            </form>
            <p style=" font-size: 120%;"class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Sign up now</a>.</p>
          </div>
        </div>
      </div>
    </div>

