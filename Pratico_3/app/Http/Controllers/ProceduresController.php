<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\procedure;
use Auth;
class ProceduresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedure = procedure:: orderBy('name')->get();
        if (Auth::check()) {
           return view('proce.adm')->with('procedure',$procedure);
        }
        else {
          return view('geral.listar')->with('procedure',$procedure);        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('proce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      procedure::create($request->all());
      session()->flash('mensagem', 'Procedimento cadastrado com sucesso!');

      return redirect()->route('procedure.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, procedure $procedure)
    {
      $procedure->fill($request->all());
      $procedure->save();
      $request->session()->flash('mensagem', 'Exame atualizado com sucesso!');
      return redirect()->route('procedure.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(procedure $procedure)
    {
      $procedure->delete();
      session()->flash('mensagem','Exame excluido com sucesso');
      return redirect()->route('test.index');
    }
}
