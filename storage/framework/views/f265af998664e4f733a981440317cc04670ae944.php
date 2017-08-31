<?php $__env->startSection('title'); ?>
    <a class="navbar-brand" href="#"> Clientes </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="md md-content-copy md-lg"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-title" style="float: left;">Universidad Peruna Union</h3>
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
                                            <a href=""><i class="md md-edit"></i>&nbsp; Editar</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="md md-delete"></i>&nbsp;Anular</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <h3 class="title" style="margin: 0px;">25<small>&nbspAreas</small>/500<small>&nbsp;Mbps</small></h3>
                </div>
                <div class="card-footer" style="margin-right: 0px;">
                    <div class="stats col-sm-6">
                        <ul style="list-style: none;">
                            <li><div><i class="md md-person md-2x"></i> <a href="">Responsble: <small>Jose Arias Orezano.</small> Numero: <small>987123456</small></a></div></li>
                            <li><div><i class="md md-warning text-danger md-2x"></i> <a href="">Un contrato expira pronto&nbsp;<small>(10 dias...)</small></a></div></li>
                        </ul>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <button class="btn btn-primary btn-round" style="top: -7px;">Areas<div class="ripple-container"></div></button>
                        <button class="btn btn-primary btn-round" style="top: -7px;">Contrato<div class="ripple-container"></div></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="md md-content-copy md-lg"></i>
                </div>
                <div class="card-content">
                    <h3 class="card-title" style="float: left;">ATM Redes</h3>
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
                                            <a href=""><i class="md md-edit"></i>&nbsp; Editar</a>
                                        </li>
                                        <li>
                                            <a href=""><i class="md md-delete"></i>&nbsp;Anular</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <h3 class="title" style="margin: 0px;">3<small>&nbspAreas</small>/20<small>&nbsp;Mbps</small></h3>
                </div>
                <div class="card-footer" style="margin-right: 0px;">
                    <div class="stats col-sm-6">
                        <ul style="list-style: none;">
                            <li><div><i class="md md-person md-2x"></i> <a href="">Responsble: <small>Jose Arias Orezano.</small> Numero: <small>987123456</small></a></div></li>
                        </ul>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <button class="btn btn-primary btn-round" style="top: -7px;">Areas<div class="ripple-container"></div></button>
                        <button class="btn btn-primary btn-round" style="top: -7px;">Contrato<div class="ripple-container"></div></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-pricing card-raised">
                <div class="content">
                    <h6 class="category">Small Company</h6>
                    <div class="icon icon-rose">
                        <i class="md md-home md-lg"></i>
                    </div>
                    <h3 class="card-title">$29</h3>
                    <p class="card-description">
                        This is good if your company size is between 2 and 10 Persons.
                    </p>
                    <a href="#pablo" class="btn btn-rose btn-round">Choose Plan</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function(){
        $("#btn-Search").show();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>