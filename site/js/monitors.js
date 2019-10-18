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

let hSum = [
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
            label: 'Temprature',
            backgroundColor: window.chartColors.blue,
            borderColor: window.chartColors.blue,
            data: tSum,
            fill: false,
        }, {
            label: 'Humidity',
            backgroundColor: '#be6448',
            borderColor: '#be6448',
            borderDash: [15, 15],
            data: hSum,
            fill: false,
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


// --------------------------------------------------------------------------------------------------
// Guage 




// ---------------------------------------------------------------------------------------------------------------
// first chart 

// bar, horizontalBar, pie, line, doughnut, radar, polarArea
let charType = 'line';
let tempX = ['January', 'February', 'March', 'April', 'May'];
let tempY = [20, 33, 29, 33, 10, 20, 50];
let tempZ = 'Temperature';
let tempFill = true;
let tempColor = '#dd4fcf2b';
let max_temp = 55;
let min_temp = 19;
tempY_value = tempY[tempY.length - 3];
function temp_warning() {
    if (tempY_value > max_temp) {
        tempColor = '#ff292942';
        // alert("Warning Temprature sensor value is: " + tempY_value)
    } else {
        tempColor = '#dd4fcf2b';
    };


    if (tempY_value < min_temp) {
        tempColor = '#2bffe633';
        alert("Warning Temprature sensor value is: " + tempY_value);
    } else {
        tempColor = '#dd4fcf2b';
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

let humCharType = 'line';
let humX = ['January', 'February', 'March', 'April'];
let humY = [27, 20, 30, 25, 18, 60];
let humZ = 'Humidity';
let humFill = true;
let humColor = '#dd4fcf2b';
let max_hum = 35;
let min_hum = 19;
humY_value = humY[humY.length - 1];
function hum_warning() {
    if (humY_value > max_hum) {
        humColor = '#ff292942';
        // alert("Warning Humidity sensor value is:", humY_value)
    } else {
        humColor = '#dd4fcf2b';
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
let litY = [35, 28, 28, 37, 35, 37, 26, 50];
let litZ = 'Light';
let litFill = true;
let litColor = '#dd4fcf2b';
let maxLit = 35;
let minLit = 19;
litY_value = litY[litY.length - 1];
function lit_warning() {
    if (litY_value > maxLit) {
        litColor = '#ff292942';
        // alert("Warning Light sensor value is:", litY_value)
    } else {
        litColor = '#dd4fcf2b';
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
let moistY = [27, 30, 25, 30, 28, 40];
let moistZ = 'moistZ';
let moistFill = true;
// let moistColor = '#EE204D';
let max = 45;
let min = 19;
moistY_value = moistY[moistY.length - 1];

function warning() {
    if (moistY_value > max) {
        moistColor = '#ff292942';
        // alert("Warning Moisture value is:", moistY_value)
    } else {
        moistColor = '#dd4fcf2b';
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


// --------------------------------------------------------------

// making the Moisture chart color orang when abobe avg and red in max as a danger status

