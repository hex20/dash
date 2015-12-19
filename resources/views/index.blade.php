<!DOCTYPE html>
<html>
    <head>
        <title>Dash Price</title>
        <script src="{{ URL::asset('Chart.min.js') }}"></script>
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('main.css') }}">
    </head>
    <body>
    <h2>Hi</h2>
        <canvas id="myChart" width="400" height="400"></canvas>
    <script>
        var ctx = document.getElementById("myChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(data, options);
        var data = {}
    </script>
    </body>
</html>
