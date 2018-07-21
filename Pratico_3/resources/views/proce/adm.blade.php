@extends('menu')

@section('conteudo')

<div class="row">

<div class="col-sm-3">

</div>
<div class="col-sm-5">


<table class="table table-striped">
  <thead class="thead-dark">

  <tr class="table table-bordered table-striped table-hover table-responsive">
    <th>ID</th>
    <th>Nome</th>
    <th>Preço</th>

  </tr>

@foreach( $procedure as $e )

  <tr class="table-light">
    <td>{{ $e->id }}</td>
    <td>{{ $e->name }}</td>
    <td>{{ $e->price }}</td>

</tr>

@endforeach

</table>
 @if ( Auth::check() )
<a class="btn btn-primary "href="{{ route('procedure.create') }}">Inserir Procedimentos</a>
@else
<a class="btn btn-primary "onclick="funcao1()" value="Exibir Alert">Inserir Procedimentos</a>

@endif
</div>
</div>
@endsection('conteudo')
