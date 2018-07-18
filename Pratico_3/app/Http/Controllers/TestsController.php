<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\procedure;
use App\Test;
use App\user;
use Auth;


class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = user::get();

      $testes = Test::where('user_id', '=', Auth::user()->id)->orderBy('date','desc')->get();
      $total = Test::where('user_id', '=', Auth::user()->id)->count();
      $valortotal = Test::join('procedures', 'tests.procedure_id', '=', 'procedures.id')
      ->where('tests.user_id', '=', Auth::user()->id)->sum('procedures.price');
      return view('testes.listar')
      ->with('test', $testes)
      ->with('total', $total)
      ->with('user', $user)

      ->with('valortotal', $valortotal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $Procedure = procedure::orderBy('name')->get();
           return view('testes.create')
             ->with('procedure', $Procedure);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Test::create($request->all());
      session()->flash('mensagem', 'Exame cadastrado com sucesso!');

      return redirect()->route('test.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $id)
    {
      $user = user::get();
      $Procedure = procedure::get();
              return view('testes.listar')
              ->with('user', $user)
              ->with('test',$test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $id)
    {
      $tests= Test::orderBy('user_id')->get();
    return view('testes.listar')
    ->with('tests',$tests);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
    $test->save();
    session()->flash('mensagem', 'Exame atualizado com sucesso!');
    return redirect()->route('testes.listar',$test->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $achar = Test::findOrFail($id);
      $achar->delete();
      session()->flash('mensagem','Exame excluido com sucesso');
      return redirect()->route('test.index');    }
}
