


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
                            <h6 class="category" style="color: #3c4858;">Areas sin Asignar</h6>
                            <hr>
                            <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple" style="height: auto;">
                                <?php foreach($vobj_local->AreasSinAsig as $itemContrato): ?>
                                    <option value="<?php echo e($itemContrato->idAREA); ?>"><?php echo e($itemContrato->Nom_Area); ?></option>
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
            $('input[name="_token"]').val($('meta[name="csrf-token"]').attr('content'));
            $('#multiselect').multiselect();
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>