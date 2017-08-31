<?php
/**
 * Created by PhpStorm.
 * User: Jose Arias
 * Date: 12/05/2017
 * Time: 12:31
 */

namespace App\Repositories;
use App\Area;
use App\Dispositivo;

class AreaRepository
{
    private $AreaModel;
    public  function __construct(Area $AreaModel)
    {
        $this->AreaModel = $AreaModel;
    }

    public function flst_Listar($vint_EntidadId)
    {
        return Area::where('IdEntidad',$vint_EntidadId)
            ->where('Nivel','=',0)
            ->where('Estado','=',1)
            ->orderBy('idAREA','desc')
            ->get();
    }

    public function flst_ListarAreaSinAsing($vint_EntidadId)
    {
        $mdat_area =  Area::whereNotIn('idAREA', Area::Select('area.idAREA')
                                            ->join('area_has_contrato','area.idAREA','=','area_has_contrato.idAREA')
                                            ->get() )
                        ->where('IdEntidad','=',$vint_EntidadId)
                        ->where('Nivel','=',0)
                        ->where('Estado','=',1)
                        ->orderBy('idAREA','desc')
                        ->get();

        foreach($mdat_area as $item)
        {
            $item->area;
            $item->dispositivo = Dispositivo::find($item->idDispositivo);
            foreach($item->area as $item)
            {
                $item->area;
                $item->dispositivo = Dispositivo::find($item->idDispositivo);
                foreach($item->area as $item)
                {
                    $item->area;
                    $item->dispositivo = Dispositivo::find($item->idDispositivo);

                }
            }
        }
        return $mdat_area;
    }

    public  function flst_Obtener($vint_id)
    {
        return Area::find($vint_id);
    }
    public function flst_Actualizar(Area $data)
    {
        $data->save();
        return $data;
    }

    public function flst_Guardar(Area $data)
    {
        $primarykey = $this->AreaModel->getKeyName();
        if($data->$primarykey == 0){
            $maxKey = Area::all()->max($primarykey);
            $data->$primarykey = $maxKey+1;
            $data->save();
            $data->idAREA = $maxKey+1;
        }else{
            $data1 = Area::find($data->$primarykey);
            $data1->CTAS_CTR =  $data->CTAS_CTR;
            $data1->idEntidad =  $data->idEntidad;
            $data1->Interface =  $data->Interface;
            $data1->Nivel =   $data->Nivel;
            $data1->Nom_Area =  $data->Nom_Area;
            $data1->Cod_Padre = $data->Cod_Padre;
            $data1->idDispositivo =  $data->idDispositivo;
            $data1->save();
        }
        return $data;
    }

    public function fbol_Eliminar($idAre){
        $area = Area::find($idAre);
        $area->Estado = 0;
        return $area->save();
    }

    public function flst_ListarSubAreasSinAsing($vint_EntidadId,$Areaid,$varr_Nivel)
    {

        $mdat_subarea=[];
        $mdat_subarea2=[];
        $mdat_subarea3=[];



        if($Areaid == 0){
            $Areaid = Area::Select('area.idAREA')
                ->where('IdEntidad','=',$vint_EntidadId)
                ->orderBy('Nom_Area','desc')
                ->where('Estado','=',0)
                ->first();
        }

        $mdat_subarea1 =  Area::where('IdEntidad','=',$vint_EntidadId)
            ->where('Cod_Padre',$Areaid)
            ->where('Estado','=',1)
            ->orderBy('Nom_Area','desc')
            ->get()
            ->toarray();


        if(!is_null($mdat_subarea1))
        {
            foreach ($mdat_subarea1 as $item1) {
                $mdat_data = Area::where('IdEntidad', '=', $vint_EntidadId)
                    ->where('Cod_Padre', $item1['idAREA'])
                    ->where('Estado', '=', 1)
                    ->orderBy('Nom_Area', 'desc')
                    ->get()
                    ->toarray();


            }

        }


        if(!is_null($mdat_subarea2))
        {
            foreach($mdat_subarea2 as $item2)
            {
                $mdat_data =  Area::where('IdEntidad','=',$vint_EntidadId)
                        ->where('Cod_Padre',$item2['idAREA'])
                        ->where('Estado','=',1)
                        ->orderBy('Nom_Area','desc')
                        ->get()
                        ->toarray();
                array_push($mdat_subarea3,$mdat_data);
            }
        }

        /*                        foreach ($varr_Nivel as $itemNivel){

                                    switch ($itemNivel){
                                        case 1:
                                            array_push($mdat_subarea,$mdat_subarea1);
                                            break;
                                        case 2:
                                            array_push($mdat_subarea,$mdat_subarea2);
                                            break;
                                        case 3:
                                            array_push($mdat_subarea,$mdat_subarea3);
                                            break;
                                    }
                                }
                */
        return ($mdat_subarea2);
    }

}