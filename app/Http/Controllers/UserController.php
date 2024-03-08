<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'ci' => $request->ci,
            'password' => bcrypt($request->password),
        ]);

        $selectedRole = Role::findById($request->role);
        $user->assignRole($selectedRole);

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Usuario creado correctamente');
        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'ci' => $request->ci,
            'password' => $request->password,
        ]);

        $selectedRole = Role::findById($request->role);
        $user->syncRoles($selectedRole);

        notyf()->duration(2000)->position('y', 'top')->addSuccess('Usuario actualizado correctamente');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->animals()->exists() || $user->clinicalRecords()->exists() || $user->paymentCommitments()->exists()) {
            notyf()->duration(2000)->position('y', 'top')->addError('No se puede eliminar el usuario, tiene registros asociados');
            return redirect()->route('users.index');
        }

        if($user->id == 1){
            notyf()->duration(2000)->position('y', 'top')->addError('No se puede eliminar el usuario administrador');
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}
