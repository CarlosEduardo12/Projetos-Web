@extends('menu')

@section('conteudo')




<div class="col-sm-3"></div>

<div class="col-sm-6 jumbotron">
  <form method="post" action="{{ route('test.store') }}">
    @csrf
    <h2>Cadastrar Exame</h2>
    <div class="col-sm-3">
      <label for="user_id">ID do Usuário: </label><br><br>
      <label for="procedure_id">Exame: </label><br><br>
      <label for="date">Data: </label>
    </div>
    <div class="col-sm-4">
      <input type="number" name="user_id" value="{{Auth::user()->id}}" readonly><br><br>
      <select name="procedure_id">
      <!-- Dados dos procedimentos //-->
      @foreach($procedure as $e)
      <option value="{{ $e->id }}">{{ $e->name }} - R${{ $e->price }}</option>
      @endforeach
      </select>
      <br><br>
      <input type="date" name="date"><br><br>
      <input type="submit" name="btnIncluir" value="Incluir">
    </div>
   </form>
 </div>
 @endsection('conteudo')
