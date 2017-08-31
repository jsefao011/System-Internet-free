<?php $__env->startSection('title'); ?>
    <a class="navbar-brand" href="#"> Reporte Real </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-9">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="md md-timer md-2x"></i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Coloured Bars Chart
                            <small> - Rounded</small>
                        </h4>
                    </div>
                    <div id="colouredBarsChart" class="ct-chart"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="mm md-timelapse md-2x"></i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Coloured Bars Chart
                            <small> - Rounded</small>
                        </h4>
                    </div>
                    <div id="colouredBarsChart2" class="ct-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="red">
                    <i class="md md-picture-in-picture md-2x"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Pie Chart</h4>
                </div>
                <div id="chartPreferences" class="ct-chart"></div>
                <div class="card-footer">
                    <h6>Legend</h6>
                    <i class="fa fa-circle text-info"></i> Apple
                    <i class="fa fa-circle text-warning"></i> Samsung
                    <i class="fa fa-circle text-danger"></i> Windows Phone
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){


            /*  **************** Coloured Rounded Line Chart - Line Chart ******************** */


            dataColouredBarsChart = {
                labels: ['\'06','\'07','\'08','\'09', '\'10', '\'11', '\'12', '\'13', '\'14','\'15','\'06','\'07','\'08','\'09', '\'10', '\'11', '\'12', '\'13', '\'14','\'15','\'06','\'07','\'08','\'09', '\'10', '\'11', '\'12', '\'13', '\'14','\'15',],
                series: [
                    [287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944,287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944,287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944,287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944,287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944,287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944,],
                    [67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647,67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647,67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647,67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647,67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647,67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647,],
                    [23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509,23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509,23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509,23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509,23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509,23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509,]
                ]
            };

            optionsColouredBarsChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 10
                }),
                axisY: {
                    showGrid: true,
                    offset: 40
                },
                axisX: {
                    showGrid: false,
                },
                low: 0,
                high: 1000,
                showPoint: true,
                height: '300px'
            };


            var colouredBarsChart = new Chartist.Line('#colouredBarsChart2', dataColouredBarsChart, optionsColouredBarsChart);

            md.startAnimationForLineChart(colouredBarsChart);


            dataColouredBarsChart = {
                labels: ['\'06','\'07','\'08','\'09', '\'10', '\'11', '\'12', '\'13', '\'14','\'15'],
                series: [
                    [287, 385, 490, 554, 586, 698, 695, 752, 788, 846, 944],
                    [67, 152, 143,  287, 335, 435, 437, 539, 542, 544, 647],
                    [23, 113, 67, 190, 239, 307, 308, 439, 410, 410, 509]
                ]
            };

            optionsColouredBarsChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 10
                }),
                axisY: {
                    showGrid: true,
                    offset: 40
                },
                axisX: {
                    showGrid: false,
                },
                low: 0,
                high: 1000,
                showPoint: true,
                height: '300px'
            };


            var colouredBarsChart = new Chartist.Line('#colouredBarsChart', dataColouredBarsChart, optionsColouredBarsChart);

            md.startAnimationForLineChart(colouredBarsChart);


            /*  **************** Public Preferences - Pie Chart ******************** */

            var dataPreferences = {
                labels: ['62%','32%','6%'],
                series: [62, 32, 6]
            };

            var optionsPreferences = {
                height: '230px'
            };

            Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);


        });



    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>