<?php $__env->startSection('title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row" style="margin-top: -77px;">
        <div class="card">
            <div class="card-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="realtime">
                        <div class="col-md-offset-9 col-sm-3">
                            <select id="selec_area" class="selectpicker" data-live-search="true" data-style="btn btn-primary" title="Seleccionar Area" data-size="7">
                                <?php if(isset($data->area)): ?>
                                    <?php foreach($data->area as $a): ?>
                                        <option value="<?php echo e($a->Interface); ?>"><?php echo e($a->Nom_Area); ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div id="grap_monitor" class="row">
                            <div class="col-md-9">
                                <input id="interface" type="hidden" value="WLAN">
                                <div id="container"></div>
                                <span  style="font-size: 15px;color: #2f7ed8;" class="fa fa-long-arrow-up" id="tx_t"></span>
                                <span  style="font-size: 15px;color: #0d233a;" class="fa fa-long-arrow-down" id="rx_t"></span>
                            </div>
                            <div class="col-md-3">
                                <div id="horapro"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card card-chart">
                                        <div class="card-header" data-background-color="orange">
                                            <div id="straightLinesChart" class="ct-chart"></div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Mbps por Hora </h4>
                                            <p class="category">Reporte de Consumo por Hora</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-chart">
                                        <div class="card-header" data-background-color="rose">
                                            <div id="roundedLineChart" class="ct-chart"></div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Mbps por Dia</h4>
                                            <p class="category">Reporte de Consumo por Dia</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-chart">
                                        <div class="card-header" data-background-color="blue">
                                            <div id="simpleBarChart" class="ct-chart"></div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Mbps por Mes</h4>
                                            <p class="category">Reporte de Consumo por Mes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane" id="history">
                        <di id="area2"></di>
                    </div>
                    <div class="tab-pane" id="settings">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var chart,TX,RX;
        $(document).ready(function() {
            demo.initCharts();
            Highcharts.setOptions({
                global: {
                    useUTC: false
                }
            });

            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    animation: Highcharts.svg,
                    type: 'spline',
                    events: {
                        load: function () {
                            setInterval(function () {
                                requestDatta($('#interface').val());
                            }, 1000);
                        }
                    }
                },
                title: {
                    text: 'Consumo de Internet'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,
                    maxZoom: 20 * 1000
                },
                yAxis: {
                    minPadding: 0.2,
                    maxPadding: 0.2,
                    title: {
                        text: 'Trafico',
                        margin: 10
                    }
                },
                series: [{
                    name: 'TX',
                    data: []
                }, {
                    name: 'RX',
                    data: []
                }]
            });

            $('#selec_area').change( function (d) {
                $('#grap_monitor').hide(1000);
                $('#interface').val($(this).val());
                $('#grap_monitor').show(1000);

            });

        });

        function requestDatta(interface) {
            $.ajax({
                url: '/getdata/' + interface,
                datatype: "json",
                success: function (data) {
                    var midata = JSON.parse(data);
                    TX = parseInt(midata[0].data);
                    RX = parseInt(midata[1].data);
                    var x = (new Date()).getTime();
                    shift = chart.series[0].data.length > 19;
                    chart.series[0].addPoint([x, TX], true, shift);
                    chart.series[1].addPoint([x, RX], true, shift);
                    $('#tx_t').text(TX+' Mbps');
                    $('#rx_t').text(RX+' Mbps');
                },
                error: function (xhr) {
                }
            });

        }

        $(function () {

            $('#horapro').highcharts({

                        chart: {
                            type: 'gauge',
                            plotBackgroundColor: null,
                            plotBackgroundImage: null,
                            plotBorderWidth: 0,
                            plotShadow: false
                        },
                        title: {
                            text: 'Promedio de Mbps por segundo'
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
                                borderWidth: 4,
                                outerRadius: '107%'
                            }, {
                                // default background
                            }, {
                                backgroundColor: '#ecf0f1',
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
                                text: 'mbps/h'
                            },
                            plotBands: [{
                                from: 0,
                                to: 120,
                                color: '#2196F3' // green
                            }, {
                                from: 120,
                                to: 160,
                                color: '#1976D2' // yellow
                            }, {
                                from: 160,
                                to: 200,
                                color: '#0D47A1' // red
                            }]
                        },

                        series: [{
                            name: 'Speed',
                            data: [80],
                            tooltip: {
                                valueSuffix: ' Mbps/h'
                            }
                        }]

                    },
                    function (chart) {
                        if (!chart.renderer.forExport) {

                            setInterval(function () {
                                $.ajax({
                                    url:'<?php echo e(url('getdata')); ?>'+'/'+$('#interface').val(),
                                    success:function (data) {
                                        var midata = JSON.parse(data);
                                        TX = parseInt(midata[0].data);
                                        var point = chart.series[0].points[0],newVal,
                                                inc = TX;


                                        newVal = point.y + inc;
                                        if (newVal < 0 || newVal > 200) {
                                            newVal = point.y - inc;
                                        }

                                        point.update(TX);
                                    },
                                    error:function (e) {
                                        console.log(e);
                                    }
                                });


                            }, 1000);
                        }

                    });
        });

        demo = {

            initCharts: function(){
                //---  chart for day ---
                dataRoundedLineChart = {
                    labels: ['Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa', 'Do'],
                    series: [
                        [12, 17, 7, 17, 23, 18, 38]
                    ]
                };

                optionsRoundedLineChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 10
                    }),
                    axisX: {
                        showGrid: false,
                    },
                    low: 0,
                    high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                    chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
                    showPoint: false
                };

                var RoundedLineChart = new Chartist.Line('#roundedLineChart', dataRoundedLineChart, optionsRoundedLineChart);

                md.startAnimationForLineChart(RoundedLineChart);

                //---------------------------------------------------------------------------------------------------------------

                /*  **************** Grap consumo por hora  ******************** */

                dataStraightLinesChart = {
                    labels: ['00','01','02', '03', '04', '05', '06', '07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23'],
                    series: [
                        [16, 8, 13, 20, 15, 20, 34, 30,9,1,5,7,5,22,7,8,19,6,21,8,25,6,14,12]
                    ]
                };

                optionsStraightLinesChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 0
                    }),
                    low: 0,
                    high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                    chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
                    classNames: {
                        point: 'ct-point ct-white',
                        line: 'ct-line ct-white'
                    }
                }

                var straightLinesChart = new Chartist.Line('#straightLinesChart', dataStraightLinesChart, optionsStraightLinesChart);

                md.startAnimationForLineChart(straightLinesChart);



                /*  **************** Simple Bar Chart - barchart ******************** */

                var dataSimpleBarChart = {
                    labels: ['Ene', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    series: [
                        [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]
                    ]
                };

                var optionsSimpleBarChart = {
                    seriesBarDistance: 10,
                    axisX: {
                        showGrid: false
                    }
                };

                var responsiveOptionsSimpleBarChart = [
                    ['screen and (max-width: 640px)', {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function (value) {
                                return value[0];
                            }
                        }
                    }]
                ];

                var simpleBarChart = Chartist.Bar('#simpleBarChart', dataSimpleBarChart, optionsSimpleBarChart, responsiveOptionsSimpleBarChart);

                //start animation for the Emails Subscription Chart
                md.startAnimationForBarChart(simpleBarChart);

            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>