<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" type="text/css" href="../../assets/css/fileinput.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 style="float: left;" class="card-title">Reporte Solicitado</h5>
                            <button id="btnGenerar" style="float: right;" class="btn btn-primary btn-round">Genera Reporte</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <label class="form-group"><input type="search" class="form-control input-sm" placeholder="Search records" aria-controls="datatables"></label>
                        <table class="table table-jse" id="tblConsultaSolicitado">
                            <thead class="bgm-orange ">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Fecha Registro</th>
                                <th>Usuario</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr>
                                <td class="text-center">1</td>
                                <td>01/05/2017</td>
                                <td>Jose Arias</td>
                                <td class="text-right card-link btn-colapcin"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"></i></td>
                            </tr>
                            <tr class="colapcin table-colapcin panel">
                                <td></td>
                                <td colspan="3">
                                    <div class="table-responsive">
                                        <table class="table table-jse">
                                            <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>ISP-Telefónica-Feb-2017</td>
                                                <td width="30%" class="text-right">
                                                    <ul class="actions">
                                                        <li>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="optionsCheckboxes" checked disabled>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-simple btn-behance btn-file" data-value="12" data-img="">
                                                                <i class="md md-attach-file md-lg"></i>Añadir
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td width="5%" class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-round" data-value="">
                                                        <i class="md md-flash-on md-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>ISP-Claro-Agosto-2016</td>
                                                <td width="30%" class="text-right">
                                                    <ul class="actions">
                                                        <li>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="optionsCheckboxes" checked disabled>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-simple btn-behance btn-file" data-value="12" data-img="">
                                                                <i class="md md-attach-file md-lg"></i>Añadir
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td width="5%" class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-round" data-original-title="" title="">
                                                        <i class="md md-flash-on md-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>01/06/2017</td>
                                <td>Jose Arias</td>
                                <td class="text-right card-link btn-colapcin"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"></i></td>
                            </tr>
                            <tr class="colapcin table-colapcin panel">
                                <td></td>
                                <td colspan="3">
                                    <div class="table-responsive">
                                        <table class="table table-jse">
                                            <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>ISP-Telefónica-Feb-2017</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-round" data-value="15">
                                                        <i class="md md-flash-on md-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>ISP-Claro-Agosto-2016</td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-round" data-original-title="" title="">
                                                        <i class="md md-flash-on md-lg"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mdladdFile" data-keyboard="false" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-hidden="true">
                        <i class="md md-clear"></i>
                    </button>
                    <h4 class="modal-title">Añadir</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <input id="images" name="images" type="file" multiple=false class="file-loading" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-simple btn-close" data-dismiss="modal">Atras</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="../../assets/js/fileinput.js"></script>
    <script src="../../assets/js/jquery.webui-popover.js"></script>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
///
            $('#tblConsultaSolicitado').on('click','.btn-file',function(){
                var mint_DocumentoId = $(this).data('value');
                var mint_imagen = $(this).data('img');
                var mstr_type = $(this).data('type');
                var mint_file = "";
                if(mint_imagen != undefined && mint_imagen != ""){
                    mint_file = ["<img style='max-width: 100%; max-height: 100%;'  src='data:"+mstr_type+";base64,"+mint_imagen+"' class='file-preview-image' alt='Prueba' title='Archivo'>"];
                }
                $("#mdladdFile").modal('show');
                $("#images").fileinput({
                    uploadUrl: "/pagConsumoSolicitado/subirPdf", // server upload action
                    uploadAsync: false,
                    maxFileCount: 1,
                    uploadExtraData: {mint_DocumentoId:mint_DocumentoId},
                    initialPreview: mint_file,
                }).on('filebatchpreupload', function(event, data, id, index) {

                }).on('filebatchuploadsuccess', function(event, data, id, index) {

                }).on('filebatchuploaderror', function(event, data, id, index) {

                });
            });

            $('.btn-close').on('click',function(){

                $("#images").fileinput('destroy');
            });

            $('#tblConsultaSolicitado').on('click','.btn-colapcin',function(){
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
                    if(mstr_Card == 'card')
                    {
                        flst_AreasContrato($(this).data('value'),this);
                    }

                }else{
                    mele_Card.addClass(mstr_Card+'-colapcin');
                    mele_Card.removeClass(mstr_Card+'-colapcin-off');
                    mele_btn.addClass('md-keyboard-arrow-up');
                    mele_btn.removeClass('md-keyboard-arrow-down');
                }

            });

            $('#btnGenerar').on('click',function(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo e(url("/pagConsumoSolicitado/guardarPdf")); ?>',
                    data: {},
                    //dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        flst_Documentos();
                    }
                });
            });

            flst_Documentos();
            function flst_Documentos(){
                $('#tblConsultaSolicitado tbody').html('');
                $.ajax({
                    type: "GET",
                    url: '<?php echo e(url("/pagConsumoSolicitado/lstDocumentos")); ?>',
                    data: {},
                    dataType: 'json',
                    error: function (data, status) {
                        alert('Error');
                    },
                    success: function (data) {
                        var mstr_fecha= "";
                        var html = "";
                        var count = 0;
                        var count1 = 0;
                        $.each(data, function (i, r) {
                            if(i != 0 && mstr_fecha!=r.Fecha)
                            {
                                html +=  '</tbody>'+
                                        '</table>'+
                                        '</div>'+
                                        '</td>'+
                                        '</tr>';
                            }
                            if(mstr_fecha!=r.Fecha) {
                                mstr_fecha = r.Fecha;
                                count1++;
                                count = 0;
                                html += '<tr>' +
                                        '<td class="text-center">'+count1+'</td>' +
                                        '<td>'+ r.Fecha+'</td>' +
                                        '<td>'+ r.Usuario+'</td>' +
                                        '<td class="text-right card-link btn-colapcin"><i class="ico-colapcin md md-keyboard-arrow-up md-lg" style="font-size: 2em;vertical-align: -50%;"></i></td>' +
                                        '</tr>' +
                                        '<tr class="colapcin table-colapcin panel">' +
                                        '<td></td>' +
                                        '<td colspan="3">' +
                                        '<div class="table-responsive">' +
                                        '<table class="table table-jse">' +
                                        '<tbody>';
                            }
                            count++;
                            html += '<tr>'+
                                    '<td class="text-center">'+count+'</td>'+
                                    '<td>'+ r.Contrato+'</td>'+
                                    '<td width="30%" class="text-right">'+
                                    '<ul class="actions">'+
                                    '<li>'+
                                    '</li>'+
                                    '<li>'+
                                    '<button class="btn btn-simple btn-behance btn-file" data-value="'+ r.idDocumentos +'" data-img="'+ r.DocPrueba+'" data-type="'+ r.TypePrue+'">'+
                                    '<i class="md md-attach-file md-lg"></i>Añadir'+
                                    '</button>'+
                                    '</li>'+
                                    '</ul>'+
                                    '   </td>'+
                                    '<td width="5%" class="td-actions text-right">'+
                                    '<a type="button" rel="tooltip" class="btn btn-round" href="data:'+ r.TypeDocum +';base64,'+ r.Documento+'" download="'+ r.Contrato+'-'+ r.Fecha+'.pdf">'+
                                    '<i class="md md-flash-on md-lg"></i>'+
                                    '</a>'+
                                    '</td>'+
                                    '</tr>';
                        });
                        $('#tblConsultaSolicitado tbody').append(html);
                    }
                });
            }

                });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>