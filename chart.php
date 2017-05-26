<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Charts Tester</title>

    <style>
        .block-style {
            height: 500px;
            width: 900px;
            display: inline-block;
        }
    </style>
</head>

<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>

<div class="block-style">
    <canvas id="myChart"></canvas>
</div>
<div class="block-style">
    <canvas id="myChart2"></canvas>
</div>

<div class="block-style">
    <canvas id="myChart3"></canvas>
</div>

<script>
    var ctx = document.getElementById("myChart");
    var ctx2 = document.getElementById("myChart2");
    var ctx3 = document.getElementById("myChart3");
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes 1',
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },
            {
                label: '# of Votes 2',
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                backgroundColor: [
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            },
            {
                label: '# of Votes 2',
                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero:true
                    }
                }]

            }
        }
    });

    var myChart2 = new Chart(ctx2, {
        type: 'horizontalBar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes 1',
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },
                {
                    label: '# of Votes 2',
                    data: [
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor(),
                        randomScalingFactor()
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: '# of Votes 2',
                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero:true
                    }
                }],
                xAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero:true
                    }
                }]

            }
        }
    });

    var config = {
        type: 'line',
        data: {
            labels: [["June","2015"], "July", "August", "September", "October", "November", "December", ["January","2016"],"February", "March", "April", "May"],
            datasets: [{
                label: "First dataset",
                fill: false,
                backgroundColor: 'rgba(255, 159, 64, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: "Second dataset",
                fill: false,
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderColor: 'rgba(255, 206, 86, 1)',
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }, {
                label: "Third dataset",
                fill: false,
                backgroundColor: 'rgba(54, 192, 78, 1)',
                borderColor: 'rgba(123, 168, 86, 1)',
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }]
        },
        options: {
            responsive: true,
            title:{
                display:true,
                text:'Chart with Multiline Labels'
            }
        }
    };
    window.onload = function() {
        window.myLine = new Chart(ctx3, config);
    };
</script>

</body>
</html>