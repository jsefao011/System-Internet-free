<?php $__env->startSection('title'); ?>
    <a class="navbar-brand" href="#"> Provedor </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12" id="cardPrincipal">
            <div class="card">
                <div id="btnAddProveedor" class="btn card-header card-header-icon" data-background-color="rose">
                    <i class="md md-account-balance md-2x"></i>
                </div>
                <br>
                <br>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table" id="tblProveedor">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>Ruc</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th class="text-center">Url</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Claro</td>
                                <td>1242535525</td>
                                <td>cerca a tu casa</td>
                                <td>#10 124 121</td>
                                <td class="text-right"><button class="btn btn-simple btn-behance"><i class="fa fa-link fa-adjust"></i>&nbsp;Link<div class="ripple-container"></div></button></td>
                                <td class="td-actions text-right">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-round btn-edit" data-value="15" data-original-title="" title="">
                                        <i class="md md-edit md-lg"></i>
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-original-title="" title="">
                                        <i class="md md-delete md-lg"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="display: none;" id="cardAddProveedor">
            <div class="card modal-content" >
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="md md-add md-2x"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Registro Proveedor</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <label class="control-label">Pagina Web</label>
                                    <input type="url" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ruc</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Telefono</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Dirección</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding-top:0;">
                    <button type="button" class="btn btn-primary btn-simple">Guardar</button>
                    <button type="button" class="btn btn-danger btn-simple"  id="btnSalirAddProveedor">Atras</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){

            $("#btnAddProveedor").on('mouseover',function(){
                var mele_icono = $(this).find('i');
                mele_icono.removeClass('md-account-balance');
                mele_icono.addClass('md-add');
            });
            $("#btnAddProveedor").on('mouseout',function(){
                var mele_icono = $(this).find('i');
                mele_icono.addClass('md-account-balance');
                mele_icono.removeClass('md-add');
            });

            $("#btnAddProveedor").on('click',function(){
                $('#cardPrincipal').hide();
                $('#cardAddProveedor').show();
            });

            $("#btnSalirAddProveedor").on('click',function(){
                $('#cardPrincipal').show();
                $('#cardAddProveedor').hide();
            });

            $('#tblProveedor').on('click',".btn-edit",function(){
                var mintProveedor = $(this).data('value');
                console.log('Idproveedor',mintProveedor);
                $('#cardPrincipal').hide();
                $('#cardAddProveedor').show();
            });



        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>