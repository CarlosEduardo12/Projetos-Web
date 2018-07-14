@extends('menu')

@section('conteudo')
   <br></br>

   <br>
  <form method="post" action="{{ route('procedure.store') }}">

    @csrf
<div class="col-sm-3">

</div>
<div class="col-sm-5 jumbotron">
<h2>Inserir Novo Procedimento</h2>

    <p>Nome: <input type="text" name="name"></p>
    <p>Preço: <input type="text" name="price"></p>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"></p>
    <input type="submit" name="btnIncluir" value="Incluir">

</div>





  </form>

@endsection('conteudo')
