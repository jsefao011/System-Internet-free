<?php

namespace App\Http\Controllers;

use App\Repositories\ContratoRepository;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReporteRealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $UsuarioRepo;
    private $ContratoRepo;
    public  function __construct(UsuarioRepository $UsuarioRepo,ContratoRepository $ContratoRepo)
    {
        $this->UsuarioRepo = $UsuarioRepo;
        $this->ContratoRepo = $ContratoRepo;
    }

    public function index(Request $request) //Dashboard
    {
            $Usuario = (string)$request->session()->get('user', 'default');
            $Password = (string)$request->session()->get('pws', 'default');
            $user = $this->UsuarioRepo->validateUser($Usuario, $Password);
            if (count($user) == 0) {
                return redirect('/');
            }
            $item = $this->f_castAccesos($user);
            //Funcion para resaltar el acceso
            $item = $this->f_accesoresaltado($item,$request);
            $mobj_data = new \stdClass();
            $mobj_data->Contrato = $this->ContratoRepo->flst_ListarSimple((int)$request->v);
            return view('modulos.consultarConsumo.real.consumoReal', ['item' => $item], ['data' => $mobj_data]);
    }

    public function gerenerarReporte()
    {
        $jose = 'joseleeafsaf';
        $view =  \View('modulos.consultarConsumo.solicitado.reporte.Consumo',["data"=>$jose])->render();
        $mobj_pdf = \App::make('dompdf.wrapper')
            ->setPaper('a4');
        $mobj_pdf->loadHTML(utf8_decode($view));
        $mstr_pdf64 = base64_encode($mobj_pdf->output());
        ////data:application/pdf;base64
        //<img alt="Embedded Image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIA..." />
        //download="
        //file_put_contents('jose.pdf',$pf);
        //return $pdf->stream('invoice',array("Attachment" => false));
        //return $pdf->download('invoice.pdf');
        // <a href="data:image/png;base64,{{$pf}}" download="jose.pdf">jse</a>
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->getRequestUri();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
