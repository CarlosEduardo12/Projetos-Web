@extends('menu')

@section('conteudo')

    <br></br>
    <div class="col-sm-3"></div>
    <div class="col-sm-6 ">
    <table class="table table-bordered table-striped table-hover table-responsive">
      <thead>
        <tbody>
          <caption><h3>Exames Solicitados pelo {{Auth::user()->name}}</h3></caption>
        <tr>
          <th>Usuário</th>
          <th>Cod Exame</th>
          <th>Data</th>
          <th>Preço</th>
           <th>&ensp; Excluir &emsp; Editar</th> <!--Codigos que criam 2 e 4 espaços na tela respectivamente -->
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
              <div class="col-sm-1">
                <form method="post" onsubmit="return confirm('Confirma exclusão do Procedimento?');" action="{{ route('test.destroy',[$e->id])}}">
                  @csrf
                  @method('DELETE')

                <button class="btn btn-danger"type="submit" style="font-size:12px"> <i class="fa fa-trash-o "></i></button>
                </form>
              </div><
              <div class="col-sm-1"></div>
                <!-- Trigger/Open The Modal -->
                <div class="col-sm-1">
                  <button class="btn btn-primary"style="font-size:12px" id="myBtn"><i class="fa fa-edit"></i></button>

                </div>

            <!-- The Modal --> <!-- https://www.w3schools.com/howto/howto_css_modals.asp -->
            <div id="myModal" class="modal">


              <!-- Modal content -->
              <div class="modal-content">
                <div class="modal-header">
                  <span class="close">&times;</span>
                  <h2>Edite seu Exame:</h2>
                </div>
                <div class="modal-body">
                  <form method="post" action="{{ route('test.update',$e->id)}}">
                    @csrf
                    @method('PATCH')
                    <p>Exame:
                    <select  name="e->id">
                      <option value="">Selecione</option>
                      @foreach ($test as $x)
                      <option value="x->id"> {{$x->id}}</option>
                      @endforeach

                    </select></p>

                  <p>Data: <input type="date" name="date"></p>
                  <input type="submit" name="btnAtualizar" value="Atualizar">
                  </form>
                </div>
                <div class="modal-footer">
                  <h3>Modal Footer</h3>
                </div>
              </div>

              </div>
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
<script type="text/javascript">


  // Get the modal
  var modal = document.getElementById('myModal');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btn.onclick = function() {
      modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
      modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>
@endsection('conteudo')
