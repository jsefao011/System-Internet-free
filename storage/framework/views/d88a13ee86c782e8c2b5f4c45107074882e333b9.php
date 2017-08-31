
<?php $__env->startSection('title'); ?>
    <a class="navbar-brand" href="#"> Entidad </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra'); ?>
    <?php if($data->rolId == 1||$data->rolId == 2): ?>
        <button  class="btn bgm-teal btn-float waves-effect waves-button waves-float" id="btnAddCliente"><i class="md md-add"></i></button>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div id="list_Clientes">
            <?php foreach($data->Usuario->entidades as $itemEntidad): ?>
                <div class="col-md-12">
                    <div class="card card-stats">
                        <?php if($data->CO): ?>
                            <div class="card-header"  data-background-color="orange" style="height: 8.6rem; width: 8.6rem">
                                <a href="<?php echo e(url('/pagConsumoSolicitado/'.$itemEntidad->idEntidad)); ?>" class="btn btn-consuIzq" style="padding:0!important;margin:0!important;overflow: hidden; background: linear-gradient(60deg, #02336c, #23539c); border-radius: 3px 0px 0px 3px; width: 4.3rem; height: 8.6rem;position: absolute;top: 0rem;left: 0rem;" >
                                    <div style="position: absolute;top:1.5rem;left: 1.5rem;"><i class="md md-content-copy md-lg"></i></div>
                                </a>
                                <a href="<?php echo e(url('/pagConsumoReal/'.$itemEntidad->idEntidad)); ?>" class="btn btn-consuDerq" style="padding:0!important;margin:0!important;overflow:hidden; background: linear-gradient(60deg, #5294c3, #02336c); border-radius: 0px 3px 3px 0px; width: 4.3rem; height: 8.6rem;position: absolute;top: 0rem;right: 0rem;" >
                                    <div style="position: absolute;top:1.5rem;right: 1.5rem;"><i class="md md-content-copy md-lg"></i></div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="card-content">
                            <h3 class="card-title" style="float: left;"><?php echo e($itemEntidad->Nombre); ?></h3>
                            <ul class="actions">
                                <li>
                                    <p class="category">Estado Actual</p>
                                </li>
                                <li>
                                    <ul class="actions" style="position: relative; top:-5px; right: -15px;">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown" aria-expanded="false">
                                                <i class="md md-more-vert"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a><i  class="md md-edit btn-edit"></i>&nbsp; Editar</a>
                                                </li>
                                                <li>
                                                    <a class="btn-eliminar" data-id="<?php echo e($itemEntidad->idEntidad); ?>"><i class="md md-delete"></i>&nbsp;Anular</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <h3 class="title" style="margin: 0px;"><?php echo e($itemEntidad->TotalAreas); ?><small>&nbspAreas</small>/<?php echo e($itemEntidad->CantMbts); ?><small>&nbsp;Mbps</small></h3>
                        </div>
                        <div class="card-footer" style="margin-right: 0px;">
                            <div class="stats col-sm-7">
                                <ul style="list-style: none;">
                                    <li><div><i class="md md-person md-2x"></i><a href=""> Encargado: <small><?php echo e($itemEntidad->Dir_FACT.'.'); ?></small></a></div></li>
                                    <li><div><a href="">Direccion: <small><?php echo e($itemEntidad->Descripcion.'.'); ?></small> Ruc: <small><?php echo e($itemEntidad->C_RUC); ?></small></a><a href=""> Direccion: <small><?php echo e($itemEntidad->Descripcion.'.'); ?></small> Telefono: <small><?php echo e($itemEntidad->Cod_Servicio); ?></small></a></div></li>
                                </ul>
                            </div>
                            <div class="col-sm-5" style="text-align: right">
                                <?php if($data->PA): ?>
                                    <a class="btn btn-primary btn-round"  href="<?php echo e(url('/pagPuntosAccesos/'.$itemEntidad->idEntidad)); ?>" style="top: -7px;">Puntos de Acceso<div class="ripple-container"></div></a>
                                <?php endif; ?>
                                <?php if($data->CT): ?>
                                    <a class="btn btn-primary btn-round"  href="<?php echo e(url('/pagContrato/'.$itemEntidad->idEntidad)); ?>"  style="top: -7px;">Contrato<div class="ripple-container"></div></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <form class="col-md-12" style="display: none;" id="cardAddCliente"  method="POST" role="form" action="<?php echo e(url('/pagCliente/crearUsuario')); ?>">
            <div class="card modal-content" >
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="md md-add md-2x"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Registro Cliente</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input name="nombre" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">RUC</label>
                                    <input name="ruc" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Telefono</label>
                                    <input name="codservicio"  class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Encargado</label>
                                    <input name="factura" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Dirección</label>
                                    <input name="descripcion" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding-top:0;">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <button type="submit" class="btn btn-primary btn-simple" style="color:#FFFFff;">Guardar</button>
                    <button type="button" class="btn btn-danger btn-simple"  id="btnSalirAddCliente">Atras</button>
                </div>
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#btn-Search").hide();
            $("#btnAddCliente").on('click',function(){
                $('#list_Clientes').hide();
                $('#cardAddCliente').show();
                $('#btnAddCliente').hide();
            });

            $("#btnSalirAddCliente").on('click',function(){
                $('#list_Clientes').show();
                $('#cardAddCliente').hide();
                $('#btnAddCliente').show();
            });

            $('#list_Clientes').on('click',".btn-edit",function(){
                $('#list_Clientes').hide();
                $('#cardAddCliente').show();
            });

            $('.btn-eliminar').on('click',function(){

                var mint_entidadId = $(this).data('id');
                swal({
                    title:"¿Está seguro de eliminar?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#9c27b0",
                    confirmButtonText: "SI",
                    cancelButtonText: "NO"})
                        .then(function () {
                            f_Eliminar(mint_entidadId);
                        });

            });

            function f_Eliminar(vint_entidadId){

                $.ajax({
                    type: "POST",
                    url: '<?php echo e(url("/pagClientes/Eliminar")); ?>',
                    data: {idEntidad: vint_entidadId},
                    dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        //console.log('data', data);
                        //
                        if(data ==  true)
                        {
                            notificacion("<b>Monitoreo de Redes</b> - Exito al eliminar la Entidad!",'success');
                            location.reload();
                        }else{
                            notificacion("<b>Monitoreo de Redes</b> - Error al eliminar el Area!",'warning');
                        }

                    }
                });
            }

            function notificacion(vstr_mensaje,color){
                //type = ['','info','success','warning','danger','rose','primary'];

                $.notify({
                    icon: " md md-notifications",
                    message: vstr_mensaje,

                },{
                    type: color,
                    timer: 3000,
                    placement: {
                        //from: 'top',
                        align: 'right'
                    }
                });
            }

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>