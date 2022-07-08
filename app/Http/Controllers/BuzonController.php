<?php

namespace App\Http\Controllers;

use App\Models\Buzon;
use App\Mail\BuzonMailable;
use Illuminate\Http\Request;
use App\Exports\BuzonsExport;
use App\Mail\DenuncianteMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class BuzonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Buzon::latest('created_at')->paginate(10);

        return view('emails.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = DB::table('areas')->orderBy('nombre','asc')->where('estado','=','Si')->get();
        return view('emails.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBuzonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    public function send(Request $request)
    {

        // Getting the request name
        $name = $request->nombre;

        // Getting the hour without double dots ":"
        $hora = date("h:i:s");
        $doubleDot = ":";
        $replaceDot = "";
        $time = str_replace($doubleDot, $replaceDot, $hora);

        // Getting the currint date
        $hoy = date("Ymd");

        // Getting just the first letter of the request name
        $nombre = '';
        $explode = explode(' ',$name);
        foreach($explode as $x){
            $nombre .=  $x[0];
        }

        // Structure of the folio
        $folio = $nombre ."-" . $time ."-". $hoy;

        $valores = $request->all();
        $valores['folio'] = $folio;
        $valores['estado'] = 'no_atendido';
        $denuncianteCorreo = $valores['email'];


        // If doesnt work in admon public set the values with "N/A"
        if($valores['trabajo_admon_publica'] == 'No')
        {
            $valores['entidad_dependencia_testigo'] = 'No aplica';
            $valores['cargo_testigo'] = 'No aplica';
        }
        
        $mensajeTest = Buzon::create($valores);
        
        $data = Buzon::find($mensajeTest->id);

        // Mail::to('jpratso@turismochiapas.gob.mx')->send(new BuzonMailable($data));
        Mail::to('josefernando.sectur@gmail.com')->send(new BuzonMailable($data));
        Mail::to('comiteetica@turismochiapas.gob.mx')->send(new BuzonMailable($data));
        // Mail::to('rhturismoch@gmail.com')->send(new BuzonMailable($data));
        Mail::to($denuncianteCorreo)->send(new DenuncianteMailable($data));

        // return "Mensaje enviado, revisar carpeta spam ó correos no deseados."; 
        // return response()->json(['code' => 200, 'msg' => 'Gracias por tu mensaje, pronto te contactaremos.']);
        return redirect()->route('welcome')->with('success',' ');   
        // return response()->json(['success'=>'Usuario creado con éxito']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensaje = Buzon::findOrFail($id);

        return view('emails.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function edit(Buzon $buzon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuzonRequest  $request
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valores = $request->all();

        $registro = Buzon::find($id);
        $registro->fill($valores);
        $registro->save();

        return redirect()->route('emails.show', $id)->with('success','Mensaje actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $mensaje_seleccionado = Buzon::findOrFail($id);
            $mensaje_seleccionado->delete();
            return redirect()->route('emails.index')->with('success', 'Mensaje eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('emails.index')->with('error',$e->getMessage());
        }
    }

    // Función para datatables
    public function buzonDatatables()
    {
        return datatables()
        ->eloquent(\App\Models\Buzon::latest('created_at'))
        ->addColumn('btn', 'emails.actions')
        ->rawColumns(['btn'])
        ->toJson();
    }

    // Función para poder exportar datos del buzón por excel
    public function buzonExportExcel()
    {
        return Excel::download(new BuzonsExport, 'buzon-lista.xlsx');
    }
}
