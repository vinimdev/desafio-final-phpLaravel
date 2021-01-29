<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $provider = new Provider();
        if($request->has('action') && $request->get('action') === 'search'){
            $providers = $provider->filterAll($request);
        } else {
            $providers = $provider->orderBy('name', 'asc')->paginate(10);
        }

        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {
        try {
            $data = $request->all();
            $provider = new Provider();
            $provider->create($data);

            $request->session()->flash('success', 'Registro gravado com sucesso');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar gravar esses dados!' . $$e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */

    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, Provider $provider)
    {
        try {
            $data = $request->all();
            $provider->update($data);

            $request->session()->flash('success', 'Registro atualizado com sucesso');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar atualizar esses dados');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Provider $provider)
    {
        try {
            $provider->delete();

            $request->session()->flash('success', 'Registro excluído com sucesso!');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Ocorreu um erro ao tentar excluir esses dados');
        }

        return redirect()->back();
    }
}
