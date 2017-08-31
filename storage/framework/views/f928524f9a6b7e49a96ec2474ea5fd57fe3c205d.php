<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <a class="navbar-brand"  style="margin-bottom: 20px;">Puntos de Acceso</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12">
            <ul class="actions" style="float: right;"><li><a class="bgm-purple" style="border-radius: 50%;"></a></li><li><h5 class="card-title"><small>Cantidad </small>Mbts </h5></li><li><a class="bgm-pink" style="margin-left: 10px; border-radius: 50%;"></a></li><li><h5 class="card-title"><small>Cantidad </small>Areas</h5></li></ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-jse" id="cardSinAsignar">
                <div class="card-header card-purple bgm-pink">
                    <div class="row">
                        <div class="col-xs-7"><h2>Áreas sin Asignar a Contrato</h2></div>
                        <div class="col-xs-5">
                            <div class="btn btn-round btn-fab bgm-white" style="position: absolute;top: -17px;min-width: 0;width: 55px;height: 55px;right: 130px;">
                                <button id="Count_AreasSinAsing" class="btn btn-round btn-fab bgm-pink" style="height: 45px;width: 45px;min-width: 0;top: 5px;"><?php echo e((count($data->AreasSinAsig))); ?></button>
                            </div>
                            <button class="btn btn-round btn-fab bgm-pink btn-CrearArea" style="position: absolute; height: 45px;width: 45px;min-width: 0;top: 5px;top: -15px;right: 70px;"><i class="md md-add md-lg"></i></button>
                            <button class="btn btn-round btn-fab bgm-pink btn-colapcin" style="position: absolute; height: 45px;width: 45px;min-width: 0;top: 5px;top: -15px;right: 15px;"><i class="ico-colapcin md md-keyboard-arrow-up md-lg"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body card-padding panel-group colapcin card-colapcin">
                    <div class="table-responsive">
                        <table class="table table-hover table-jse">
                            <thead class="bgm-indigo">
                            <th width="2%">#</th>
                            <th width="45%">Area</th>
                            <th width="43%">Interface</th>
                            <th width="5%"></th>
                            <th width="5%"></td>
                            </thead>
                            <tbody id="list_Area">
                            <?php foreach($data->AreasSinAsig  as $i => $itemArea): ?>
                                <tr data-id="<?php echo e($itemArea->idAREA); ?>">
                                 <?php if(count($itemArea->area)> 0): ?>
                                    <td class="card-link btn-colapcin no-seleccionable"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                 <?php else: ?>
                                    <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                 <?php endif; ?>
                                    <td><?php echo e($itemArea->Nom_Area); ?></td>
                                    <td><?php echo e($itemArea->Interface); ?></td>
                                    <td class="card-link"><i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i></td>
                                    <td class="card-link"><i class="md md-delete md-lg"></i></td>
                                </tr>
                                <?php if(count($itemArea->area)> 0): ?>
                                    <tr class="colapcin table-colapcin panel">
                                        <td></td>
                                        <td colspan="6">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-jse">
                                                    <thead class="bgm-pink">
                                                    <th width="5%">#</th>
                                                    <th width="85%"><?php echo e($itemArea->Nom_Area); ?></th>
                                                    <th width="5%"></th>
                                                    <th width="5%"></th>
                                                    </thead>
                                                    <tbody>
                                    <?php foreach($itemArea->area as $i => $itemArea): ?>
                                                        <tr data-id="<?php echo e($itemArea->idAREA); ?>">
                                        <?php if(count($itemArea->area)> 0): ?>
                                                            <td class="card-link btn-colapcin no-seleccionable"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                        <?php else: ?>
                                                            <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                        <?php endif; ?>
                                                            <td><?php echo e($itemArea->Nom_Area); ?></td>

                                                            <td class="card-link"><i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i></td>
                                                            <td class="card-link"><i class="md md-delete md-lg"></i></td>
                                                        </tr>
                                        <?php if(count($itemArea->area)> 0): ?>
                                                            <tr class="colapcin table-colapcin panel">
                                                                <td></td>
                                                                <td colspan="6">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-hover table-jse">
                                                                            <thead class="bgm-orange">
                                                                            <th width="5%">#</th>
                                                                            <th width="85%"><?php echo e($itemArea->Nom_Area); ?></th>
                                                                            <th width="5%"></th>
                                                                            <th width="5%"></th>
                                                                            </thead>
                                                                            <tbody>
                                             <?php foreach($itemArea->area as $i => $itemArea): ?>
                                                                                <tr data-id="<?php echo e($itemArea->idAREA); ?>">
                                                                                    <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                                                                    <td><?php echo e($itemArea->Nom_Area); ?></td>
                                                                                    <td class="card-link"><!--<i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i>--></td>
                                                                                    <td class="card-link"><i class="md md-delete md-lg"></i></td>
                                                                                </tr>
                                             <?php endforeach; ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <!--<tr>
                                <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;">2</i></td>
                                <td>Área Finanzas</td>
                                <td>12-134-12-8</td>
                                <td class="card-link"><i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i></td>
                                <td class="card-link"><i class="md md-delete md-lg"></i></td>
                            </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h5 class="card-title">Asignar Ancho de Banda</h5>
            <h5 class="card-title"><small>Lista de </small>Contratos</h5>
        </div>
        <div id="lst_Contratos">
           <?php foreach($data->Contratos as $itemContrato): ?>
                <div class="col-sm-12">
                    <div class="card-jse card-contrato">
                        <div class="card-header card-purple bgm-purple">
                            <div class="row">
                                <div class="col-xs-7"><h2><?php echo e($itemContrato->Descripcion); ?></h2></div>
                                <div class="col-xs-5">
                                    <div class="btn btn-round btn-fab bgm-white" style="position: absolute;top: -17px;min-width: 0;width: 55px;height: 55px;right: 130px;">
                                        <button class="btn btn-round btn-fab bgm-pink" style="height: 45px;width: 45px;min-width: 0;top: 5px;"><?php echo e(count($itemContrato->areas)); ?></button>
                                    </div>
                                    <div class="btn btn-round btn-fab bgm-white" style="position: absolute;top: -17px;min-width: 0;width: 55px;height: 55px;right: 200px;">
                                        <button class="btn btn-round btn-fab bgm-purple" style="height: 45px;width: 45px;min-width: 0;top: 5px;"><?php echo e($itemContrato->Velocidad_Mb); ?></button>
                                    </div>
                                    <button class="btn btn-round btn-fab bgm-purple" style="position: absolute; height: 45px;width: 45px;min-width: 0;top: 5px;top: -15px;right: 70px;"><i class="md md-done-all md-lg btn-validar"></i></button>
                                    <button class="btn btn-round btn-fab bgm-purple btn-colapcin" style="position: absolute; height: 45px;width: 45px;min-width: 0;top: 5px;top: -15px;right: 15px;"><i class="ico-colapcin md md-keyboard-arrow-up md-lg"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body card-padding panel-group colapcin card-colapcin">
                            <div class="table-responsive">
                                <table data-id="<?php echo e($itemContrato->idCONTRATO); ?>" data-importe="<?php echo e($itemContrato->Importe); ?>" data-mbts="<?php echo e($itemContrato->Velocidad_Mb); ?>" data-nivel = "1" class="table table-hover table-jse">
                                    <thead class="bgm-indigo">
                                    <th width="5%">#</th>
                                    <th width="15%">Area</th>
                                    <th width="10%">Interface</th>
                                    <th width="10%">Consumo</th>
                                    <th width="20%">% Mbts Asignados</th>
                                    <th width="18%" class="text-center">Mbts Asignados</th>
                                    <th width="15%">Sub Total</th>
                                    <th width="2%"></th>
                                    <th width="5%"></td>
                                    </thead>
                                    <tbody>
                                    <?php foreach($itemContrato->areas  as $i => $itemArea): ?>
                                             <tr data-id="<?php echo e($itemArea->idAREA); ?>" data-nivel="1">
                                        <?php if(count($itemArea->area)> 0): ?>
                                                <td class="card-link btn-colapcin no-seleccionable"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                        <?php else: ?>
                                                <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                                 <?php endif; ?>
                                                <td><?php echo e($itemArea->Nom_Area); ?></td>
                                                <td><?php echo e($itemArea->Interface); ?></td>
                                                <td class="td-total" style="text-align: center;"><?php echo e($itemArea->ConsumoReal); ?></td>
                                                <td class="porc_mbts" style="padding: 0;">
                                                    <div class="form-group label-floating" style="padding: 0;margin: 0;">
                                                        <input value="<?php echo e($itemArea->consumo["Porc_Mbps"]); ?>" type="number" min="0" max="100" step="0.01" class="form-control" style="text-align: center; margin-bottom: 5px;">
                                                    </div>
                                                </td>
                                                <td class="text-center cant_mbts"><?php echo e($itemArea->consumo["Mbps_Asignado"]); ?></td>
                                                <td class="subtotal"><?php echo e($itemArea->consumo["SubTotal"]); ?></td>
                                                <td class="card-link"><!--<i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i>--></td>
                                                <td class="card-link"><i class="md md-delete md-lg"></i></td>
                                             </tr>
                                        <?php if(count($itemArea->area)> 0): ?>
                                             <tr class="colapcin table-colapcin panel" data-codpadre="<?php echo e($itemArea->idAREA); ?>">
                                                 <td></td>
                                                 <td colspan="7">
                                                     <div class="table-responsive">
                                                         <table class="table table-hover table-jse" data-importe="<?php echo e($itemArea->consumo["SubTotal"]); ?>" data-mbts="<?php echo e($itemArea->consumo["Mbps_Asignado"]); ?>" data-nivel = "2">
                                                             <thead class="bgm-pink">
                                                             <th width="5%">#</th>
                                                             <th width="25%"><?php echo e($itemArea->Nom_Area); ?></th>
                                                             <th width="20%">% Mbts Asignados</th>
                                                             <th width="23%" class="text-center">Mbts Asignados</th>
                                                             <th width="20%">Sub Total</th>
                                                             <th width="2%"></th>
                                                             <th width="5%"></td>
                                                             </thead>
                                                             <tbody>
                                            <?php foreach($itemArea->area as $i => $itemArea): ?>
                                                                     <tr data-id="<?php echo e($itemArea->idAREA); ?>" data-nivel="2">
                                                <?php if(count($itemArea->area)> 0): ?>
                                                                             <td class="card-link btn-colapcin no-seleccionable"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                                <?php else: ?>
                                                                             <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                                <?php endif; ?>
                                                                         <td><?php echo e($itemArea->Nom_Area); ?></td>
                                                                         <td class="porc_mbts" style="padding: 0;">
                                                                            <div class="form-group label-floating" style="padding: 0;margin: 0;">
                                                                                <input value="<?php echo e($itemArea->consumo["Porc_Mbps"]); ?>" type="number" step="0.01" min="0" max="100" class="form-control" style="text-align: center; margin-bottom: 5px;">
                                                                            </div>
                                                                         </td>
                                                                         <td class="text-center cant_mbts"><?php echo e($itemArea->consumo["Mbps_Asignado"]); ?></td>
                                                                         <td class="subtotal"><?php echo e($itemArea->consumo["SubTotal"]); ?></td>
                                                                         <td class="card-link"><!--<i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i>--></td>
                                                                         <td class="card-link"><i class="md md-delete md-lg"></i></td>
                                                                     </tr>
                                                <?php if(count($itemArea->area)> 0): ?>
                                                                     <tr class="colapcin table-colapcin panel" data-codpadre="<?php echo e($itemArea->idAREA); ?>">
                                                                         <td></td>
                                                                         <td colspan="6">
                                                                             <div class="table-responsive">
                                                                                 <table class="table table-hover table-jse"  data-importe="<?php echo e($itemArea->consumo["SubTotal"]); ?>" data-mbts="<?php echo e($itemArea->consumo["Mbps_Asignado"]); ?>" data-nivel = "3">
                                                                                     <thead class="bgm-orange">
                                                                                     <th width="5%">#</th>
                                                                                     <th width="25%"><?php echo e($itemArea->Nom_Area); ?></th>
                                                                                     <th width="20%">% Mbts Asignados</th>
                                                                                     <th width="23%" class="text-center">Mbts Asignados</th>
                                                                                     <th width="20%">Sub Total</th>
                                                                                     <th width="2%"></th>
                                                                                     <th width="5%"></td>
                                                                                     </thead>
                                                                                     <tbody>
                                                    <?php foreach($itemArea->area as $i => $itemArea): ?>
                                                                                        <tr data-id="<?php echo e($itemArea->idAREA); ?>" data-nivel="3">
                                                                                            <td><i class="md md-lg" style="font-size: 2em;vertical-align: -50%;"><?php echo e($i+1); ?></i></td>
                                                                                            <td><?php echo e($itemArea->Nom_Area); ?></td>
                                                                                            <td class="porc_mbts" style="padding: 0;">
                                                                                                <div class="form-group label-floating" style="padding: 0;margin: 0;">
                                                                                                    <input value="<?php echo e($itemArea->consumo["Porc_Mbps"]); ?>" type="number" min="0" max="100" step="0.01" class="form-control" style="text-align: center; margin-bottom: 5px;">
                                                                                                </div>
                                                                                            </td>
                                                                                            <td class="text-center cant_mbts"><?php echo e($itemArea->consumo["Mbps_Asignado"]); ?></td>
                                                                                            <td class="subtotal"><?php echo e($itemArea->consumo["SubTotal"]); ?></td>
                                                                                            <td class="card-link"><!--<i class="md md-add md-lg btn-ModalSubArea" style="font-size: 2em;vertical-align: -50%;"></i>--></td>
                                                                                            <td class="card-link"><i class="md md-delete md-lg"></i></td>
                                                                                          </tr>
                                                    <?php endforeach; ?>
                                                                                       </tbody>
                                                                                         <tfoot class="" >
                                                                                         <tr >
                                                                                             <td></td>
                                                                                             <td class="td-total text-center ">Total</td>
                                                                                             <td class="text-center totalPorc_Mbts"><?php echo e($itemContrato->totalPorcMbts); ?></td>
                                                                                             <td class="text-center totalCant_Mbts"><?php echo e($itemContrato->totalCantMbts); ?></td>
                                                                                             <td class="text-left totalimporte_Mbts"><?php echo e($itemContrato->totalImporMbts); ?></td>
                                                                                             <td colspan="2"></td>
                                                                                         </tr>
                                                                                         </tfoot>
                                                                                     </table>
                                                                                 </div>
                                                                             </td>
                                                                         </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                                                 </tbody>
                                                                 <tfoot class="" >
                                                                 <tr >
                                                                     <td></td>
                                                                     <td class="td-total text-center">Total</td>
                                                                     <td class="text-center totalPorc_Mbts"><?php echo e($itemContrato->totalPorcMbts); ?></td>
                                                                     <td class="text-center totalCant_Mbts"><?php echo e($itemContrato->totalCantMbts); ?></td>
                                                                     <td class="text-left totalimporte_Mbts"><?php echo e($itemContrato->totalImporMbts); ?></td>
                                                                     <td colspan="2"></td>
                                                                 </tr>
                                                                 </tfoot>
                                                             </table>
                                                         </div>
                                                     </td>
                                                 </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="td-total text-center">Total</td>
                                        <td class="text-center totalPorc_Mbts"><?php echo e($itemContrato->totalPorcMbts); ?></td>
                                        <td class="text-center totalCant_Mbts"><?php echo e($itemContrato->totalCantMbts); ?></td>
                                        <td class="text-left totalimporte_Mbts"><?php echo e($itemContrato->totalImporMbts); ?></td>
                                        <td colspan="2"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="modal fade" id="mdlCrearAreas" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="md md-clear"></i>
                    </button>
                    <h4 class="modal-title">Agregar Areas</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre</label>
                                <input id="tex_nombre" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Interface</label>
                                <input id="text_interface" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">CTR</label>
                                <input id="text_CTR" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-addArea" type="button" class="btn btn-primary btn-simple" data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Atras</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mdlCrearSubArea" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="md md-clear"></i>
                    </button>
                    <h4 class="modal-title">Agregar Subareas</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre</label>
                                <input id="tex_nombreSubArea" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">CTR</label>
                                <input id="text_CTRSubArea" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-addSubArea" type="button" class="btn btn-primary btn-simple" data-dismiss="modal">Guardar</button>
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Atras</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!--<script src="../../funciones/puntosAcceso.js"></script>-->
    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#btn-addArea").on('click',function(){
                var mstr_nombreArea = $('#tex_nombre').val();
                var mstr_interface = $('#text_interface').val();
                var mstr_ctr = $('#text_CTR').val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(url("/pagPuntosAccesos/CrearArea")); ?>',
                    data: {nombre: mstr_nombreArea, interface: mstr_interface, ctr: mstr_ctr},
                    dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        console.log('data', data);
                        location.reload();
                    }
                });
            });

            $('.btn-CrearArea').on('click',function(){
                $('#mdlCrearAreas').modal('show');
            });

            $("#btn-addSubArea").on('click',function(){
                var mint_AreaId = $('#mdlCrearSubArea').data('id');
                var mstr_nombreArea = $('#tex_nombreSubArea').val();
                var mstr_ctr = $('#text_CTRSubArea').val();
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(url("/pagPuntosAccesos/CrearArea")); ?>',
                    data: {nombre: mstr_nombreArea, AreaId: mint_AreaId, ctr: mstr_ctr},
                    dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        console.log('data', data);
                        location.reload();
                    }
                });
            });

            $('.btn-ModalSubArea').on('click',function(){
                var mobj_modal = $('#mdlCrearSubArea');
                var mint_AreaId = $(this).parent().parent().data('id');
                mobj_modal.data('id',mint_AreaId)
                mobj_modal.modal('show');
            });



            $('.btn-colapcin').on('click',function(){
                var mele_btn = $(this).find('.ico-colapcin');
                var mele_Card = $(this).parents('.card-header').siblings('div .colapcin');
                var mstr_Card = 'card';
                if(!mele_Card.hasClass('colapcin')){
                    //mele_Card = $(this).parent().siblings('.colapcin');
                    mint_posion = $(this).parent().index();
                    mele_Card = $(this).parent().parent().children('tr').eq(mint_posion+1);
                    mstr_Card = 'table';
                }

                if(mele_btn.hasClass('md-keyboard-arrow-up')){
                    mele_Card.removeClass(mstr_Card+'-colapcin');
                    mele_Card.addClass(mstr_Card+'-colapcin-off');
                    mele_btn.removeClass('md-keyboard-arrow-up');
                    mele_btn.addClass('md-keyboard-arrow-down');
                }else{
                    mele_Card.addClass(mstr_Card+'-colapcin');
                    mele_Card.removeClass(mstr_Card+'-colapcin-off');
                    mele_btn.addClass('md-keyboard-arrow-up');
                    mele_btn.removeClass('md-keyboard-arrow-down');
                }

            });

            $('.btn-validar').on('click',function(){

                console.log(f_validar(this));
                if(f_validar(this)==true){
                    $.bootstrapGrowl("Error! areas sin validar", {
                        type: 'danger',
                        align: 'botton',
                    });
                    return false;
                }

                $.bootstrapGrowl("Exito al validar Contrato", {
                    type: 'success',
                    align: 'botton',
                });

                var mint_ContratoId = $(this).parent().data('id');
                var mlst_lstConsumo = new Array();
                var mobj_card = $(this).parents('.card-jse');
                mobj_card.find('input[type="number"]').each(function(){
                    var mint_AreaId = $(this).parents('tr').data('id');
                    var mflo_Porc_Comsumo =$(this).val();
                    var mflo_Cant_Comsumo = $(this).parents('tr').find('.cant_mbts').html();
                    var mflo_SubTotal_Comsumo = $(this).parents('tr').find('.subtotal').html();
                    var mint_CodPadre = $(this).parents('tr').parents('tr').data('codpadre');
                    var mobj_Consumo = new Object();
                    obj_Consumo =
                    {
                        "idArea": mint_AreaId,
                        "Mbps_Asignado": mflo_Cant_Comsumo,
                        "Porc_Mbps": mflo_Porc_Comsumo,
                        "SubTotal": mflo_SubTotal_Comsumo,
                    }
                    mlst_lstConsumo.push(obj_Consumo);
                });



                //console.log(JSON.stringify(mlst_lstConsumo));
                $.ajax({
                    type: "POST",
                    //url: '/pagPuntosAccesos/CrearConsumo',
                    url: "<?php echo e(url('/pagPuntosAccesos/CrearConsumo')); ?>",
                    data: {lstConsumo: mlst_lstConsumo},
                    dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        console.log('data', data);
                        location.reload();
                    }
                });


            });

            $('#lst_Contratos').on('click','input[type="number"]',function(){
                listar(this);
            });

            $('#lst_Contratos').on('keyup','input[type="number"]',function(){
                listar(this);
            });


            function listar(m_conten){
                $(m_conten).parents('.card-contrato').find('table').each(function(){
                    var mint_globalNivel = $(this).data('nivel');
                    var mint_globalImporte = $(this).data('importe');
                    var mint_globalCantMbts = $(this).data('mbts');

                    var totalporc_Mbts = 0;
                    var totalcant_Mbts = 0;
                    var totalimporte_Mbts = 0;


                    $(this).find('tr[data-nivel="'+mint_globalNivel+'"]').each(function(){

                        var mint_AreaId = $(this).data('id');
                        var mstr_porcMbts = $(this).children('.porc_mbts').find('input').eq(0).val();
                        if(mstr_porcMbts == ""){
                            mstr_porcMbts = 0;
                        }

                        var mint_cantMbts = parseFloat(mint_globalCantMbts *  mstr_porcMbts/100).toFixed(2);
                        var mint_importeMbts = parseFloat(mstr_porcMbts/100 * mint_globalImporte).toFixed(3);

                        $(this).children('.cant_mbts').text(mint_cantMbts);
                        $(this).children('.subtotal').text(mint_importeMbts);

                        var mobj_tablaHija = $(this).siblings('tr[data-codpadre="'+mint_AreaId+'"]').find('table[data-nivel="' + parseInt(mint_globalNivel + 1) + '"]')
                        mobj_tablaHija.data('importe',mint_importeMbts);
                        mobj_tablaHija.data('mbts',mint_cantMbts);


                        totalporc_Mbts += parseFloat(mstr_porcMbts);
                        totalcant_Mbts += parseFloat($(this).children('.cant_mbts').text());
                        totalimporte_Mbts += parseFloat($(this).children('.subtotal').text());

                    });

                    totalporc_Mbts =roundtwo(totalporc_Mbts);
                    totalcant_Mbts = roundtwo(totalcant_Mbts);
                    totalimporte_Mbts = roundtwo(totalimporte_Mbts);

                    //$(this).children('tfoot').remove();

                    $(this).children('tfoot').find('.totalPorc_Mbts').text(totalporc_Mbts);
                    $(this).children('tfoot').find('.totalCant_Mbts').text(totalcant_Mbts);
                    $(this).children('tfoot').find('.totalimporte_Mbts').text(totalimporte_Mbts);



                    if(totalporc_Mbts>100){
                        $(m_conten).val(0);
                        listar(m_conten);
                    }


                });

            }


            function roundtwo(num){
                return +(Math.round(num +"e+2") +"e-2");
            }

            function f_validar(m_conten){
                var count = 0;
                $(m_conten).parents('.card-contrato').find('table').each(function(){
                    var mint_globalNivel = $(this).data('nivel');
                    var totalporc_Mbts = 0;
                    $(this).find('tr[data-nivel="'+mint_globalNivel+'"]').each(function(){

                        var mstr_porcMbts = $(this).children('.porc_mbts').find('input').eq(0).val();
                        if(mstr_porcMbts == ""){
                            mstr_porcMbts = 0;
                        }
                        totalporc_Mbts += parseFloat(mstr_porcMbts);

                    });
                    if(totalporc_Mbts != 100){
                        count ++;
                    }
                });

              if(count == 0 ){
                  return false;
              }
               return true;
            }

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>