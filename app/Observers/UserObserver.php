<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserCrudLog;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $userLog = new UserCrudLog();
        $userLog->quien = Auth::user()->name;
        $userLog->accion = 'Creó al usuario: ' . ' | Nombre: ' .$user->name . ' | Correo: ' . $user->email . ' | Activo: ' . $user->estado . '| Rol: ' . $user->rol;
        $userLog->fecha = now()->isoFormat('LLLL');
        $userLog->save();
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $userLog = new UserCrudLog();
        $userLog->quien = Auth::user()->name;
        $userLog->accion = 'Modificó al usuario: ' . ' | Nombre: ' .$user->name . ' | Correo: ' . $user->email . ' | Activo: ' . $user->estado . '| Rol: ' . $user->rol;
        $userLog->fecha = now()->isoFormat('LLLL');
        $userLog->save();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $userLog = new UserCrudLog();
        $userLog->quien = Auth::user()->name;
        $userLog->accion = 'Eliminó al usuario: ' . ' | Nombre: ' .$user->name . ' | Correo: ' . $user->email . ' | Activo: ' . $user->estado . '| Rol: ' . $user->rol;
        $userLog->fecha = now()->isoFormat('LLLL');
        $userLog->save();
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
