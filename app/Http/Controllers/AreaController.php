<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('nombre','asc')->paginate(15);
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Area::create($data);

        return redirect()->route('areas.index')->with('success', 'Area creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaRequest  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $valores = $request->all();

        $area = Area::find($id);
        $area->fill($valores);
        $area->save();

        return redirect()->route('areas.show', $id)->with('success','Area actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $area_seleccionado = Area::findOrFail($id);
            $area_seleccionado->delete();
            return redirect()->route('areas.index')->with('success', 'Area eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('areas.index')->with('error',$e->getMessage());
        }
    }

    public function areasDatatables()
    {
        return datatables()
            ->eloquent(\App\Models\Area::orderBy('nombre', 'asc'))
            ->addColumn('btn', 'areas.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }

}
