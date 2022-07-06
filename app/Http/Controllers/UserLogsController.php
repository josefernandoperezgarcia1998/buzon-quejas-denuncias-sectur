<?php

namespace App\Http\Controllers;

use App\Models\UserCrudLog;
use Illuminate\Http\Request;

class UserLogsController extends Controller
{
    public function index()
    {
        return view('user-logs.index');
    }

    public function destroy($id)
    {
        $userLogSelected = UserCrudLog::findOrFail($id);
        $userLogSelected->delete();
        return redirect()->route('user-logs.index')->with('success', 'Log eliminado correctamente');
    }

    public function userLogsDatatables()
    {
        return datatables()
            ->eloquent(\App\Models\UserCrudLog::latest('created_at'))
            ->addColumn('btn', 'user-logs.actions')
            ->rawColumns(['btn'])
            ->toJson();
    }
}
