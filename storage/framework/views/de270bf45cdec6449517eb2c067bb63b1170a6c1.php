<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <form class="card modal-content" method="POST" role="form" action="<?php echo e(url('/pagContrato/asignarAreaContrato/Guardar')); ?>">
                <div class="btn card-header card-header-icon bgm-indigo" data-background-color="" id="btnAsignarArea">
                    <i class="md md-assignment md-2x"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Areas del Contrato</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <h6 style="color: #3c4858;display: inline-block;font-size: 11px;">Subareas sin Asignar</h6>
                                <div class="col-xs-3" style="float:right; top: -18px;margin-right: 0px;">
                                    <select class="selectpicker" data-style="select-with-transition" multiple title="Nivel">
                                        <option value="1">Nivel 1</option>
                                        <option value="2">Nivel 2</option>
                                        <option value="3">Nivel 3</option>
                                    </select>
                                </div>
                                <div class="col-xs-5"  style="float:right; position: absolute;right: 130px;top: -18px;">
                                    <?php if(count($vobj_local->Areas) > 0): ?>
                                    <select id="sel_lstSubArea" class="selectpicker" data-live-search="true" data-style="select-with-transition" title="<?php echo e($vobj_local->Areas[0]->Nom_Area); ?>"  value="<?php echo e($vobj_local->Areas[0]->idAREA); ?>">
                                        <?php foreach($vobj_local->Areas as $itemArea): ?>
                                            <option value="<?php echo e($itemArea->idAREA); ?>"><?php echo e($itemArea->Nom_Area); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr>
                            <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple" style="height: auto;">
                                <?php foreach($vobj_local->AreasSinAsig as $itemContrato): ?>
                                    <option value="<?php echo e($itemContrato->idAREA); ?>">&nbsp;&nbsp;<?php echo e($itemContrato->Nom_Area); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-sm-1">
                            <br>
                            <br>
                            <button type="button" id="multiselect_rightAll" class="btn btn-primary btn-round btn-fab btn-fab-mini"><i class="md md- md-fast-forward" style="vertical-align: -11%;"></i></button>
                            <button type="button" id="multiselect_rightSelected" class="btn btn-primary btn-round btn-fab btn-fab-mini"><i class="md md-chevron-right" style="vertical-align: -11%;"></i></button>
                            <button type="button" id="multiselect_leftSelected" class="btn btn-primary btn-round btn-fab btn-fab-mini"><i class="md md-chevron-left" style="vertical-align: -11%;"></i></button>
                            <button type="button" id="multiselect_leftAll" class="btn btn-primary btn-round btn-fab btn-fab-mini"><i class="md  md-fast-rewind" style="vertical-align: -11%;"></i></button>
                        </div>

                        <div class="col-sm-5">
                            <h6 class="category" style="color: #3c4858;">Areas Asignadas</h6>
                            <hr>
                            <select name="Asignar[]" id="multiselect_to" class="form-control" size="8" multiple="multiple" style="height: auto;">
                                <?php foreach($vobj_local->ContratoAreas->areas as $itemArea): ?>
                                    <option value="<?php echo e($itemArea->idAREA); ?>"><?php echo e($itemArea->Nom_Area); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding-top: 0;">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><!-- Esta etique se debe poner en todos los formulario para la validacion -->
                    <button type="submit" class="btn btn-primary btn-simple" style="color: #FFFFff;">Guardar</button>
                    <a type="button" class="btn btn-danger btn-simple" data-dismiss="modal" href="<?php echo e(url('/pagContrato/'.$vobj_local->v)); ?>">Atras</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="../../assets/js/multiselect.js"></script>
    <script>
        $(document).ready(function(){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $('#sel_lstSubArea').on('change',function(){
              var mint_areaId = $(this).val();
              f_listarSubArea(mint_areaId,[1,2,3])
          });

            function f_listarSubArea(vint_areaId, varr_niveles){
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(url("/pagPuntosAccesos/fls_listarSubArea")); ?>',
                    data: {AreaId: vint_areaId, Niveles: varr_niveles},
                    dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        console.log('data',data);
                        $('#multiselect').html('');
                        $.each(data,function (i,r) {
                            $('#multiselect').append('<option value="' + r.idAREA + '">' + r.Nom_Area + '</option>')
                        });
                        $('#multiselect').multiselect('refresh');
                    }
                });
            }

            $('input[name="_token"]').val($('meta[name="csrf-token"]').attr('content'));
            $('#multiselect').multiselect();

        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>