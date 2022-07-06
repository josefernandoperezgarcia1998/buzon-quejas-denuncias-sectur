<?php

namespace App\Http\Controllers;

use App\Models\BuzonLog;
use Illuminate\Http\Request;

class BuzonLogController extends Controller
{
    public function index()
    {
        return view('buzon-logs.index');
    }

    public function show($id)
    {
        $msg = BuzonLog::findOrFail($id);
        return view('buzon-logs.show', compact('msg'));
    }

    public function destroy($id)
    {
        $userLogSelected = BuzonLog::findOrFail($id);
        $userLogSelected->delete();
        return redirect()->route('buzon-logs.index')->with('success', 'Log eliminado correctamente');
    }

    public function buzonLogsDatatables()
    {
        return datatables()
            ->eloquent(\App\Models\BuzonLog::latest('created_at'))
            ->addColumn('btn', 'buzon-logs.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
