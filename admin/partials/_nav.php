    <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-layer nav__logo-icon'></i>
        </div>
        
        <div class="header__img">
            <img src="F:\xampp\htdocs\OnlineSalon\assets\images\logo.jpg" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Salon Booking</span>
                </a>

                <div class="nav__list">
                    <a href="index.php" class="nav__link nav-">
                      
                      <span class="nav__name">Home</span>
                    </a>
                    <a href="index.php?page=bookmanage" class=" nav__link nav-bookmanage">
                      
                      <span class="nav__name">Bookings</span>
                    </a>
                    <a href="index.php?page=staffManage" class="nav__link nav-staffManage">
                     
                      <span class="nav__name">Staffs</span>
                    </a>
                    <a href="index.php?page=contactManage" class="nav__link nav-contactManage">
                      
                      <span class="nav__name">Contact Info</span>
                    </a>
                    <a href="index.php?page=userManage" class="nav__link nav-userManage">
                      
                      <span class="nav__name">Users</span>
                    </a>
                    <a href="index.php?page=siteManage" class="nav__link nav-siteManage">
                      
                      <span class="nav__name">Site Settings</span>
                    </a>
                </div>
            </div>
            <a href="partials/_logout.php" class="nav__link">
              <i class='bx bx-log-out nav__icon' ></i>
              <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>  
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    <?php $page = isset($_GET['page']) ? $_GET['page'] :''; ?>
	  $('.nav-<?php echo $page; ?>').addClass('active')
</script>
   