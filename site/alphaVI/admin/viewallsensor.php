<?php include 'include/conn.php' ?>



  

       <!--Delete products -->
          <?php   if(isset($_GET['Delete'])){
                 
                     $Seed_ID = $_GET['Delete'];
                     $sql  = "DELETE FROM sensors WHERE Sensor_ID = '$Sensor_ID'";
                     $stmt = mysqli_query($con , $sql);
                     
                     header ('location: index.php?viewallsensor');
                 

  }
  

?>




   


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Seeds
                
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"  style="color:#1e0d53">
                
                    <i class="fa fa-tags fa-fw"></i> View Seed
                
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr>
                                <th  style="color:#1e0d53"> Sensor ID </th>
                                <th  style="color:#1e0d53"> Sensor Name </th>
                                <th  style="color:#1e0d53"> Seed ID </th>
                                <th  style="color:#1e0d53"> Seed Delete </th>
                                <th  style="color:#1e0d53"> Seed Edit </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
                            
                                $i=0;
                                $sql = "SELECT * FROM sensors";
                                $stmt = mysqli_query($con,$sql);
          
                                while($row=mysqli_fetch_array($stmt)){
                                    
                                    $Sensor_ID = $row['Sensor_ID'];
                                    $Sensor_Name = $row['Sensor_Name'];
                                    $Seed_ID = $row['Seed_ID'];
                                  
                                    $i++;
                            
                            ?>
                            
                            <tr>  
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $Sensor_Name; ?> </td>
                                <td> <?php echo $Seed_ID; ?> </td>
                               
                               
                                <td> 
                                     
                                     <a href="viewallsensor.php?Delete=<?php echo $Sensor_ID; ?>" style="color:#0234a5">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?editsensor=<?php echo $Sensor_ID; ?>" style="color:#0234a5">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
                                     </a> 
                                    
                                </td>
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>










