<?php $__env->startSection('title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row" style="margin-top: -77px;">
        <div class="card">
            <div class="card-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="realtime">
                        <div id="grap_monitor" class="row">
                            <div class="col-md-5">
                                <select id="selec_contrato" class="selectpicker" data-live-search="true" data-style="btn btn-primary" title="Seleccionar Contrato" data-size="7">
                                    <?php if(isset($data->Contrato)): ?>
                                        <?php foreach($data->Contrato as $itemContrato): ?>
                                            <option data-value="<?php echo e(json_encode($itemContrato->areas)); ?>" data-mbps="<?php echo e($itemContrato->Velocidad_Mb); ?>" data-consumo="<?php echo e($itemContrato->ConsumoReal); ?>" value="<?php echo e($itemContrato->Interface); ?>"><?php echo e($itemContrato->Descripcion); ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <select id="selec_area" class="selectpicker" data-live-search="true" data-style="btn btn-primary" title="Seleccionar Area" data-size="7">
                                </select>
                                <div class="col-md-12">
                                    <div id="horapro" style="max-width: 280px;"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <input id="interface" type="hidden" value="">
                                <div id="container"></div>
                                <span  style="font-size: 15px;color: #2f7ed8;" class="fa fa-long-arrow-up" id="tx_t"></span>
                                <span  style="font-size: 15px;color: #0d233a;" class="fa fa-long-arrow-down" id="rx_t"></span>
                            </div>
                            <div class="col-md-12" style="">
                                <div id="Barraras" style="display:none;width: 70%"></div>
                            </div>
                            <div class="col-md-12" style="">
                                <div style="display: none;" id="Consumo">
                                    <div class="col-md-7">
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
                                    <div class="col-md-5">
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
                                    <div class="col-md-7">
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
        var jose;
        window.onbeforeunload = confirmExit;
        function confirmExit()
        {
            clearInterval(jose);
        }
        $(document).ready(function() {
            Highcharts.setOptions({
                global: {
                    useUTC: false
                }
            });

            var TX = 0,RX = 0;
            var Datos = [];
            var mbts = 40;
            setInterval(function () {
                requestDatta($('#interface').val());
            }, 1800);

            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container',
                    animation: Highcharts.svg,
                    type: 'spline',
                    events: {
                        load: function () {

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
            function requestDatta(interface) {
                if(interface == "")
                {
                    return false;
                }
                var xhr = $.ajax({
                    url: '/getdata/' + interface,
                    //timeout: 1000,
                    //async: true,
                    datatype: "json",
                    success: function (data) {
                        var midata = JSON.parse(data);
                        TX = parseInt(midata[0].data);
                        RX = parseInt(midata[1].data);
                        var x = (new Date()).getTime();
                        shift = chart.series[0].data.length > 19;
                        chart.series[0].addPoint([x, TX], true, shift);
                        chart.series[1].addPoint([x, RX], true, shift);

                        //point.update(TX);
                        $('#tx_t').text(TX+' Mbps');
                        $('#rx_t').text(RX+' Mbps');
                    },
                    error: function (data) {
                            console.log('error');

                    }
                });

            }

            $('#selec_contrato').change( function (d) {
                $('#grap_monitor').hide(1000);

                $('#interface').val($(this).val());
                $('#selec_area').html('');
                Datos = [];
                var mlstAreas = $(this).find(":selected").data("value");
                var mint_Mbps = $(this).find(":selected").data("mbps");
                var mint_Consumo = $(this).find(":selected").data("consumo");
                console.log(mint_Mbps,mint_Consumo);
                f_graficoReloj(mint_Mbps,mint_Consumo);
                $.each(mlstAreas,function (d, r){

                    $('#selec_area').append('<option value="'+ r.Interface +'">'+ r.Nom_Area +'</option>');
                    var consTrimestral = roundtwo(r.ConsumoReal/3);
                    Datos.push({
                        name: r.Nom_Area,
                        data: [consTrimestral,0,0]
                    });
                });

                f_graficosbarra(Datos);

                $('#selec_area').selectpicker('render');
                $('#selec_area').selectpicker('refresh');
                $('#Barraras').show(1000);
                $('#Consumo').hide();
                $('#grap_monitor').show(1000);
            });

            $('#selec_area').on('change',function () {
                $('#grap_monitor').hide(1000);
                var mstr_val = $(this).val();
                $('#interface').val($(this).val());
                $('#Barraras').hide(1000);
                $('#Consumo').show();
                $('#grap_monitor').show(1000);
                demo.initCharts([[12, 17, 7, 17, 23, 18, 38]],[[16, 8, 13, 20, 15, 20, 34, 30,9,1,5]],[[542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]],40);
            });

            function f_graficoReloj(mbts,Subida){
                if(mbts == null || mbts == 'undefined')
                {
                    mbts = 0;
                }else if(Subida == null || Subida == 'undefined')
                {
                    Subida = 0;
                }
                $('#horapro').highcharts({

                            chart: {
                                type: 'gauge',
                                plotBackgroundColor: null,
                                plotBackgroundImage: null,
                                plotBorderWidth: 0,
                                plotShadow: false
                            },

                            title: {
                                text: 'Consumo Mbps por Contrato'
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
                                max: mbts,

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
                                    text: 'Mbts'
                                },
                                plotBands: [{
                                    from: 0,
                                    to: Math.round(mbts*0.6),
                                    color: '#55BF3B' // green
                                }, {
                                    from:  Math.round(mbts*0.6),
                                    to:  Math.round(mbts*0.8),
                                    color: '#DDDF0D' // yellow
                                }, {
                                    from:  Math.round(mbts*0.8),
                                    to:  mbts,
                                    color: '#DF5353' // red
                                }]
                            },

                            series: [{
                                name: 'Consumo',
                                data: [0],
                                tooltip: {
                                    valueSuffix: ' kpps'
                                }
                            }]

                        },
                        // Add some life
                        function (chart) {
                            if (!chart.renderer.forExport) {
                                var point = chart.series[0].points[0];
                                point.update(Subida);
                            }
                        });

            }

            function f_graficosbarra(Datos){
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
                    series: Datos
                });

            }

        });

        var demo = {

            initCharts: function(data1,data2,data3,rango){
                //---  chart for day ---
                dataRoundedLineChart = {
                    labels: ['L', 'M', 'M', 'J', 'V', 'S', 'D'],
                    series:data1
                            //[[12, 17, 7, 17, 23, 18, 38]]
                };

                optionsRoundedLineChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 10
                    }),
                    axisX: {
                        showGrid: false,
                    },
                    low: 0,
                    high: rango+10, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                    chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
                    showPoint: false
                };

                var RoundedLineChart = new Chartist.Line('#roundedLineChart', dataRoundedLineChart, optionsRoundedLineChart);

                md.startAnimationForLineChart(RoundedLineChart);

                //---------------------------------------------------------------------------------------------------------------

                /*  **************** Grap consumo por hora  ******************** */

                dataStraightLinesChart = {
                    labels: ['2','4', '6', '8', '10', '12', '14','16','20','22','24'],
                    series: data2
                            //[[16, 8, 13, 20, 15, 20, 34, 30,9,1,5,7,5,22,7,8,19,6,21,8,25,6,14,12]]
                };

                optionsStraightLinesChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 0
                    }),
                    low: 0,
                    high: rango+10, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
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
                    series: data3
                            //[[542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]]
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
        function roundtwo(num){
            return +(Math.round(num +"e+2") +"e-2");
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>