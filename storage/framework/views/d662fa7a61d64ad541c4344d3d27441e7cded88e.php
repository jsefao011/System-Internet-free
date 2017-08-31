<?php $__env->startSection('title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="rose">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Monitoreo:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#profile" data-toggle="tab" aria-expanded="true">
                                        <i class="md md-bug-report"></i> Contrato
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#messages" data-toggle="tab" aria-expanded="false">
                                        <i class="md md-computer"></i> Areas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="col-sm-12" style="padding: 0;">
                                        <div class="card" style="margin: 0;">
                                            <div class="card-content">
                                                <h5 class="card-title" style="float: left;">1 <small>ISP-Telefónica-Feb-2017</small></h5>
                                                <ul class="actions" style="float: right">
                                                    <li><button class="btn btn-round btn-fab bgm-white" style="height: 35px;width: 35px;min-width: 0;bottom: 1rem;color: #3C4858;text-decoration: none;font-size: 2rem;border: 0.1rem solid;">14<div class="ripple-container"></div></button></li>
                                                    <li><h5><small> Mbts</small></h5></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding: 0;">
                                        <div class="card" style="margin: 0;">
                                            <div class="card-content">
                                                <h5 class="card-title" style="float: left;">2 <small>ISP-Claro-Agosto-2016</small></h5>
                                                <ul class="actions" style="float: right">
                                                    <li><button class="btn btn-round btn-fab bgm-white" style="height: 35px;width: 35px;min-width: 0;bottom: 1rem;color: #3C4858;text-decoration: none;font-size: 2rem;border: 0.1rem solid;">7<div class="ripple-container"></div></button></li>
                                                    <li><h5><small> Mbts</small></h5></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="card">
                                        <div class="card-content">
                                            <h5>Consumo de Mbts</h5>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div id="container" style="min-width: 230px; height: 220px; margin: 0 auto">
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div id="Barraras" style=" height: 400px; margin: 0 auto">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="col-sm-12" style="padding: 0;">
                                        <div class="card" style="margin: 0;">
                                            <div class="card-content">
                                                <h5 class="card-title" style="float: left;">1 <small>Productos Union</small></h5>
                                                <ul class="actions" style="float: right">
                                                    <li><button class="btn btn-round btn-fab bgm-white" style="height: 35px;width: 35px;min-width: 0;bottom: 1rem;color: #3C4858;text-decoration: none;font-size: 2rem;border: 0.1rem solid;">7<div class="ripple-container"></div></button></li>
                                                    <li><h5><small> Mbts</small></h5></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="padding: 0;">
                                        <div class="card" style="margin: 0;">
                                            <div class="card-content">
                                                <h5 class="card-title" style="float: left;">2 <small>Colegio Union</small></h5>
                                                <ul class="actions" style="float: right">
                                                    <li><button class="btn btn-round btn-fab bgm-white open_r" style="height: 35px;width: 35px;min-width: 0;bottom: 1rem;color: #3C4858;text-decoration: none;font-size: 2rem;border: 0.1rem solid;">7<div class="ripple-container"></div></button></li>
                                                    <li><h5><small> Mbts</small></h5></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-8" id="reporte_grafic" style="display: none">
                                    <div class="card">
                                        <div class="card-content">
                                            <h5>Consumo de Mbts</h5>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div id="container1" style="min-width:200px;  height: 200px;  margin: 0 auto">
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div id="Lineas" style="min-width: 400px; height: 200px; margin: 0 auto"></div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div id="Barra1" style=" height: 400px; margin: 0 auto">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="tab-pane" id="settings">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="../../assets/plugin/highchart/js/highcharts-more.js"></script>
    <script type="text/javascript" src="../../assets/plugin/highchart/js/modules/exporting.js"></script>

    <script>
        $(function () {
            $('.open_r').click(function(){
                console.log("ddd");
                $('#reporte_grafic').show(200);
            });
            $('#container').highcharts({

                        chart: {
                            type: 'gauge',
                            plotBackgroundColor: null,
                            plotBackgroundImage: null,
                            plotBorderWidth: 0,
                            plotShadow: false
                        },

                        title: {
                            text: 'Tiempo Real'
                        },

                        pane: {
                            startAngle: -150,
                            endAngle: 150,
                            background: [{
                                backgroundColor: {
                                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                    stops: [
                                        [0, '#FFF'],
                                        [1, '#333']
                                    ]
                                },
                                borderWidth: 0,
                                outerRadius: '109%'
                            }, {
                                backgroundColor: {
                                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                    stops: [
                                        [0, '#333'],
                                        [1, '#FFF']
                                    ]
                                },
                                borderWidth: 1,
                                outerRadius: '107%'
                            }, {
                                // default background
                            }, {
                                backgroundColor: '#DDD',
                                borderWidth: 0,
                                outerRadius: '105%',
                                innerRadius: '103%'
                            }]
                        },

                        // the value axis
                        yAxis: {
                            min: 0,
                            max: 200,

                            minorTickInterval: 'auto',
                            minorTickWidth: 1,
                            minorTickLength: 10,
                            minorTickPosition: 'inside',
                            minorTickColor: '#666',

                            tickPixelInterval: 30,
                            tickWidth: 2,
                            tickPosition: 'inside',
                            tickLength: 10,
                            tickColor: '#666',
                            labels: {
                                step: 2,
                                rotation: 'auto'
                            },
                            title: {
                                text: 'km/h'
                            },
                            plotBands: [{
                                from: 0,
                                to: 120,
                                color: '#55BF3B' // green
                            }, {
                                from: 120,
                                to: 160,
                                color: '#DDDF0D' // yellow
                            }, {
                                from: 160,
                                to: 200,
                                color: '#DF5353' // red
                            }]
                        },

                        series: [{
                            name: 'Speed',
                            data: [80],
                            tooltip: {
                                valueSuffix: ' km/h'
                            }
                        }]

                    },
                    // Add some life
                    function (chart) {
                        if (!chart.renderer.forExport) {
                            setInterval(function () {
                                var point = chart.series[0].points[0],
                                        newVal,
                                        inc = Math.round((Math.random() - 0.5) * 20);

                                newVal = point.y + inc;
                                if (newVal < 0 || newVal > 200) {
                                    newVal = point.y - inc;
                                }

                                point.update(newVal);

                            }, 3000);
                        }
                    });

            $('#Barraras').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Consumo Mbts/s trimestral'
                },
                subtitle: {
                    text: 'Areas de un Contrato'
                },
                xAxis: {
                    categories: ['Trimestre 1','Trimestre 2','Trimestre 3'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Mbts/s Promedio Trimestral',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' millions'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Productos Union',
                    data: [97,340,820,]
                }, {
                    name: 'Colegio Union',
                    data: [13, 156, 947,]
                }, {
                    name: 'Administrativa',
                    data: [93, 256, 247,]
                }, {
                    name: 'Laboratorios',
                    data: [113, 126, 647,]
                }]
            });



            $('#container1').highcharts({

                        chart: {
                            type: 'gauge',
                            plotBackgroundColor: null,
                            plotBackgroundImage: null,
                            plotBorderWidth: 0,
                            plotShadow: false
                        },

                        title: {
                            text: ''
                        },

                        pane: {
                            startAngle: -150,
                            endAngle: 150,
                            background: [{
                                backgroundColor: {
                                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                    stops: [
                                        [0, '#FFF'],
                                        [1, '#333']
                                    ]
                                },
                                borderWidth: 0,
                                outerRadius: '109%'
                            }, {
                                backgroundColor: {
                                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                                    stops: [
                                        [0, '#333'],
                                        [1, '#FFF']
                                    ]
                                },
                                borderWidth: 1,
                                outerRadius: '107%'
                            }, {
                                // default background
                            }, {
                                backgroundColor: '#DDD',
                                borderWidth: 0,
                                outerRadius: '105%',
                                innerRadius: '103%'
                            }]
                        },

                        // the value axis
                        yAxis: {
                            min: 0,
                            max: 200,

                            minorTickInterval: 'auto',
                            minorTickWidth: 1,
                            minorTickLength: 10,
                            minorTickPosition: 'inside',
                            minorTickColor: '#666',

                            tickPixelInterval: 30,
                            tickWidth: 2,
                            tickPosition: 'inside',
                            tickLength: 10,
                            tickColor: '#666',
                            labels: {
                                step: 2,
                                rotation: 'auto'
                            },
                            title: {
                                text: 'km/h'
                            },
                            plotBands: [{
                                from: 0,
                                to: 120,
                                color: '#55BF3B' // green
                            }, {
                                from: 120,
                                to: 160,
                                color: '#DDDF0D' // yellow
                            }, {
                                from: 160,
                                to: 200,
                                color: '#DF5353' // red
                            }]
                        },

                        series: [{
                            name: 'Speed',
                            data: [80],
                            tooltip: {
                                valueSuffix: ' km/h'
                            }
                        }]

                    },
                    // Add some life
                    function (chart) {
                        if (!chart.renderer.forExport) {
                            setInterval(function () {
                                var point = chart.series[0].points[0],
                                        newVal,
                                        inc = Math.round((Math.random() - 0.5) * 20);

                                newVal = point.y + inc;
                                if (newVal < 0 || newVal > 200) {
                                    newVal = point.y - inc;
                                }

                                point.update(newVal);

                            }, 3000);
                        }
                    });

            $('#Barra1').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Consumo Mbts/s trimestral'
                },
                subtitle: {
                    text: 'Area'
                },
                xAxis: {
                    categories: ['Trimestre 1','Trimestre 2','Trimestre 3'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Mbts/s del Area',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' millions'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: '#FFFFFF',
                    shadow: true
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Productos Union',
                    data: [97,340,820,]
                }]
            });





            Highcharts.setOptions({
                global: {
                    useUTC: false
                }
            });

            var chart;
            $('#Lineas').highcharts({
                chart: {
                    type: 'spline',
                    animation: Highcharts.svg, // don't animate in old IE
                    marginRight: 10,
                    events: {
                        load: function() {

                            // set up the updating of the chart each second
                            var series = this.series[0];
                            setInterval(function() {
                                var x = (new Date()).getTime(), // current time
                                        y = Math.random();
                                series.addPoint([x, y], true, true);
                            }, 1000);
                        }
                    }
                },
                title: {
                    text: 'Consumo Mbts/S'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150
                },
                yAxis: {
                    title: {
                        text: 'Value'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                                Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                                Highcharts.numberFormat(this.y, 2);
                    }
                },
                legend: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                series: [{
                    name: 'Random data',
                    data: (function() {
                        // generate an array of random data
                        var data = [],
                                time = (new Date()).getTime(),
                                i;

                        for (i = -19; i <= 0; i++) {
                            data.push({
                                x: time + i * 1000,
                                y: Math.random()
                            });
                        }
                        return data;
                    })()
                }]
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>