<?php include 'include/conn.php' ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>




<?php 
           // insert product to database
          if(isset($_POST['submit'])){
    
                         $Sensor_Name = $_POST['Sensor_Name'];
        
    
                 $sql = "INSERT INTO sensors (Sensor_Name)
                 VALUES ('$Sensor_Name')";
                 $stmt = mysqli_query($con,$sql);
    
              if($stmt){
        
                       echo "<script>alert('sensor has been inserted sucessfully')</script>";
                       echo "<script>window.open('index.php?viewallsensor','_self')</script>";
        
                  }else{
                       echo("Error description: " . mysqli_error($con));
                   }
    
              }

?>











    <!--Dashboard -->
    <!-- <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Insert Product </h3>


                    <form method="POST" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Product Title </label>
                            <div class="col-md-6">
                                <input name="ProductTitle" type="text" class="form-control" required>
                            </div>
                        </div>
                </div>
            </div> -->

            <!-- category selection -->
             <!-- <div class="form-group">

                <label class="col-md-3 control-label"> Category </label>

                <div class="col-md-6">

                    <select name="cat" class="form-control">

                        <option> Select a Category </option>

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

                </div> -->

            </div> 

            <!-- image selection -->
            <!-- <div class="form-group">

                <label class="col-md-3 control-label"> Product Image </label>

                <div class="col-md-6">

                    <input name="Productimg" type="file" class="form-control" required>

                </div>

            </div> -->

            <!-- Edit Price -->
            <!-- <div class="form-group">

                <label class="col-md-3 control-label"> Product Price </label>

                <div class="col-md-6">

                    <input name="Productprice" type="text" class="form-control" required>

                </div>

            </div>
            <div class="col-md-6">

                <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">

            </div>

        </div>

        </form>
    </div>
    </div> -->

<!-- ---------------------------------------------- -->

    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Sensor
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title"  style="color:#1e0d53">
                   
                   <i class="fa fa-money fa-fw"></i> Insert Sensor 
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"  style="color:#1e0d53"> Sensor Name </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="Sensor_Name" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <!-- category selection -->
                   <!-- <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Product Category </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="product_cat" class="form-control">
                              
                              <option> Select a Category Product </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div> -->
                   
                   
                   
                   
            
                   
                   <!-- <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Product Desc </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div>
                       
                   </div> -->
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Insert Product" type="submit" class="btn  form-control" style="background:#1e0d53;color:#fff;">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>






 
</body>

</html>