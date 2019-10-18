
<?php include 'include/conn.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  
    <style>
        #page-wrapper{
            margin-top: 10rem;
        }
        .contain{
            display: flex;  
            flex-flow: row wrap;
            color: white;
        }

        .item{
            background: #1e0d53;
            height: 80px;
            border: #1e0d53; solid 1px;
            
            padding: .5rem;
            flex: 1;    
        }  
   
       a {
            color: #c8c8c8;
       }
       .side-nav{
       margin-top: 30px;
       }
      
       .logo{
           width: 120px;
           
       }
       #center{
        text-align: center;
        padding: 3rem;
       }
       #right{
        text-align: right;
        padding: 3rem;
       }

    </style>

  <body>

        <nav class="navbar  navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
        <!-- ------------------------------------------------------------------- -->
            <div class="contain">
                <div class="item" id="logo" >
                <a shref="#">
                    <img src="images/smart-green-house.png" alt="logo" class="logo" style="margin-left:50px;">
                </a>
                </div>
                <div class="item" id="center" style="font-family: 'Montserrat', sans-serif;font-weight:bold;font-size:20px;">Admin Panel</div>
                <div class="item" id="right">
                <i class="fa fa-fw fa-user" style="color= white"></i> Hello <?php echo $_SESSION['username']  ?>
                </div>
            </div>






        <!--  -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background-color: #1e0d53;">
                    <li><!-- li begin -->
                        <a href="index.php?dashboard"><!-- a href begin -->                                
                                <i class="fa fa-fw fa-dashboard" style="color= white"></i> Dashboard                               
                        </a><!-- a href finish -->                        
                    </li><!-- li finish -->
                    
                    <li><!-- li begin -->
                        <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->
                                <i class="fa fa-fw fa-tag"></i> Seeds
                                <i class="fa fa-fw fa-caret-down"></i> 
                        </a>
                        <ul id="products" class="collapse">
                            <li>
                                <a href="index.php?addseed"> Insert Seed </a>
                            </li>
                            <li>
                                <a href="index.php?viewallseed"> View Seed </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" data-toggle="collapse" data-target="#cat">
                            <i class="fa fa-fw fa-book"></i> Sensors
                            <i class="fa fa-fw fa-caret-down"></i>    
                        </a>
                        <ul id="cat" class="collapse">
                            <li>
                                <a href="index.php?viewallsensor"> Viwe Sensors</a>
                            </li>
                            <li>
                                <a href="index.php?addsensor"> Insert Sensors</a>
                            </li>
                            <li> 
                        </ul>
                    </li>
    
                    <!-- user area in admin area add & view & edit -->
                    
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#users">     
                            <i class="fa fa-fw fa-users"></i> Users
                            <i class="fa fa-fw fa-caret-down"></i>      
                        </a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="index.php?adduser"> Insert User </a>
                            </li>
                            <li>
                                <a href="index.php?viewallusers"> View Users </a>
                            </li>           
                        </ul>    
                    </li>
                    <!-- LogOut -->
                    <li>
                        <a href="logout.php?logout">
                            <i class="fa fa-fw fa-power-off"></i> Log Out
                        </a>
                    </li>
                </ul>
            </div>   
        </nav>
    </body>
    