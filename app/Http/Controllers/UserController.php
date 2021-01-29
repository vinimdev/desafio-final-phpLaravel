<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = new User();
        if($request->has('action') && $request->get('action') === 'search'){
            $users = $user->filterAll($request);
        } else {
            $users = $user->orderBy('name', 'asc')->paginate(10);
        }

        return view('users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();

            $user = new User();
            $data['password'] = Hash::make($data['password']);
            $user->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar gravar esses dados!');
        }
        return redirect()->back();
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(Request $request, User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $data = $request->all();
            if(empty($request->get('password'))){
                unset($data['password']);
            } else {
                $data['password'] = Hash::make($data['password']);
            }
            $user->update($data);

            $request->session()->flash('success', 'Registro atualizado com sucesso');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar esses dados');
        }
        return redirect()->back();
    }

    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();

            $request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados');
        }

        return redirect()->back();
    }

}
