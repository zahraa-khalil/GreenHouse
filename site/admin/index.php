<?php session_start() ;



?>

<?php include 'include/conn.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
      <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("include/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid" style="text-align:center;color:#f032e6"><!-- container-fluid begin -->
                WELCOME BACK <?php echo $_SESSION['username']  ?> 
            <?php

                if(isset($_GET['dashboard'])){
                       
                       include("dashboard.php");       
                }                         
                if(isset($_GET['addseed'])){
                        
                        include("addseed.php");
                        
                }   if(isset($_GET['viewallseed'])){
                        
                        include("viewallseed.php");

                }   if(isset($_GET['editseed'])){
                        
                        include("editseed.php");

                        
                        
                }   if(isset($_GET['addsensor'])){
                        
                        include("addsensor.php");
                        
                }   if(isset($_GET['viewallsensor'])){
                        
                        include("viewallsensor.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");
                        
                }   if(isset($_GET['addcategory'])){
                        
                        include("addcategory.php");
                        
                }   if(isset($_GET['viewallcategory'])){
                        
                        include("viewallcategory.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("delete_cat.php");
                        
                }   if(isset($_GET['insert_slide'])){
                        
                        include("insert_slide.php");
                        
                }   if(isset($_GET['view_slides'])){
                        
                        include("view_slides.php");
                        
                }   if(isset($_GET['delete_slide'])){
                        
                        include("delete_slide.php");
                        
                }   if(isset($_GET['edit_slide'])){
                        
                        include("edit_slide.php");
                        
                }
                    if(isset($_GET['adduser'])){
                        
                        include("adduser.php");
                        
                }
                    if(isset($_GET['viewallusers'])){
                        
                        include("viewallusers.php");
                        
                } if(isset($_GET['logout'])){
                        
                        include("../include/systemLogin.php");
                        
                }
        
                ?>
                
              
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

          
       
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>