@extends('layouts.app')

@section('head')
@endsection

@section('title')

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="card modal-content" method="POST" role="form" action="{{url('/pagContrato/asignarAreaContrato/Guardar')}}">
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
                                    @if(count($vobj_local->Areas) > 0)
                                    <select id="sel_lstSubArea" class="selectpicker" data-live-search="true" data-style="select-with-transition" title="{{$vobj_local->Areas[0]->Nom_Area}}"  value="{{$vobj_local->Areas[0]->idAREA}}">
                                        @foreach($vobj_local->Areas as $itemArea)
                                            <option value="{{$itemArea->idAREA}}">{{$itemArea->Nom_Area}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple" style="height: auto;">
                                @foreach($vobj_local->AreasSinAsig as $itemContrato)
                                    <option value="{{$itemContrato->idAREA}}">&nbsp;&nbsp;{{$itemContrato->Nom_Area}}</option>
                                @endforeach
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
                                @foreach($vobj_local->ContratoAreas->areas as $itemArea)
                                    <option value="{{$itemArea->idAREA}}">{{$itemArea->Nom_Area}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding-top: 0;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"><!-- Esta etique se debe poner en todos los formulario para la validacion -->
                    <button type="submit" class="btn btn-primary btn-simple" style="color: #FFFFff;">Guardar</button>
                    <a type="button" class="btn btn-danger btn-simple" data-dismiss="modal" href="{{url('/pagContrato/'.$vobj_local->v)}}">Atras</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
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
                    url: '{{url("/pagPuntosAccesos/fls_listarSubArea")}}',
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
@endsection