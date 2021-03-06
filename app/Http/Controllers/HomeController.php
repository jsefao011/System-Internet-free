<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\AreaRepository;
use App\Repositories\AsyncOperation;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use routeros_api;
class HomeController extends Controller
{

    protected $RepoAre;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected  $UsuarioRepo;
    public function __construct(UsuarioRepository $UsuarioRepo,AreaRepository $repoArea)
    {
        // $this->middleware('auth');
        $this->RepoAre = $repoArea;
        $this->UsuarioRepo = $UsuarioRepo;
    }
    public function index(Request $request){

        $Usuario = (string)$request->session()->get('user', 'default');
        $Password =   (string)$request->session()->get('pws', 'default');

        $user = $this->UsuarioRepo->validateUser( $Usuario,$Password);
        if(count($user)>0){
            return redirect('/pagCliente');
        }
        return view('auth.login');

    }
    /**
     * Show the application dashboard.
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetDataMikrotik($interface)
    {
        $ip = "10.100.40.2";
        $api_puerto=8728;
        $result =  @fsockopen($ip, $api_puerto, $error_no, $error_str, 1);
        if(!$result)
        {
            $rows['name'] = 'Tx';
            $rows['data'][] = 0;
            $rows2['name'] = 'Rx';
            $rows2['data'][] = 0;
            $result = array();
            array_push($result,$rows);
            array_push($result,$rows2);
            return json_encode($result, JSON_NUMERIC_CHECK);
        }

        $ipRouteros = "10.100.40.2"; $Username="system-internet";$Pass="system2017";
       // $ipRouteros = "192.168.52.101"; $Username="admin";$Pass="digeti2017";

        $API = new routeros_api();
        $API->debug = false;
        if ($API->connect($ipRouteros , $Username , $Pass, $api_puerto)) {
            $rows = array(); $rows2 = array();
            $API->write("/interface/monitor-traffic",false);
            $API->write("=interface=".$interface,false);
            $API->write("=once=",true);
            $READ = $API->read(false);
            $ARRAY = $API->parse_response($READ);
            if(count($ARRAY)>0){
                $rx = number_format($ARRAY[0]["rx-bits-per-second"]/1024,1);
                $tx = number_format($ARRAY[0]["tx-bits-per-second"]/1024,1);
                $rows['name'] = 'Tx';
                $rows['data'][] = $tx;
                $rows2['name'] = 'Rx';
                $rows2['data'][] = $rx;
            }else{
                echo $ARRAY['!trap'][0]['message'];
            }
        }else{
            echo "<font color='#ff0000'>La conexion ha fallado. Verifique si el Api esta activo.</font>";
        }
        $API->disconnect();

        $result = array();
        array_push($result,$rows);
        array_push($result,$rows2);
        print json_encode($result, JSON_NUMERIC_CHECK);

    }

    public function getDataMKTdb(){
        $this->RepoAre->getAreaAll();
    }

    public function salir(Request $r){
        $r->session()->put('user',"");
        $r->session()->put('pws',"");
        return redirect('/');
    }

    public function store(Request $r){
        $user = $this->UsuarioRepo->validateUser($r['user'],$r['pws']);
        if(count($user)==0){
            return redirect('/');
        }
        $r->session()->put('user',$r['user']);
        $r->session()->put('pws',$r['pws']);

        return redirect('/pagCliente');
    }

}
