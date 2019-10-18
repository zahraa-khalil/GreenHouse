<?php include 'include/conn.php' ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php 


       // Edit products 
        if(isset($_GET['editseed'])){
    
                 $edit_id = $_GET['editseed'];
                 $sql = "SELECT * FROM seeds WHERE Seed_ID = '$edit_id'"; 
                 $stmt = mysqli_query($con,$sql);
                 $row = mysqli_fetch_array($stmt);
                 $Seed_ID = $row['Seed_ID'];
                 $Seedtitle = $row['Seedtitle'];
                 $Min = $row['Min'];
                 $Max = $row['Max'];
                 $Seedimg = $row['Seedimg'];
    
    
             }


?>


<body>

<div class="row">

<div class="col-lg-12">
    
    <ol class="breadcrumb">
        
        <li class="active">
            
            <i class="fa fa-dashboard"></i> Dashboard / Edit Seeds
            
        </li>
        
    </ol>
    
</div>

</div>
   
<div class="row">

<div class="col-lg-12">
    
    <div class="panel panel-default">
        
       <div class="panel-heading">
           
           <h3 class="panel-title">
               
               <i class="fa fa-money fa-fw"></i> Edit Seeds
               
           </h3>
           
       </div> 
       
       <div class="panel-body">
           
           <form method="post" class="form-horizontal" enctype="multipart/form-data">
               
               <div class="form-group">
                   
                  <label class="col-md-3 control-label"> Seed Title </label> 
                  
                  <div class="col-md-6">
                      
                      <input name="Seedtitle" type="text" class="form-control"  value="<?php echo $Seedtitle; ?>">
                      
                  </div>
                   
               </div>
               
               
               
               <!-- <div class="form-group">
                   
                  <label class="col-md-3 control-label"> Category </label> 
                  
                  <div class="col-md-6">
                      
                      <select name="cat" class="form-control">
                          
                          <option value="<?php echo $Seed_ID; ?>"> <?php echo $ProductTitle; ?> </option>
                          
                          <?php 
                          
                          $get_cat = "SELECT * FROM category";
                          $run_cat = mysqli_query($con,$get_cat);
                          
                          while ($row=mysqli_fetch_array($run_cat)){
                              
                              $Category_ID = $row['Category_ID'];
                              $cat_title = $row['Categorytitle'];
                              
                              echo "<option value='$Category_ID'> $cat_title </option> ";
                              
                          }
                          
                          ?>
                          
                      </select>
                      
                  </div>
                   
               </div>
                -->
               <div class="form-group">
                   
                  <label class="col-md-3 control-label"> Product Image  </label> 
                  
                  <div class="col-md-6">
                      
                      <input name="Seedimg" type="file" class="form-control" >
                      
                      <br>
                      
                      <img width="70" height="70" src="product_images/<?php echo $Productimg; ?>" alt="<?php echo $Productimg; ?>">
                      
                  </div>
               </div>
               
               
               
               <div class="form-group">
                   
                  <label class="col-md-3 control-label"> Min </label> 
                  
                  <div class="col-md-6">
                      
                      <input name="Min" type="number" class="form-control"  value="<?php echo $Min; ?>">
                      
                  </div>
                   
               </div>
               <div class="form-group">
                   
                  <label class="col-md-3 control-label"> Max </label> 
                  
                  <div class="col-md-6">
                      
                      <input name="Max" type="number" class="form-control"  value="<?php echo $Max; ?>">
                      
                  </div>
                   
               </div>
               
            
                   
               </div>
               
               <div class="form-group">
                   
                  <label class="col-md-3 control-label"></label> 
                  
                  <div class="col-md-6">
                      
                      <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                      
                  </div>
                   
               </div>
               
           </form>
           
       </div>
        
    </div>
    
</div>

</div>  



<?php 

if(isset($_POST['update'])){

    
    $Seedtitle = $_POST['Seedtitle'];
    $Min = $_POST['Min'];
    $Max = $_POST['Max'];
    $Seedimg = $_FILES['Seedimg']['name'];
    $temp_name = $_FILES['Seedimg']['tmp_name'];
    move_uploaded_file($temp_name,"seed_images/$Seedimg");

$sql = "UPDATE Seeds SET Seedtitle='$Seedtitle',Min='$Min',Max='$Max',Seedimg='$Seedimg' WHERE Seed_ID='$Seed_ID'";


$run_seed = mysqli_query($con,$sql);

if($run_seed){
    
   echo "<script>alert('Your product has been updated Successfully')</script>"; 
    
   echo "<script>window.open('index.php?viewallseed','_self')</script>"; 
    
}else  echo("Error description: ".mysqli_error($con));

}


?>


