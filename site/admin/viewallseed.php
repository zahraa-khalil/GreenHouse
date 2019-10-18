<?php include 'include/conn.php' ?>



  

       <!--Delete products -->
          <?php   if(isset($_GET['Delete'])){
                 
                     $Seed_ID = $_GET['Delete'];
                     $sql  = "DELETE FROM seeds WHERE Seed_ID = '$Seed_ID'";
                     $stmt = mysqli_query($con , $sql);
                     
                     header ('location: index.php?viewallseed');
                 

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
                
                    <i class="fa fa-tags fa-fw" style="color:#1e0d53"></i> View Seed
                
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        
                        <thead>
                            <tr >
                                <th style="color:#1e0d53"> Seed ID </th>
                                <th style="color:#1e0d53"> Seed Title </th>
                                <th style="color:#1e0d53"> Seed Image </th>
                                <th style="color:#1e0d53"> Min Value </th>
                                <th style="color:#1e0d53"> Max Value </th>
                                <!-- <th> Seed Date </th> -->
                                <th style="color:#1e0d53"> Seed Delete </th>
                                <th style="color:#1e0d53"> Seed Edit </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php 
                            
                                $i=0;
                                $sql = "SELECT * FROM seeds";
                                $stmt = mysqli_query($con,$sql);
          
                                while($row=mysqli_fetch_array($stmt)){
                                    
                                    $Seed_ID = $row['Seed_ID'];
                                    $Seedtitle = $row['Seedtitle'];
                                    $Seedimg = $row['Seedimg'];
                                    $Min = $row['Min'];
                                    $Max = $row['Max'];
                                    $i++;
                            
                            ?>
                            
                            <tr>  
                                <td style="color:#636365"> <?php echo $i; ?> </td>
                                <td style="color:#636365"> <?php echo $Seedtitle; ?> </td>
                                <td style="color:#636365"> <img src="seed_images/<?php echo $Seedimg; ?>" width="60" height="60"></td>
                                <td style="color:#636365"> <?php echo $Min; ?> </td>
                                <td style="color:#636365"> <?php echo $Max; ?> </td>
                    
                               
                                <td> 
                                     
                                     <a href="viewallseed.php?Delete=<?php echo $Seed_ID; ?>" style="color:#0234a5">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?editseed=<?php echo $Seed_ID; ?>" style="color:#0234a5">
                                     
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










