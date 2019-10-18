<!-- admin access to view users only --> 

<?php include 'include/conn.php' ?>
  <?php
       if(!isset($_SESSION)) 
          { 
             session_start(); 
          } 
    ?>

    
    <table class="table table-condensed table-bordered table-hover">
	<thead>
		<tr>
			<th style="width:4%;text-align:center;color:#1e0d53" >User_ID</th>
			<th style="width:8%;text-align:center;color:#1e0d53" >Firstname</th>
			<th style="width:11%;text-align:center;color:#1e0d53" >Lastname</th>
			<th style="width:11%;text-align:center;color:#1e0d53" >Username</th>
			<th style="width:15%;text-align:center;color:#1e0d53" >Email</th>
			<th style="width:9%;text-align:center;color:#1e0d53" >Phone</th>
			<th style="width:8%;text-align:center;color:#1e0d53" >Address</th>
			<th style="width:7%;text-align:center;color:#1e0d53" >Role</th>															
		</tr>								
	</thead>
	<tbody>

           <?php
	       	$sql = "SELECT * FROM users" ;
               $users = mysqli_query($con, $sql);
               while($row = mysqli_fetch_assoc($users)) {
       
                        $User_ID =$row['User_ID'];
                        $Firstname =$row['Firstname'];
                        $Lastname =$row['Lastname'];
                        $Username =$row['Username'];
                        $Email =$row['Email'];
                        $Phone =$row['Phone'];
                        $Address =$row['Address'];
                        $Role =$row['Role'];
                
                        
                        echo "<tr>";
            
                        echo "<td> $User_ID </td>";
                        echo "<td> $Firstname </td>";
                        echo "<td> $Firstname</td>";
                        echo "<td> $Username</td>";
                        echo "<td> $Email</td>";
                        echo "<td> $Phone</td>";
                        echo "<td> $Address</td>";
                        echo "<td> $Role</td>";
                    
                        // chage ROle Admin & user and Delete user
                        echo "<td><a href='viewallusers.php?ChangeToAdmin={$User_ID}'  >Admin</a></td>";
                        echo "<td><a href='viewallusers.php?ChangeToUser={$User_ID}'>Subscriber</a></td>";
                        echo "<td><a href='viewallusers.php?Delete={$User_ID}'>Delete</a></td>";
                   
                }
	       ?>
       

  <?php

  //change customer role to admin function
  
  if(isset($_GET['ChangeToAdmin'])){
                        $User_ID = $_GET['ChangeToAdmin'];
                        $sql  = "UPDATE users SET Role = 'Administrator' WHERE User_ID =$User_ID";
                        $stmt = mysqli_query($con , $sql);
    
                        header ('location: index.php?viewallusers'); //to refresh the page without click 2 times

  }

      // change admin to user function
      if(isset($_GET['ChangeToUser'])){
                        $User_ID = $_GET['ChangeToUser'];
                        $sql  = "UPDATE users SET Role = 'Customer' WHERE User_ID =$User_ID";
                        $stmt = mysqli_query($con , $sql);
    
                          header ('location: index.php?viewallusers');


  }

          // Delete the user
           if(isset($_GET['Delete'])){
                 
                     $User_ID = $_GET['Delete'];
                     $sql  = "DELETE FROM users WHERE User_ID = {$User_ID}";
                     $stmt = mysqli_query($con , $sql);
                     
                     header ('location: index.php?viewallusers');
                 

  }
  
  
  ?>




  
   
          
        
        