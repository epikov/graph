<!DOCTYPE html>
<html>
<head>
    <title>My first Chartist Tests</title>
    <link rel="stylesheet"
          href="css/chartist.min.css">

    <style>
        .ct-perfect-fourth {
            height: 500px;
            width: 900px;
        }
    </style>
</head>
<body>
<div class="ct-chart ct-perfect-fourth"></div>
<div class="ct-chart2 ct-perfect-fourth"></div>
<div class="ct-chart3 ct-perfect-fourth"></div>
<!-- Site content goes here !-->
<script src="js/chartist.min.js"></script>

<script>
    new Chartist.Bar('.ct-chart', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [800000, 1200000, 1400000, 1300000],
            [200000, 400000, 500000, 300000],
            [100000, 200000, 400000, 600000]
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
            }
        }
    }).on('draw', function(data) {
        if(data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 50px'
            });
        }
    });

    new Chartist.Bar('.ct-chart2', {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        series: [
            [5, 4, 3],
            [3, 2, 9],
            [9, 10, 11],
            [12, 13, 14],
            [15, 16, 17]
        ]
    }, {
        seriesBarDistance: 10,
        stackBars: true,
        reverseData: true,
        horizontalBars: true,
        axisY: {
            offset: 70
        }
    }).on('draw', function(data) {
        if(data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 50px'
            });
        }
    });

    var chart = new Chartist.Line('.ct-chart3', {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        series: [
            [1, 5, 2, 5, 4, 3],
            [2, 3, 4, 8, 1, 2],
            [5, 4, 3, 2, 1, 0.5]
        ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });

//    chart.on('draw', function(data) {
//        if(data.type === 'line' || data.type === 'area') {
//            data.element.animate({
//                d: {
//                    begin: 2000 * data.index,
//                    dur: 2000,
//                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
//                    to: data.path.clone().stringify(),
//                    easing: Chartist.Svg.Easing.easeOutQuint
//                }
//            });
//        }
//    });

</script>
</body>
</html>