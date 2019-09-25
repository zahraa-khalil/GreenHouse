// House Summary 

let x = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

			let tSum = [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
						];

			let hSum = 	[
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
						];
			let lSum = [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
						];
			let mSum = [
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor(),
							randomScalingFactor()
                        ];
                        

			var config = {
				type: 'line',
				data: {
					labels: x,
					datasets: [{
						label: 'Temp',
						
						backgroundColor: window.chartColors.blue,
						borderColor: window.chartColors.blue,
						data: tSum,
					}, {
						label: 'Humidity',
						fill: true,
						backgroundColor: '#be6448',
						borderColor: '#be6448',
						borderDash: [15, 15],
						data: hSum,
					}, {
						label: 'Light',
						fill: false,
						backgroundColor: '#006400',
						borderColor: '#006400',
						data: lSum,
					}, {
						label: 'Moisture',
						backgroundColor: '#dd4fcf',
						borderColor: '#dd4fcf',
						borderDash: [10, 10],
						data: mSum,
						fill: false,
					}]
				},
				options: {
					responsive: true,
					title: {
						display: true,
						text: 'Chart.js Line Chart'
					},
					tooltips: {
						mode: 'index',
						intersect: false,
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Month'
							}
						}],
						yAxes: [{
							display: true,
							scaleLabel: {
								display: true,
								labelString: 'Value'
							}
						}]
					}
				}
			}; 




// ---------------------------------------------------------------------------------------------------------------
// first chart 

// bar, horizontalBar, pie, line, doughnut, radar, polarArea
let charType = 'line';
let tempX = ['Boston','Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'];
let tempY = [ 30, 50, 100, 25, 18, 60];
let tempZ = 'Temperature'; 

let myChart = document.getElementById('temperature').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';

let temp = {
   type: charType,
   data: { 
       labels: tempX,
       datasets:[{
           label: tempZ,
           fill: true,
           data: tempY,
           backgroundColor: '#dd4fcf',
           borderWidth:1,
           borderColor:'white',
           hoverBorderWidth:3,
           hoverBorderColor:'black'
       }]
   },
// -----------------------
   options: {
       // title control
       title:{
           display: true,
           text: 'Green House Temperature Monitor',
           fontSize: 20
       },
       // keys control
       legend:{
           display: false,
           position: 'right',
           labels:{
               fontColor:'purple'
           }
       },
       // positioning
       layout:{
           padding:{
               left:0,
               right:0,
               bottom:0,
               top:0
           }
       },
       // tooltips
       tooltips:{
           enabled: true
       }
   }
};

let tempChart = new Chart(temperature, temp);

// ------------------------------------------------------------------------------

// second Humidity 

let humCharType = 'line';
let humX = ['Boston','Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'];
let humY = [ 30, 50, 100, 25, 18, 60];
let humZ = 'Humidity'; 


let hueChart = document.getElementById('humidity').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';

	
	


let midity = {
   type: humCharType,
   data: { 
       labels:humX,
       datasets:[{
           label: humZ,
           fill: false,
           data: humY,
           backgroundColor: '#dd4fcf',
           borderWidth:1,
           borderColor:'white',
           hoverBorderWidth:3,
           hoverBorderColor:'black'
       }]
   },
// ----------------------------------
   options: {
       // title control
       title:{
           display: true,
           text: 'Green House Humidity Monitor',
           fontSize: 20
       },
       // keys control
       legend:{
           display: false,
           position: 'right',
           labels:{
               fontColor:'purple'
           }
       },
       // positioning
       layout:{
           padding:{
               left:0,
               right:0,
               bottom:0,
               top:0
           }
       },
       // tooltips
       tooltips:{
           enabled: true
       }
   }
};

let huChart = new Chart(humidity, midity);


// --------------------------------------------------------------------------------------
// light chart 

// bar, horizontalBar, pie, line, doughnut, radar, polarArea



let litCharType = 'line';
let litX = ['Boston','Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'];
let litY = [ 30, 50, 100, 25, 18, 60];
let litZ = 'Light'; 


let litChart = document.getElementById('light').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';

	
	


let lightChar = {
   type: litCharType,
   data: { 
       labels: litX,
       datasets:[{
           label:litZ,
           fill: false,
           data: litY,
           backgroundColor:'#dd4fcf',
           borderWidth:1,
           borderColor:'white',
           hoverBorderWidth:3,
           hoverBorderColor:'black'
       }]
   },
// -------------------------------------
   options: {
       // title control
       title:{
           display: true,
           text: 'Green House Light Monitor',
           fontSize: 20
       },
       // keys control
       legend:{
           display: false,
           position: 'right',
           labels:{
               fontColor:'white'
           }
       },
       // positioning
       layout:{
           padding:{
               left:0,
               right:0,
               bottom:0,
               top:0
           }
       },
       // tooltips
       tooltips:{
           enabled: true
       }
   }
};

let lightChart = new Chart(light, lightChar);

// ----------------------------------------------------------------------------------------



// bar, horizontalBar, pie, line, doughnut, radar, polarArea


let moistCharType = 'line';
let moistX = ['Boston','Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'];
let moistY = [ 30, 50, 100, 25, 18, 60];
let moistZ = 'moistZ'; 


let moiChart = document.getElementById('moisture').getContext('2d');

// Global options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontColor = '#777';



let moisChart = {
   type: moistCharType,
   data: { 
       labels: moistX,
       datasets:[{
           label:moistZ,
           fill: false,
           data: moistY ,
           backgroundColor:'#dd4fcf',
           borderWidth:1,
           borderColor:'white',
           hoverBorderWidth:3,
           hoverBorderColor:'black'
       }]
   },
// --------------------------------------
   options: {
       // title control
       title:{
           display: true,
           text: 'Green House Moisture Monitor',
           fontSize: 20
       },
       // keys control
       legend:{
           display: false,
           position: 'right',
           labels:{
               fontColor:'white'
           }
       },
       // positioning
       layout:{
           padding:{
               left:0,
               right:0,
               bottom:0,
               top:0
           }
       },
       // tooltips
       tooltips:{
           enabled: true
       }
   }
};

let moChart = new Chart(moisture, moisChart);