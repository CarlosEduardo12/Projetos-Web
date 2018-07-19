@extends('menu')

@section('conteudo')

    <br></br>
    <div class="col-sm-3"></div>
    <div class="col-sm-6 ">
    <table class="table table-bordered table-striped table-hover table-responsive">
      <thead>
        <tbody>
          <caption>Exames Solicitados pelo Paciente</caption>
        <tr>
          <th>Usuário</th>
          <th>Cod Exame</th>
          <th>Data</th>
          <th>Preço</th>
          <th>Ações</th>
        </tr>
      </thead>

      @foreach( $test as $e )
    	 <tr>
        @foreach( $user as $u )
          @if ($u->id == $e->user_id)
          <td>{{ $u->name }}</td>
          @endif
  	    @endforeach
      		<td>{{ $e->id}}</td>
          <td>{{ $e->date}}</td>
          @foreach ($procedure as $u)
          @if ($u->id == $e->procedure_id)
          <td>{{ $u->price }}</td>
          @endif
          @endforeach
          <td>
                <form method="post" onsubmit="return confirm('Confirma exclusão do Procedimento?');" action="{{ route('test.destroy',[$e->id])}}">
              @csrf
              @method('DELETE')
              <input class="btn btn-danger" type="submit" value="Excluir">
            </form>

          </td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
			<tr>
				<td colspan="1"><b>Quantidade de Exames</b></td>
				<td>{{$total}}</td>
        <td colspan="1"><b>Total em R$</b></td>
				<td>R${{ $valortotal }}</td>
			</tr>
		</tfoot>
    </table>

    @if ( Auth::check() )
     <a class="btn btn-primary "href="{{route('test.create')}}">Cadastrar Exames</a>
    @else
     <a class="btn btn-primary" onclick="funcao1()" value="Exibir Alert">Cadastrar Exames</a>
    @endif
  </div>


@endsection('conteudo')
