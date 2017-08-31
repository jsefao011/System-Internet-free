<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Example jse</title>
    <?php if($data->pdf == true): ?>
        <link rel="stylesheet" href="reporte/consumo/style.css" media="all" />
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(url('reporte/consumo/style.css')); ?>" media="all" />
    <?php endif; ?>


<!--<body oncontextmenu="return false" onkeydown="return false">-->
<body>
<div>

    <div id="logo">
        <div style=" float: left; font-weight: bold;padding-left: 10px;">N° <?php echo e(str_pad($data->contrato->idDocumento + 1, 8,0, STR_PAD_LEFT)); ?> </div>
        <div style=" float: right; font-weight: bold;padding-right: 10px;"><?php echo e(Carbon\Carbon::parse()->format('d/m/Y')); ?></div>
        <?php if($data->pdf == true): ?>
            <img src='reporte/consumo/logo.jpg'>
        <?php else: ?>
            <img src="<?php echo e(url('reporte/consumo/logo.jpg')); ?>">
        <?php endif; ?>
    </div>
    <!--style="page-break-before:always;"-->
    <div class="titulo">
        <h1><?php echo e($data->entidad->Nombre); ?></h1>
        <div style="font-weight: bold;">COBRANZA POR EL SERVICIO DE ACCESO DEDICADO A INTERNET</div>
        <div style="font-weight: bold;"><small>PERIODO GENERADO <?php echo e(\Carbon\Carbon::parse($data->fechaDesde)->format('d/m/Y')); ?> AL <?php echo e(\Carbon\Carbon::parse($data->fechaHasta)->format('d/m/Y')); ?></small></div>

    </div>
    <div class="project clearfix" style="display:inline-block;  float: left; width: 45%">
        <div><span>PROVEEDOR</span><?php echo e($data->contrato->proveedor->Nom_Empresa); ?></div>
        <div><span>RUC</span><?php echo e($data->contrato->proveedor->RUC); ?></div>
        <div><span>DIRECCION</span><?php echo e($data->contrato->proveedor->Direccion); ?></div>
        <div><span>TELEFONO</span><?php echo e($data->contrato->proveedor->Telefono); ?></div>
    </div>
    <div class="project" style="display:inline-block; width: 50%">
        <div><span>ENTIDAD</span><?php echo e($data->entidad->Nombre); ?></div>
        <div><span>RUC</span><?php echo e($data->entidad->C_RUC); ?></div>
        <div><span>COD. DE SERVICIO</span><?php echo e($data->entidad->Cod_Servicio); ?></div>
        <div><span>DIR. FACTURACION</span><?php echo e($data->entidad->Dir_FACT); ?></div>
    </div>
</div>
<div>
    <br>
    <table>
        <thead>
        <tr>
            <th>SERVICIO</th>
            <th>CD / Req</th>
            <th>Vel.</th>
            <th>Oficina</th>
            <th>TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data->contrato->detalle as $itemDet): ?>
            <tr>
                <td class="service"><?php echo e($itemDet->Servicio); ?></td>
                <td class="desc"><?php echo e($itemDet->CD_Req); ?></td>
                <td class="unit"><?php echo e($itemDet->Velocidad); ?>&nbsp;Mpbs</td>
                <td class="qty"><?php echo e($itemDet->Oficina); ?></td>
                <td class="total">S/.<?php echo e(number_format((double)$itemDet->Importe,2, '.', ',')); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">TOTAL</td>
                <td class="total"><?php echo e($data->contrato->Velocidad_Mb); ?>&nbsp;Mpbs</td>
                <td colspan="1">SUBTOTAL</td>
                <td class="total">S/.<?php echo e(number_format((double)$data->contrato->Importe/1.18,2, '.', ',')); ?></td>
            </tr>
            <tr>
                <td colspan="4">IGV</td>
                <td class="total">S/.<?php echo e(number_format((double)$data->contrato->Importe - (double)$data->contrato->Importe/1.18, 2, '.', ',')); ?></td>
            </tr>
            <tr>
                <td colspan="4" class="grand total">TOTAL</td>
                <td class="grand total">S/.<?php echo e(number_format($data->contrato->Importe, 2, '.', ',')); ?></td>
            </tr>
        </tfoot>
    </table>
<?php if($data->tipo == 'D'): ?>
    <?php foreach($data->contrato->areas as $i=>$itemArea): ?>
    <div class="subtitulo">
        <div style="width: 95%; display: inline-block">
            <lu style="list-style-type: none;padding: 0;margin: 0;;">
                <li style="float: left;width: 5%;display: inline-block;"><a style="display: block;text-decoration: none;text-align: left;"><h1><?php echo e($i+1); ?>.</h1></a></li>
                <li style="float: left;width: 45%;display: inline-block;;"><a style="display: block;text-decoration: none;text-align: left;"><h1><?php echo e($itemArea->Nom_Area); ?></h1></a></li>
                <li style="float: left;width: 48%;display: inline-block;;"><a style="display: block;text-decoration: none;text-align: right;"><h2>IMPORTE: S/.<?php echo e(number_format($itemArea->consumo["SubTotal"], 3, '.', ',')); ?></h2></a></li>
            </lu>
        </div>
    </div>
        <div class="project clearfix" style="display:inline-block;  float: left; width: 45%;page-break-before: auto;">
            <div><span>AREA</span><?php echo e($itemArea->Nom_Area); ?></div>
            <div><span>RESPONSABLE</span><?php echo e($data->entidad->Nombre); ?></div>
            <div><span>CTAS CTR</span><?php echo e($itemArea->CTAS_CTR); ?></div>
        </div>
        <div class="project" style="display:inline-block; width: 50%;page-break-before: auto;">
            <div><span>PORC. ACUMULADO</span><?php echo e(number_format($itemArea->consumo["Porc_Mbps"], 0, '.', ',')); ?>%</div>
            <div><span>VELOCIDAD</span><?php echo e(number_format($itemArea->consumo["Mbps_Asignado"], 3, '.', ',')); ?> Mbps</div>
            <div><span>IMPORTE</span>S/.<?php echo e(number_format($itemArea->consumo["SubTotal"], 3, '.', ',')); ?></div>
        </div>
        <br>
        <br>
       <?php if(count($itemArea->area) > 0): ?>
        <table>
            <thead>
            <tr>
                <th width="">#</th>
                <th  style="text-align: left;">SUBAREAS</th>
                <th  width="">CTAS CTR</th>
                <th  width="">PORC. ACUMULADO</th>
                <th  width="">VELOCIDAD</th>
                <th  width="">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($itemArea->area as $i1 => $itemArea1): ?>
            <tr>
                <td><?php echo e($i1+1); ?></td>
                <td class="service"><?php echo e($itemArea1->Nom_Area); ?></td>
                <td style="text-align: center;"><?php echo e($itemArea1->CTAS_CTR); ?></td>
                <td style="text-align: center;"><?php echo e(number_format($itemArea1->consumo["Porc_Mbps"], 0, '.', ',')); ?>%</td>
                <td class="qty"><?php echo e(number_format($itemArea1->consumo["Mbps_Asignado"], 3, '.', ',')); ?> Mbts</td>
                <td class="total">S/.<?php echo e(number_format($itemArea1->consumo["SubTotal"], 3, '.', ',')); ?></td>
            </tr>
            <?php if(count($itemArea1->area) > 0): ?>
            <tr>
                <td></td>
                <td colspan="5" class="find">
                    <table style="margin-bottom:0;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th style="text-align: left;" width="50%">SUBAREAS</th>
                            <th>CTAS CTR</th>
                            <th>PORC. ACUMULADO</th>
                            <th>VELOCIDAD</th>
                            <th>TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($itemArea1->area as $i2 => $itemArea2): ?>
                        <tr>
                            <td><?php echo e($i2+1); ?></td>
                            <td class="service"><?php echo e($itemArea2->Nom_Area); ?></td>
                            <td style="text-align: center;"><?php echo e($itemArea2->CTAS_CTR); ?></td>
                            <td style="text-align: center;"><?php echo e(number_format($itemArea2->consumo["Porc_Mbps"], 0, '.', ',')); ?>%</td>
                            <td class="qty"><?php echo e(number_format($itemArea2->consumo["Mbps_Asignado"], 3, '.', ',')); ?> Mbts</td>
                            <td class="total">S/.<?php echo e(number_format($itemArea2->consumo["SubTotal"], 3, '.', ',')); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3">TOTAL</td>
                            <td style="text-align: center;"><?php echo e($itemArea1->totalPorcMbts); ?>%</td>
                            <td class="qty"><?php echo e(number_format($itemArea1->totalCantMbts, 2, '.', ',')); ?> Mbps</td>
                            <td class="total">S/.<?php echo e(number_format($itemArea1->totalImporMbts, 3, '.', ',')); ?></td>
                        </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">TOTAL</td>
                <td style="text-align: center;"><?php echo e($itemArea->totalPorcMbts); ?>%</td>
                <td class="qty"><?php echo e(number_format($itemArea->totalCantMbts, 2, '.', ',')); ?> Mbps</td>
                <td class="total">S/.<?php echo e(number_format($itemArea->totalImporMbts, 3, '.', ',')); ?></td>
            </tr>
            </tfoot>
        </table>
        <?php endif; ?>
        <?php endforeach; ?>

    <div class="subtitulo">
        <div style="width: 95%; display: inline-block">
            <lu style="list-style-type: none;padding: 0;margin: 0;">
                <li style="float: left;width: 25%;"><a style="display: block;text-decoration: none;text-align: left;"><h1>TOTAL</h1></a></li>
            </lu>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>CANT. AREAS</th>
            <th>PORC. ACUMULADO</th>
            <th>VELOCIDAD</th>
            <th>IMPORTE</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="text-align: center;">-</td>
            <td style="text-align: center"><?php echo e(count($data->contrato->areas)); ?></td>
            <td style="text-align: center"><?php echo e(number_format($data->contrato->totalPorcMbts, 0, '.', ',')); ?>%</td>
            <td class="qty"><?php echo e(number_format(number_format($data->contrato->totalCantMbts, 2, '.', ','), 3, '.', ',')); ?> Mbps</td>
            <td class="total">S/.<?php echo e(number_format($data->contrato->totalImporMbts, 3, '.', ',')); ?></td>
        </tr>
        </tbody>
    </table>
    <?php elseif($data->tipo == 'S'): ?>
            <div class="subtitulo">
                <div style="text-align: left; width: 45%; display: inline-block">
                    <h1> AREAS</h1>
                </div>
                <div style="text-align: right; width: 50%;display: inline-block">
                    <h1 style="display: inline-block; text-align: right;"><small>Total Mbps: </small><?php echo e($data->contrato->Velocidad_Mb); ?></h1>
                </div>
            </div>
            <table style="margin-right: 1.5rem">
                <thead>
                <tr>
                    <th>#</th>
                    <th style="text-align: left;" width="50%">NOMBRE</th>
                    <th>CTAS CTR</th>
                    <th>% ACUMULADO</th>
                    <th>CANT. MBTS</th>
                    <th>SUB-TOTAL</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data->contrato->areas as $i=>$itemArea): ?>
                    <tr>
                        <th><?php echo e($i+1); ?></th>
                        <td class="service"><?php echo e($itemArea->Nom_Area); ?></td>
                        <td class="desc"><?php echo e($itemArea->CTAS_CTR); ?></td>
                        <td class="unit"><?php echo e(number_format($itemArea->consumo["Porc_Mbps"], 0, '.', ',')); ?></td>
                        <td class="qty"><?php echo e(number_format($itemArea->consumo["Mbps_Asignado"], 3, '.', ',')); ?></td>
                        <td class="total"><?php echo e(number_format($itemArea->consumo["SubTotal"], 3, '.', ',')); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3">TOTAL</td>
                    <td class="unit"><?php echo e($data->contrato->totalPorcMbts); ?></td>
                    <td class="qty"><?php echo e(number_format($data->contrato->totalCantMbts, 2, '.', ',')); ?></td>
                    <td class="total"><?php echo e(number_format($data->contrato->totalImporMbts, 3, '.', ',')); ?></td>
                </tr>
                <tr>
                    <td colspan="6" class="grand total"></td>
                </tr>
                </tfoot>
            </table>
    <?php endif; ?>
</div>
</body>
</html>