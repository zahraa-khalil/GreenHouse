<?php include 'include/conn.php' ?>




<?php 
           // insert product to database
          if(isset($_POST['submit'])){
    
                         $Seedtitle = $_POST['Seedtitle'];
                         $Min = $_POST['Min'];
                         $Max = $_POST['Max'];
                         //$Productdate = $_POST['Productdate'];
                         $Seedimg = $_FILES['Seedimg']['name'];
                         $temp_name = $_FILES['Seedimg']['tmp_name'];
                         move_uploaded_file($temp_name,"seed_images/$Seedimg");
    
                 $sql = "INSERT INTO seeds (Seedtitle,Seedimg,Min,Max)
                 VALUES ('$Seedtitle','$Seedimg','$Min','Max')";
                 $stmt = mysqli_query($con,$sql);
    
              if($stmt){
        
                       echo "<script>alert('seed has been inserted sucessfully')</script>";
                       echo "<script>window.open('index.php?viewallseed','_self')</script>";
        
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

                </div>

            </div> -->

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
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Seeds
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title"  style="color:#1e0d53">
                   
                   <i class="fa fa-money fa-fw" style="color:#1e0d53"></i> Insert Seeds 
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label" style="color:#1e0d53"> Seed Title </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="Seedtitle" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <!-- category selection -->
                   
                   
                   
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label" style="color:#1e0d53"> Seed Image  </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="Seedimg" type="file" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label" style="color:#1e0d53"> Min </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="Min" type="number" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label" style="color:#1e0d53"> Max </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="Max" type="number" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Insert Seed" type="submit" class="btn  form-control" style="background:#1e0d53;color:#fff;">
                          
                      </div>
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>






 
</body>

</html>