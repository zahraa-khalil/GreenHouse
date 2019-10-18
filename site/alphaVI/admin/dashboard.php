<?php include 'include/conn.php' ?>

<?php
// Notifications measures table "last table"

$sql_measures = "SELECT measures.Time, sensors.Sensor_Name, measures.Value 
            From measures INNER JOIN sensors ON measures.Sensor_ID = sensors.Sensor_ID";
$measures_res = mysqli_query($con, $sql_measures );
// -------------------------------------------------------------------

 // seed info

 $sql_seeds = "SELECT blocks.Block_ID, seeds.Seedtitle, blocks.Start_Date, blocks.End_Date
 FROM blocks INNER JOIN seeds ON blocks.Block_ID = seeds.Block_ID";
 $seed_info = mysqli_query($con, $sql_seeds);
// -------------------------------------------------------------------
?>

<script src="https://rawgit.com/naikus/svg-gauge/master/dist/gauge.min.js"></script>

<style>
.div1_chart
{
    /* width:80%;
    height:300px; */
    background:#1e0d53;
}
.div2_cont
{
    width:100%;
    height:300px;
    margin-top:10px;
    background:#1e0d53;
    display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.cont1
{
    width:50%;
    height:300px;
    background:#1e0d53;
    display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.cont2
{
    width:40%;
    height:300px;
    background:#1e0d53;
}
.one{
    width:30%;
    height:200px;
    margin-top:50px;
    /* background:#371994; */
}
.tables{
    width:100%;
    height:200px;
    margin-top:30px;
    display: flex;
  flex-direction: row;
  justify-content: space-between;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 35%;
  margin-top:100px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

@media only screen and (max-width: 1000px) {
    .div2_cont
{
    width:100%;
    height:600px;
    margin-top:10px;
    display:block
 
}
.cont1
{
    width:100%;
    height:300px;
    background:#1e0d53;
    display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.cont2
{
    width:100%;
    height:300px;
    background:#1e0d53;
    margin-top:20px;
}

.tables{
    width:90%;
    height:400px;
    margin-top:30px;
    display:block;
    border: none;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
  margin:auto;
  margin-top:30px;
 
}
}


  body {
    /* background-color: rgba(0, 0, 0, 0.8); */
    color: #999;
    font-family: Hevletica, sans-serif;
  }

  .info {
    clear: both;
    padding: 10px;
    font-size: 0.9em;
  }

  a.link {
    color: rgb(47, 227, 255);
    text-decoration: none;
  }

  .warn {
    font-size: 0.8em;
    background-color: darken(orange, 15%);
    color: #fff;
    padding: 10px;
  }

  /* ------ Default Style ---------- */
  .gauge-container {
    width: 180px;
    height: 180px;
    display: block;
    float: left;
    padding: 10px;
  
    background-color: #181e63;
    margin: 7px;
    border-radius: 3px;
    position: relative;
  }

  .gauge-container>.label {
    position: absolute;
    right: 0;
    top: 0;
    display: inline-block;
    background: rgba(0, 0, 0, 0.5);
    font-family: monospace;
    font-size: 0.8em;
    padding: 5px 10px;
  }

  .gauge-container>.gauge>.dial {
    stroke: #334455;
    stroke-width: 2;
    fill: rgba(0, 0, 0, 0);
  }

  .gauge-container>.gauge>.value {
    stroke: rgb(47, 227, 255);
    stroke-width: 2;
    fill: rgba(0, 0, 0, 0);
  }

  .gauge-container>.gauge>.value-text {
    fill: rgb(47, 227, 255);
    font-family: sans-serif;
    font-weight: bold;
    font-size: 0.8em;
  }




  /* ------- Alternate Style ------- */
  .wrapper {
    height: 100px;
    float: left;
    margin: 7px;
    overflow: hidden;
  }

  .wrapper>.gauge-container {
    margin: 0;
    
  }


  .gauge-container.two>.gauge>.dial {
    stroke: #334455;
    stroke-width: 10;
  }

  .gauge-container.two>.gauge>.value {
    stroke: orange;
    stroke-dasharray: none;
    stroke-width: 13;
    
  }

  .gauge-container.two>.gauge>.value-text {
    fill: #ccc;
    font-weight: 100;
    font-size: 1em;
  }



  /* ------- Alternate Style ------- */

  .gauge-container.three>.gauge>.dial {
    stroke: #334455;
    stroke-width: 2;
    
  }

  .gauge-container.three>.gauge>.value {
    stroke: #C9DE3C;
    stroke-width: 5;
  }

  .gauge-container.three>.gauge>.value-text {
    fill: #C9DE3C;
  }



  /* ----- Alternate Style ----- */
  .gauge-container.four>.gauge>.dial {
    stroke: #334455;
    stroke-width: 10;
  }

  .gauge-container.four>.gauge>.value {
    stroke: #F32450;
    stroke-dasharray: none;
    stroke-width: 10;
  }

  .gauge-container.four>.gauge>.value-text {
    fill: #F32450;
    transform: translate3d(24%, 23%, 0);
    display: inline-block;
  }

  .gauge-container.four>.value-text {
    color: #F32450;
    font-weight: 100;
    position: absolute;
    bottom: 18%;
    right: 10%;
    display: inline-block;
  }



  /* ----- Alternate Style ----- */
  .gauge-container.five>.gauge>.dial {
    stroke: #334455;
    stroke-width: 5;
  }

  .gauge-container.five>.gauge>.value {
    stroke: #F8774B;
    stroke-dasharray: 25 1;
    stroke-width: 5;
  }

  .gauge-container.five>.gauge>.value-text {
    fill: #F8774B;
    font-size: 0.7em;
  }



  /* ----- Alternate Style ----- */
  .gauge-container.six>.gauge>.dial {
    stroke: #334455;
    fill: "#334455";
    stroke-width: 20;
  }

  .gauge-container.six>.gauge>.value {
    stroke: #FF6DAF;
    stroke-width: 20;
  }

  .gauge-container.six>.gauge>.value-text {
    fill: #FF6DAF;
    font-size: 0.7em;
  }


  .gauge-container.seven>.gauge>.dial {
    stroke: transparent;
    stroke-width: 5;
    transform: scale(0.9, 0.9) translate3d(5.5px, 5.5px, 0);
    fill: rgba(148, 112, 57, 0.42);
  }

  .gauge-container.seven>.gauge>.value {
    stroke: #F8774B;
    stroke-dasharray: none;
    stroke-width: 5;
  }
</style>





<div class="div1_chart" style="margin-bottom:20px;">
<canvas id="myChart"></canvas>
</div>

<div class="div2_cont">
  <div class="cont1">
       <div class="one">
        <div id="gauge1" class="gauge-container">
          <span class="label">temp</span>
        </div>
       </div>
       <div class="one">
        <div id="gauge3" class="gauge-container three">
          <span class="label">light</span>
        </div>
       </div>
        <div class="one">
          <div id="gauge4" class="gauge-container four">
      <span class="label">moist</span>
      <span class="value-text">deg</span>
    </div>
        </div>
    </div>



  <div class="cont2">
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
  </div>

</div>
<div class="contain" style="width:100%; text-align:center">
<div class="tables" style="width:80%; height: 60vh; overflow: auto;margin-left:10%; margin-bottom:40px;">
    <table style="overflow: auto; width: 100%">
        <caption style="color:#1e0d53;font-size:30px;font-weight:bold">Sensors</caption>
           <thead>                  
              <tr>
                <th scope="col" style="color:#1e0d53;">Time</th>
                  <th scope="col" style="color:#1e0d53;">Sensor Name</th>
                    <th scope="col" style="color:#1e0d53;">Value</th>
                   </tr>
                   </thead>
                   <tbody>
                      <?php while($row = mysqli_fetch_array($measures_res)){ ?> 
                     <tr>
                       <th scope="row" style=color:#808088;"><?php echo $row['Time']  ?></th>
                       <td  style=color:#808088;"><?php echo $row['Sensor_Name']  ?></td>
                       <td style="color:#808088;"><?php echo $row['Value']  ?></td>
                        </tr>
                        <?php } ?> 	
                </tbody>
             </table>
        </div>
  </div>



</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
            label: 'Data Monitor',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>



<!-- ----------------------------------------------------------------------------- -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <script src="https://rawgit.com/naikus/svg-gauge/master/dist/gauge.min.js"></script>
</head>


<div class="hidden" style="display:hidden">
<body>
  <h1>Hello gauge</h1>



  <div id="gauge1" class="gauge-container">
    <span class="label">DEFAULT</span>
  </div> -->

- <div class="wrapper">
    <div id="gauge2" class="gauge-container two">
      <span class="label">.two</span>
    </div>
  </div> -->

  <div id="gauge3" class="gauge-container three">
    <span class="label">.three</span>
  </div> -->

  <div id="gauge4" class="gauge-container four">
    <span class="label">.four</span>
    <span class="value-text">km/hr</span>
  </div> -->

  <div id="gauge5" class="gauge-container five">
    <span class="label">.five</span>
  </div>

  <div id="gauge6" class="gauge-container six">
    <span class="label">.six</span>
  </div>

  <div id="gauge7" class="gauge-container seven">
    <span class="label">.seven</span>
  </div>

  </div>


  <script>
    var gauge1 = Gauge(
      document.getElementById("gauge1"), {
      max: 100,
      dialStartAngle: -90,
      dialEndAngle: -90.001,
      value: 100,
      label: function (value) {
        return Math.round(value * 100) / 100;
      }
    }
    );

    var gauge2 = Gauge(
      document.getElementById("gauge2"), {
      min: -50,
      max: 50,
      dialStartAngle: 180,
      dialEndAngle: 0,
      value: 50,
      color: function (value) {
        if (value < -25) {
          return "#5ee432";
        } else if (value < 0) {
          return "#fffa50";
        } else if (value < 25) {
          return "#f7aa38";
        } else {
          return "#ef4655";
        }
      }
    }
    );

    var gauge3 = Gauge(
      document.getElementById("gauge3"), {
      max: 100,
      value: 50
    }
    );

    var gauge4 = Gauge(
      document.getElementById("gauge4"), {
      max: 100,
      dialStartAngle: 90,
      dialEndAngle: 0,
      value: 20
    }
    );

    var gauge5 = Gauge(
      document.getElementById("gauge5"), {
      max: 200,
      dialStartAngle: 0,
      dialEndAngle: -180,
      value: 50
    }
    );

    var gauge6 = Gauge(
      document.getElementById("gauge6"), {
      max: 100,
      dialStartAngle: 90.01,
      dialEndAngle: 89.99,
      dialRadius: 10,
      showValue: false,
      value: 50
    }
    );


    var gauge7 = Gauge(
      document.getElementById("gauge7"), {
      max: 100,
      dialStartAngle: -90,
      dialEndAngle: -90.001,
      value: 100,
      showValue: false,
      label: function (value) {
        return Math.round(value * 100) / 100;
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
      gauge1.setValueAnimated(value1, 1);
      gauge2.setValueAnimated(50 - value2, 2);
      gauge3.setValueAnimated(value3, 1.5);
      gauge4.setValueAnimated(value4 * 300, 2);
      gauge5.setValueAnimated(value5 * 2, 1);
      gauge6.setValueAnimated(value1, 1);
      gauge7.setValueAnimated(value1, 1);
      window.setTimeout(loop, 6000);
    })();
  </script>

</body>

</html>
