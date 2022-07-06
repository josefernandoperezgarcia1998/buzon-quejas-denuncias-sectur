<?php

namespace App\Observers;

use App\Models\Buzon;
use App\Models\BuzonLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BuzonObserver
{
    /**
     * Handle the Buzon "created" event.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return void
     */
    public function created(Buzon $buzon)
    {
        //
    }

    /**
     * Handle the Buzon "updated" event.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return void
     */
    public function updated(Buzon $buzon)
    {
        $buzonLog = new BuzonLog();
        $buzonLog->quien = Auth::user()->name;
        $buzonLog->accion = 'Modificó al mensaje: ' . ' | Folio: ' . $buzon->folio . ' | Nombre: ' . $buzon->nombre . ' | Estado del mensaje: ' . $buzon->estado;
        $buzonLog->fecha = now()->isoFormat('LLLL');
        $buzonLog->save();
    }

    /**
     * Handle the Buzon "deleted" event.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return void
     */
    public function deleted(Buzon $buzon)
    {
        $buzonLog = new BuzonLog();
        $buzonLog->quien = Auth::user()->name;
        $buzonLog->accion = 'Eliminó al mensaje: ' . ' | Folio: ' . $buzon->folio . ' | Nombre: ' . $buzon->nombre . ' | Estado del mensaje: ' . $buzon->estado;
        $buzonLog->fecha = now()->isoFormat('LLLL');
        $buzonLog->save();
    }

    /**
     * Handle the Buzon "restored" event.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return void
     */
    public function restored(Buzon $buzon)
    {
        //
    }

    /**
     * Handle the Buzon "force deleted" event.
     *
     * @param  \App\Models\Buzon  $buzon
     * @return void
     */
    public function forceDeleted(Buzon $buzon)
    {
        //
    }
}
