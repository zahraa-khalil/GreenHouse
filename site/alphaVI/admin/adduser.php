<?php include 'include/conn.php' ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php if(isset($_POST['addusersubmit'])) {
	     // clean up inputs
	
	
	$fname		    =  $_POST['Firstname'];
    $lname			=  $_POST['Lastname'];
    $username 		=  $_POST['Username'];
    $password 		= sha1( $_POST['Password']);
    $email 			=  $_POST['Email'];
	$address		=  $_POST['Address'];
    $phone			=  $_POST['Phone'];
    $Role			=  $_POST['Role'];

         // check if username is already in use in both cms_users and cms_comments
         $sql = "SELECT Username FROM users 
         WHERE Username = '$username'";
     
         $add_user = mysqli_query($con, $sql);

        // check if all fields are entered, then check if passwords are the same

         if(empty($username) || empty($email) || empty($password) || empty($fname) || empty($lname) || empty($address) || empty($phone))  {
         $div_class = 'danger';
         $msg = 'Please fill in all required fields.';
         } elseif($password !== $password) {
         $div_class = 'danger';		
         $msg = 'Passwords fields do not match. Please try again.';
         }	elseif(!$email) {
         $div_class = 'danger'; 
         $msg = 'Please enter a vaild email address.';
         } elseif(mysqli_num_rows($add_user) > 0) {
         $div_class = 'danger';
         $msg = 'Sorry, that username is already in use. Please choose another.';


            }else{

                $sql = "INSERT INTO users(Firstname, Lastname ,Username ,Password,Email, Address, Phone,Role)
                              VALUES ('$fname', '$lname', '$username','$password','$email','$address','$phone','$Role')";


                $reg = mysqli_query($con, $sql);
           			
                 if($reg) {
                     $div_class = 'success';
                     $msg = 'You Have Successfully Registered! ';
                     $msg .= 'Go to <a href="index.php">Home Page</a> to log in.';
                     $username = "";
                     $email = "";
                     $fname = "";
                     $lname = "";
                                  } else {
                                      $div_class = 'danger';
                                      $msg = 'Database error: '. mysqli_error($con);
                                  }
                      }


                          }else {
                                   $fname		    ="";
                                   $lname			="";
                                   $username        = "";
                                   $password 		=  "";
                                   $email 			=  "";
                                   $address	    	= "";
                                   $phone			=  "";

                                }
    ?>
    <?php
             	// if 'Clear Form' button is pressed
             	if(isset($_POST['clearform'])) {
             	$fname	        ="";
                 $lname			="";
                 $username      = "";
                 $password 		=  "";
                 $email 		=  "";
             	$address		= "";
                 $phone			=  "";;
            }
?>




      

  <form action="" method="post" enctype="multipart/form-data">
  <?php if(!empty($msg)):?>							
							<div class="alert alert-<?php echo $div_class;?>">
								<?php echo $msg;?>
							</div>
					<?php endif;?>

<div class="row">	<!-- ------------- 1st row --------------------- -->
<div class="col-md-6">
    <div class="form-group">
        <label for="Firstname" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
">Firstname </label>
        <input type="text" class="form-control" name="Firstname" 
            value="<?php echo $fname;?>">
    </div>	
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="Lastname" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
">Lastname</label>
        <input type="text" class="form-control" name="Lastname"
            value="<?php echo $lname;?>">
    
            
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="Username"  style="  color: #1e0d53;font-family: 'Lato', sans-serif;
" >Username</label>
        <input type="text" class="form-control" name="Username"
            value="<?php echo $username;?>">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="Phone" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
">Phone</label>
        <input type="text" class="form-control" name="Phone"
            value="<?php echo $phone;?>">
    </div>
</div>
</div>

<div class="row">	<!--  2nd row  -->
<div class="col-md-6">
    <div class="form-group">
        <label for="Password" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
">Password </label>
        <input type="password" class="form-control" name="Password">
    </div>	
</div>
 <div class="col-md-6">
    <div class="form-group">
        <label for="Address" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
"> Address</label>
        <input type="text" class="form-control" name="Address"
        value="<?php echo $address;?>">
    </div> 
</div>
</div>

<div class="row">	<!--  3rd row  -->
<div class="col-md-6">
    <div class="form-group">
        <label for="Email" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
">Email</label>
        <input type="email" class="form-control" name="Email"
            value="<?php echo $email;?>">
    </div>
</div>
</div>

<div class="row">	<!-- 4th row  -->
 <div class="col-md-6">	
   <!-- <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" accept="image/*" name="user_image">
    </div> -->
</div>
<div class="col-md-6">
    <div class="form-group">
        <label  for="Role" style="  color: #1e0d53;font-family: 'Lato', sans-serif;
">Role</label>
        
        <select name="Role">

        <?php

        $roles = array('Customer','administrator' );

        ?>

            <?php	foreach($roles as $role): ?>
			<?php 		if($role == $Role):?>
				<option value="<?php echo $role;?>" selected><?php echo $role;?></option>
			<?php 		else:?>
				<option value="<?php echo $role;?>"><?php echo $role;?></option>
			<?php		endif;?>
			<?php	endforeach;?>	
			</select>


      <button type="submit" name="addusersubmit" class="btn  add-del-btn" style="background:#1e0d53;color:#fff">
			<i class="fa fa-plus"style="color:#fff;" ></i> Add User</button>
	         <a href="index.php?viewallusers" class="btn " style="background:#d0098d;color:#fff">
			 <i class="fa fa-eye" style="color:#fff;"></i> View All Users</a>
	 <button type="submit" name="clearform" class="btn btn-default add-del-btn">
			<i class="fa fa-eraser"></i> Clear Form</button>
</form>
    
























    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>