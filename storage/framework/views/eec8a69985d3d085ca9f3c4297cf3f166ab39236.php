<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Example jse</title>
    <link rel="stylesheet" href="reporte/consumo/style.css" media="all" />

<body>
<header class="clearfix">
    <!--<div id="logo">
        <img src="reporte/consumo/logo.png">
    </div>-->
    <!--style="page-break-before:always;"-->
    <div class="titulo">
        <h1><?php echo e($data->entidad->Nombre); ?></h1>
        <div style="font-weight: bold;">COBRANZA POR EL SERVICIO DE ACCESO DEDICADO A INTERNET</div>
        <div style="font-weight: bold;">PERIODO <?php echo e($data->contrato->Fech_Emision); ?> AL <?php echo e($data->contrato->Fech_Vencimiento); ?></div>
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
</header>
<main class="clearfix">
    <table style="margin-right: 1.5rem">
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
                <td class="unit"><?php echo e($itemDet->Velocidad); ?></td>
                <td class="qty"><?php echo e($itemDet->Oficina); ?></td>
                <td class="total"><?php echo e($itemDet->Importe); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">TOTAL</td>
                <td class="total"><?php echo e($data->contrato->Velocidad_Mb); ?></td>
                <td colspan="1">SUBTOTAL</td>
                <td class="total"><?php echo e(number_format((double)$data->contrato->Importe/1.18,2, '.', ',')); ?></td>
            </tr>
            <tr>
                <td colspan="4">IGV</td>
                <td class="total"><?php echo e(number_format((double)$data->contrato->Importe - (double)$data->contrato->Importe/1.18, 2, '.', ',')); ?></td>
            </tr>
            <tr>
                <td colspan="4" class="grand total">TOTAL</td>
                <td class="grand total"><?php echo e(number_format($data->contrato->Importe, 2, '.', ',')); ?></td>
            </tr>
        </tfoot>
    </table>
    <div class="subtitulo">
        <div style="text-align: left; width: 45%; display: inline-block">
            <h1> AREAS</h1>
        </div>
        <div style="text-align: left; width: 50%;display: inline-block">
            <h1 style="display: inline-block; text-align: right;">Total Mbts: <?php echo e($data->contrato->Velocidad_Mb); ?></h1>
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
</main>
</body>
</html>