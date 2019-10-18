<?php
	include('admin/include/conn.php');
?>

<!-- query to get data from db for temp chart -->

<?php 

$tempY = '';

$sql = "SELECT Value FROM `measures` WHERE Sensor_ID = 1";
$temp_result = mysqli_query($con, $sql);

while($row =mysqli_fetch_array($temp_result)){
    $tempY = $tempY . '"'. $row['Value'] . '",';
}

$tempY  = trim($tempY, ",");

// ------------------------------------------------------------------------
$humY = '';

$sql2 = "SELECT Value FROM `measures` WHERE Sensor_ID = 2";
$hum_result = mysqli_query($con, $sql2);

while($row =mysqli_fetch_array($hum_result)){
    $humY = $humY . '"'. $row['Value'] . '",';
}

$humY  = trim($humY, ",");



// =================================================================================

$litY = '';

$sql3 = "SELECT Value FROM `measures` WHERE Sensor_ID = 3";
$lit_result = mysqli_query($con, $sql3);

while($row =mysqli_fetch_array($lit_result)){
    $litY = $litY . '"'. $row['Value'] . '",';
}

$litY  = trim($litY, ",");



// ---------------------------------------------------------------------------------------

$moistY = '';

$sql4 = "SELECT Value FROM `measures` WHERE Sensor_ID = 4";
$moist_result = mysqli_query($con, $sql4);

while($row =mysqli_fetch_array($moist_result)){
    $moistY = $moistY . '"'. $row['Value'] . '",';
}

$moistY  = trim($moistY, ",");


// =============================================================================

// Notifications measures table "last table"

    $sql_measures = "SELECT measures.Time, sensors.Sensor_Name, measures.Value 
                From measures INNER JOIN sensors ON measures.Sensor_ID = sensors.Sensor_ID";
    $measures_res = mysqli_query($con, $sql_measures );
    
    // ======================================================================
    // user info 

    $sql_users = "SELECT `User_ID`, `username`, `Role`, `Email` FROM `users`";
    $users_res = mysqli_query($con, $sql_users);

    // ===============================================================================
    // seed info

    $sql_seeds = "SELECT blocks.Block_ID, seeds.Seedtitle, blocks.Start_Date, blocks.End_Date
    FROM blocks INNER JOIN seeds ON blocks.Block_ID = seeds.Block_ID";
    $seed_info = mysqli_query($con, $sql_seeds);
    // ===========================================================================
    // min and max value
   
                              
  

?>








<?php
	include('include/systemNav.php');
?>


<!-- container start-->
<div class="container p-5">
	<div class="row">
		<div class="leftdiv col-12 p-1">
			<div class="row">
				<div class="mainchart col-10 col-md-12 col-lg-12" style="width:40%">
					<canvas id="canvas"></canvas>
				</div>
			</div>
<br>
<br>
            <!--start of div1-->
            <div class="container">
              <div class="row">
                
                  <!-- gauge ----------------------------------->
                  <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 div1">
					   <div id="gauge3" class="gauge-container three col-lg-12">
        				   <span class="label col-lg-12">Status</span>                         
                        </div > 
                    <!-- range slider -------------------- -->
                        <!-- <div class="col-lg-12 range-slider"> 
                              <input class="range-slider__range col-lg-12" type="range" value="25" min="0" max="100">
			                  <span class="range-slider__value">25</span>
                        </div>  -->
                        
                   
                  </div>
              </div>

              
            </div>

            <!-- end of div1-->

            <div class="container">
            <div class="row">
                 <div class="col-lg-10  col-md-10 offset-md-1">
                     <div class="col-lg-12 div2" style="overflow: auto;">
                      
                     </div>
                     <p style="color:#5fc6da;font-size:20px;">Seed Info:</p>
                      <table class="table table-dark" >
                      
                            <thead>
                                <tr style="color:#dcd9e3">
                                <th scope="col" style="color:#dcd9e3">Block_ID</th>
                                    <th scope="col" style="color:#dcd9e3">Seed_Name</th>
                                    <th scope="col"style="color:#dcd9e3">Start_Date</th>
                                    <th scope="col" style="color:#dcd9e3">End_Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($rowII = mysqli_fetch_assoc($seed_info)){ ?> 
                                <tr>
                                    <th scope="row" style="color:#adaab4"><?php echo $rowII['Block_ID'] ?></th>
                                    <td style="color:#adaab4"><?php echo $rowII['Seedtitle']  ?></td>
                                    <td style="color:#adaab4"><?php echo $rowII['Start_Date']  ?></td>
                                    <td style="color:#adaab4"><?php echo $rowII['End_Date']  ?></td>
                                </tr> 
                            <?php } ?>
                            </tbody>
                        </table>
                      
                        <p style="color:#5fc6da;font-size:20px;">Users:</p>
                      <table class="table table-dark col-12 pb-4">
                     
                            <thead>
                                <tr>
                                <th scope="col" style="color:#dcd9e3">User_ID</th>
                                    <th scope="col" style="color:#dcd9e3">Username</th>
                                    <th scope="col" style="color:#dcd9e3">Role</th>
                                    <th scope="col" style="color:#dcd9e3"">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($rowI = mysqli_fetch_assoc($users_res)){ ?> 
                                <tr>
                                    <th scope="row" style="color:#adaab4"><?php echo $rowI['User_ID'] ?></th>
                                    <td style="color:#adaab4"><?php echo $rowI['username']  ?></td>
                                    <td style="color:#adaab4"><?php echo $rowI['Role']  ?></td>
                                    <td style="color:#adaab4"><?php echo $rowI['Email']  ?></td>
                                </tr> 
                            <?php } ?>
                            </tbody>
                        </table>
                            

                  </div>
            </div>
            </div>

   <br>
   <br>         

       
            <!-- Start of sensor charts -->

			<div class="row">
				<div class="mainchart2 offset-col-2 col-10 col-md-5 col-lg-5">
					<canvas id="temperature" width="500" height="350"></canvas>
				</div>
				<div class="mainchart2 offset-col-2 col-10 offset-md-2 col-md-5 offset-lg-2 col-lg-5">
					<canvas id="humidity" width="500" height="350"></canvas>
				</div>
			</div>
			<div class="row">
				<div class="mainchart2 offset-col-2 col-10  col-md-5 col-lg-5">
					<canvas id="light" width="500" height="350"></canvas>
				</div>
				<div class="mainchart2 offset-col-2 col-10 offset-md-2 col-md-5 offset-lg-2 col-lg-5">
					<canvas id="moisture" width="500" height="350"></canvas>
				</div>
            </div>
            
            <!-- end of sensor charts -->

<br>
<br>

            <p style="color:#5fc6da;font-size:20px; text-align=center">Sensors' values:</p>
			<div class="row">
            
				<div class=" offset-col-1 col-10 offset-lg-2 col-lg-8 offset-md-1 col-md-10 taskdiv" style="overflow: auto;">
                
                    <table class="table table-dark">
                   
						<thead>
                         
							<tr>
                                <th scope="col" style="color:#dcd9e3">Time</th>
								<th scope="col" style="color:#dcd9e3">Sensor Name</th>
								<th scope="col" style="color:#dcd9e3">Value</th>
							</tr>
						</thead>
						<tbody>
                            <?php while($row = mysqli_fetch_array($measures_res)){ ?> 
							<tr>
								<th scope="row" style="color:#adaab4"><?php echo $row['Time']  ?></th>
								<td style="color:#adaab4"><?php echo $row['Sensor_Name']  ?></td>
								<td style="color:#adaab4"><?php echo $row['Value']  ?></td>
                            </tr>
                            <?php } ?> 	
						</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>

<!-- container end-->



<!-- start chart -->
<script>
	window.onload = function () {
		var ctx = document.getElementById('canvas').getContext('2d');
		window.myLine = new Chart(ctx, config);

	};
			// ---------------------------------------------------------------
</script>


<script>
	   
        var gauge3 = Gauge(
            document.getElementById("gauge3"), {
            min: 0,
            max: 55,
            dialStartAngle: 120,
            dialEndAngle: 55,
            value: 40,
            color: function (value) {
                if (value < 27) {
                    return "#00a7e9";
                } else if (value < 39) {
                    return "#fffb00";
                } else if (value < 50) {
                    return "#FF9800";
                } else {
                    return "#e90000";
                }
            }
        }
		);
		
		(function loop() {
            var value1 = Math.random() * 100,
                value2 = Math.random() * 100,
                value3 = Math.random() * 100,
                value4 = Math.random() * 100,
                value5 = Math.random() * 100;

            // setValueAnimated(value, durationInSecs);

            gauge3.setValueAnimated(value3, 1.5);

            window.setTimeout(loop, 6000);
        })();


</script>
<!-- range bar -->

<script>
        // I've added annotations to make this easier to follow along at home. Good luck learning and check out my other pens if you found this useful


        // First let's set the colors of our sliders
        const settings = {
            fill: '#00a7e9',
            background: '#d7dcdf'
        }

        // First find all our sliders
        const sliders = document.querySelectorAll('.range-slider');

        // Iterate through that list of sliders
        // ... this call goes through our array of sliders [slider1,slider2,slider3] and inserts them one-by-one into the code block below with the variable name (slider). We can then access each of wthem by calling slider
        Array.prototype.forEach.call(sliders, (slider) => {
            // Look inside our slider for our input add an event listener
            //   ... the input inside addEventListener() is looking for the input action, we could change it to something like change
            slider.querySelector('input').addEventListener('input', (event) => {
                // 1. apply our value to the span
                slider.querySelector('span').innerHTML = event.target.value;
                // 2. apply our fill to the input
                applyFill(event.target);
            });
            // Don't wait for the listener, apply it now!
            applyFill(slider.querySelector('input'));
        });

        // This function applies the fill to our sliders by using a linear gradient background
        function applyFill(slider) {
            // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
            const percentage = 100 * (slider.value - slider.min) / (slider.max - slider.min);
            // now we'll create a linear gradient that separates at the above point
            // Our background color will change here
            const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage + 0.1}%)`;
            slider.style.background = bg;
        }
    </script>

<!-- end of chart -->

<script>
// first chart 

// bar, horizontalBar, pie, line, doughnut, radar, polarArea
var charType = 'line';
var tempX = ['January', 'February', 'March', 'April', 'May'];
var tempY = [<?php echo $tempY; ?>];
var tempZ = 'Temperature';
var tempFill = true;
var tempColor = '#dd4fcf2b';
var max_temp = 23;
var min_temp = 20;
tempY_value = tempY[tempY.length - 3];
function temp_warning() {
    if (tempY_value  > min_temp && tempY_value  < max_temp) {
        tempColor = '#dd4fcf2b';
    } else if(tempY_value  >  max_temp){
        tempColor = '#ff292942';
        // alert("Warning Humidity sensor value is:", humY_value)
        
    } else{
        tempColor = '#36e7ff';
    }

}

 
temp_warning();

let myChart = document.getElementById('temperature').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';

let temp = {
    type: charType,
    data: {
        labels: tempX,
        datasets: [{
            label: tempZ,
            fill: tempFill,
            data: tempY,
            backgroundColor: tempColor,
            borderWidth: 1,
            borderColor: '#dd4fcf',
            hoverBorderWidth: 3,
            hoverBorderColor: 'black'
        }]
    },
    // -----------------------
    options: {
        // title control
        title: {
            display: true,
            text: 'Green House Temperature Monitor',
            fontSize: 20
        },
        // keys control
        legend: {
            display: false,
            position: 'right',
            labels: {
                fontColor: 'purple'
            }
        },
        // positioning
        layout: {
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        // tooltips
        tooltips: {
            enabled: true
        }
    }
};

let tempChart = new Chart(temperature, temp);

// ------------------------------------------------------------------------------

// second Humidity 

var humCharType = 'line';
var humX = ['January', 'February', 'March', 'April'];
var humY = [<?php echo $humY; ?>];
var humZ = 'Humidity';
var humFill = true;
var humColor = '#dd4fcf2b';
var max_hum = 50;
var min_hum = 30;
humY_value = humY[humY.length - 1];
function hum_warning() {
    if (humY_value > min_hum && humY_value < max_hum) {
        humColor = '#dd4fcf2b';
    } else if(humY> max_hum){
        humColor = '#ff292942';
        // alert("Warning Humidity sensor value is:", humY_value)
        
    } else{
        humColor = '#36e7ff';
    }
}

hum_warning();

let hueChart = document.getElementById('humidity').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';





let midity = {
    type: humCharType,
    data: {
        labels: humX,
        datasets: [{
            label: humZ,
            fill: humFill,
            data: humY,
            backgroundColor: humColor,
            borderWidth: 1,
            borderColor: '#dd4fcf',
            hoverBorderWidth: 3,
            hoverBorderColor: 'black'
        }]
    },
    // ----------------------------------
    options: {
        // title control
        title: {
            display: true,
            text: 'Green House Humidity Monitor',
            fontSize: 20
        },
        // keys control
        legend: {
            display: false,
            position: 'right',
            labels: {
                fontColor: 'purple'
            }
        },
        // positioning
        layout: {
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        // tooltips
        tooltips: {
            enabled: true
        }
    }
};

let huChart = new Chart(humidity, midity);


// --------------------------------------------------------------------------------------
// light chart 

// bar, horizontalBar, pie, line, doughnut, radar, polarArea



let litCharType = 'line';
let litX = ['January', 'February', 'March', 'April', 'May', 'June'];
let litY = [<?php echo $litY; ?>];
let litZ = 'Light';
let litFill = true;
let litColor = '#dd4fcf2b';
let maxLit = 90;
let minLit = 20;
litY_value = litY[litY.length - 1];
function lit_warning() {
    if (litY_value > minLit && litY_value < maxLit) {
        litColor = '#dd4fcf2b';
    } else if(litY_value >  maxLit){
        litColor = '#ff292942';
        // alert("Warning Humidity sensor value is:", humY_value)
        
    } else{
        litColor = '#36e7ff';
    }
}

lit_warning();


let litChart = document.getElementById('light').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';





let lightChar = {
    type: litCharType,
    data: {
        labels: litX,
        datasets: [{
            label: litZ,
            fill: litFill,
            data: litY,
            backgroundColor: litColor,
            borderWidth: 1,
            borderColor: '#dd4fcf',
            hoverBorderWidth: 3,
            hoverBorderColor: 'black'
        }]
    },
    // -------------------------------------
    options: {
        // title control
        title: {
            display: true,
            text: 'Green House Light Monitor',
            fontSize: 20
        },
        // keys control
        legend: {
            display: false,
            position: 'right',
            labels: {
                fontColor: 'white'
            }
        },
        // positioning
        layout: {
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        // tooltips
        tooltips: {
            enabled: true
        }
    }
};

let lightChart = new Chart(light, lightChar);

// ----------------------------------------------------------------------------------------



// bar, horizontalBar, pie, line, doughnut, radar, polarArea


let moistCharType = 'line';
let moistX = ['January', 'February', 'March', 'April'];
let moistY = [<?php echo $moistY; ?>];
let moistZ = 'moistZ';
let moistFill = true;
// let moistColor = '#EE204D';
let max = 70;
let min = 15;
moistY_value = moistY[moistY.length - 1];

function warning() {
    if (moistY_value > min && moistY_value < max) {
        moistColor = '#dd4fcf2b';
    } else if(moistY_value >  max){
        moistColor = '#ff292942';
        // alert("Warning Humidity sensor value is:", humY_value)
        
    } else{
        moistColor = '#36e7ff';
    }
}
warning();

let moiChart = document.getElementById('moisture').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';



let moisChart = {
    type: moistCharType,
    data: {
        labels: moistX,
        datasets: [{
            label: moistZ,
            fill: moistFill,
            data: moistY,
            backgroundColor: moistColor,
            borderWidth: 1,
            borderColor: '#dd4fcf',
            hoverBorderWidth: 3,
            hoverBorderColor: 'black'
        }]
    },
    // --------------------------------------
    options: {
        // title control
        title: {
            display: true,
            text: 'Green House Moisture Monitor',
            fontSize: 20
        },
        // keys control
        legend: {
            display: false,
            position: 'right',
            labels: {
                fontColor: 'white'
            }
        },
        // positioning
        layout: {
            padding: {
                left: 0,
                right: 0,
                bottom: 0,
                top: 0
            }
        },
        // tooltips
        tooltips: {
            enabled: true
        }
    }
};

let moChart = new Chart(moisture, moisChart);



</script>

<?php
	include('include/systemFooter.php');
?>