<?php
error_reporting(-1);
ini_set('display_errors', 1);

function dateRange($first, $last, $step = 86400, $format = 'Y M d')
{
    $dates   = [];
    $current = $first;

    while ($current <= $last) {
        $dates[] = date($format, $current);
        $current += $step;
    }

    return $dates;
}

$dateRange = dateRange(time() - 2592000, time());

$dateRange[] = '';
$dateRange[] = 'By month';

$barNames  = ['In Stock', 'DFM', 'DFM from MFG', 'Default Avail', 'Out Of Stock', 'Test test'];
$barColors = [
    'rgba(83, 218, 63, 1)',
    'rgba(240, 255, 136, 1)',
    'rgba(229, 225, 115, 1)',
    'rgba(137, 211, 226, 1)',
    'rgba(241, 123, 124, 1)',
    'rgba(251, 200, 124, 1)'
];

$test                = 0;
$outputDataInNumbers = [];
$forTrandLine        = [];
while ($test++ < 31) {
    if ($test === 6) {
        $outputDataInNumbers[] = [
            mt_rand(1, 2000),
            mt_rand(1, 5000),
            mt_rand(7000, 8131),
            mt_rand(35000, 38867),
            mt_rand(7500, 8275),
            mt_rand(7500, 8275)
        ];
    } else {
        $outputDataInNumbers[] = [
            mt_rand(1, 2000),
            mt_rand(1, 5000),
            mt_rand(7000, 8131),
            mt_rand(35000, 38867),
            mt_rand(7500, 8275)
        ];
    }
}

//var_dump($outputDataInNumbers);
//die;
$forMonth = [];
$forMonthBuffer = [];

//foreach ($outputDataInNumbers as $key => $value) {
//    $numbersSum = array_sum($value);
//    $forMonth[] = $numbersSum / count($value);
//}
//die;
//foreach ($outputDataInNumbers as $value) {
//    foreach ($value as $key => $item) {
//        $forMonthBuffer[$key][] = $item;
//    }
//}
//
//foreach ($forMonthBuffer as $value) {
//    $forMonth[] = array_sum($value) / count($value);
//}

//$outputDataInNumbers[] = $forMonth;
$testBuffer = 0;
$outputData = [];
foreach ($outputDataInNumbers as $key => $value) {
    $fullPercent = array_sum($value);

    if ($fullPercent > 0) {
        $convertedPercentage = [];
        foreach ($value as $numericDataKey => $percentValue) {
            $percents = round($percentValue / $fullPercent * 100, 2);
            $outputDataInNumbers[$key][$numericDataKey] = $percents;

//            $forTrandLine[$numericDataKey][] = $percentValue / 2;
        }

//        array_map(function ($swfdswwdf) {
//            var_dump($swfdswwdf);
//        }, $forTrandLine);
//        die;
    }
}

//foreach ($forTrandLine as $key => $test) {
//    $fullPercent = array_sum($test);
//
//    foreach ($test as $numericDataKey => $percentValue) {
//        $percents = round($percentValue / $fullPercent * 100, 2);
//        $forTrandLine[$key][$numericDataKey] = $percents;
//    }
//}

$outputDataInNumbers = array_map(null, ...$outputDataInNumbers);

foreach ($outputDataInNumbers as $key => $value) {
    $numbersSum     = array_sum($value);
    $outputDataInNumbers[$key][] = 0;

//    $filteredArray = array_filter($value);
    $middleValue = round($numbersSum / count($value), 2);
    $outputDataInNumbers[$key][] = $middleValue;

    $forMonth[] = $middleValue;
}

//var_dump($forTrandLine);

//
//var_dump($outputDataInNumbers);
//die;


//var_dump($outputDataInNumbers);die;
//$forTrandLine = array_map(null, ...$forTrandLine);

array_pop($forMonth);
//array_pop($array);

//var_dump($forMonth);die;
$data = json_encode([
    'forMonth'            => $forMonth,
    'dateRange'           => $dateRange,
    'numericData'         => $outputDataInNumbers,
    'numericDataForTrand' => $forTrandLine,
    'barColors'           => $barColors,
    'barNames'            => $barNames
]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Charts Tester</title>

    <style>
        .block-style {
            height: 600px;
        }

        .margin {
            margin-top: 350px;
        }
    </style>
</head>
<body>

<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>

<div class="block-style">
    <canvas id="myChart"></canvas>
</div>

<div class="block-style margin">
    <canvas id="myChart2"></canvas>
</div>

<script>
    var ctx = document.getElementById("myChart");
    var ctx2 = document.getElementById("myChart2");

    var data = JSON.parse('<?= $data ?>');

    var randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };

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
        datasets2 = [];

    data.forMonth.forEach(function (value) {
        var i = 0;
        var horisontalLineData = [];
        while (i++ < data.dateRange.length) {
            horisontalLineData.push(value);
        }

        datasets.push({
            type: 'line',
            label: '',
            data: horisontalLineData,
            fill: false,
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1,
            borderDash: [5],
            steppedLine: false,
            pointRadius: 0,
            pointHoverRadius: 0
        });
    });

    data.numericData.forEach(function (value, key) {
        datasets.push({
            label: data.barNames[key],
            data: value,
            backgroundColor: data.barColors[key],
            borderColor: data.barColors[key],
            borderWidth: 1
        });
    });

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.dateRange,
            datasets: datasets
        },
        options: {
//            legend: {
//                display: false
//            },
            scales: {
                yAxes: [{
                    stacked: true,
                    ticks: {
                        min: 0,
                        max: 100
                    }
                }],
                xAxes: [{
                    stacked: true,
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var counter = 0;
    var dataLines = [];
    var dataLines2 = [];
    var titles = [];

    while (counter++ < 30) {
        dataLines.push(randomInteger(1957, 1960, 1));
        dataLines2.push(randomInteger(1954, 1957, 1));
        titles.push(randomInteger(1957, 1960, 1));
    }

    datasets2.push({
        type: 'line',
        label: '',
        data: dataLines,
        borderColor: 'rgba(18, 136, 195, 1)',
        borderWidth: 2,
        steppedLine: false,
        pointRadius: 0,
        pointHoverRadius: 0
    });

    datasets2.push({
        type: 'line',
        label: '',
        data: dataLines2,
        borderColor: 'rgba(238, 130, 39, 1)',
        borderWidth: 2,
        steppedLine: false,
        pointRadius: 0,
        pointHoverRadius: 0
    });

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: titles,
            datasets: datasets2
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