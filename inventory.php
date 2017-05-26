<?php

?>

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

<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>

<div class="block-style">
    <canvas id="myChart"></canvas>
</div>

<script>
    var ctx = document.getElementById("myChart");
//    var data = JSON.parse('<?//= $data ?>//');
//
//    var randomScalingFactor = function() {
//        return Math.round(Math.random() * 100);
//    };
//
    var randomInteger = function (min, max, f) {
        var rand = min + Math.random() * (max + 1 - min);

        if (f) {
            rand = Math.floor(rand);
        } else if (rand > 1) {
            rand = 1;
        }

        return rand;
    };

    var randomColor = function() {
        return 'rgba(' +  randomInteger(0, 255, 1) + ','
            + randomInteger(0, 255, 1) + ','
            + randomInteger(0, 255, 1) + ','
            + randomInteger(0, 1) + ')';
    };

    var datasets = [],
        preparedData = [];
//
//    data.forMonth.forEach(function (value) {
//        var i = 0;
//        var horisontalLineData = [];
//        while (i++ < data.dateRange.length) {
//            horisontalLineData.push(value);
//        }
//
//        datasets.push({
//            type: 'line',
//            label: '',
//            data: horisontalLineData,
//            fill: false,
//            borderColor: 'rgba(0, 0, 0, 1)',
//            borderWidth: 1,
//            borderDash: [5],
//            steppedLine: false,
//            pointRadius: 0,
//            pointHoverRadius: 0
//        });
//    });
//
//    data.numericData.forEach(function (value, key) {
//        datasets.push({
//            label: data.barNames[key],
//            data: value,
//            backgroundColor: data.barColors[key],
//            borderColor: data.barColors[key],
//            borderWidth: 1
//        });
//    });

    var counter = 0;
    var data = [];
    var data2 = [];
    var titles = [];

    while (counter++ < 30) {
        data.push(randomInteger(1957, 1960, 1));
        data2.push(randomInteger(1954, 1957, 1));
        titles.push(randomInteger(1957, 1960, 1));
    }

    datasets.push({
        type: 'line',
        label: '',
        data: data,
//            fill: false,
        borderColor: 'rgba(18, 136, 195, 1)',
        borderWidth: 2,
//        borderDash: [5],
        steppedLine: false,
        pointRadius: 0,
        pointHoverRadius: 0
    });

    datasets.push({
        type: 'line',
        label: '',
        data: data,
//            fill: false,
        borderColor: 'rgba(238, 130, 39, 1)',
        borderWidth: 2,
//        borderDash: [5],
        steppedLine: false,
        pointRadius: 0,
        pointHoverRadius: 0
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: titles,
            datasets: datasets
        },
        options: {
//            legend: {
//                display: false
//            },
            scales: {
                yAxes: [{
//                    stacked: true,
                    ticks: {
                        min: 1900,
                        max: 2000
                    }
                }],
                xAxes: [{
//                    stacked: true,
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>
