@extends('menu')

@section('conteudo')

    <br></br>
    <div class="col-sm-3"></div>
    <div class="col-sm-6 ">
    <table class="table table-bordered table-striped table-hover table-responsive">
      <thead>
        <tbody>
          <caption><h3>Exames Solicitados por  {{Auth::user()->name}}</h3></caption>
        <tr>
          <th>Nome do Exame</th>
          <th>Cod Exame</th>
          <th>Data</th>
          <th>Preço</th>
           <th>&ensp;Excluir</th> <!--Codigos que criam 2 &ensp; e 4 &emsp; espaços na tela respectivamente -->
        </tr>
      </thead>

      @foreach( $test as $e )
    	 <tr>
         @foreach ($procedure as $u)
         @if ($u->id == $e->procedure_id)
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
     <a class="btn btn-primary "href="{{route('test.create')}}">Cadastrar Exames <i class="fa fa-address-card"></i></a>
       <button class="btn btn-primary"style="font-size:14px" id="myBtn">Editar Exame <i class="fa fa-edit"></i></button>
    @else
     <a class="btn btn-primary" onclick="funcao1()" value="Exibir Alert">Cadastrar Exames</a>
     <a class="btn btn-primary" onclick="funcao1()" value="Exibir Alert">Editar Exame</a>
    @endif
  </div>
  @if(Session::has('message'))
    <div class="alert alert-success">
      {{Session::get('message')}}
    </div>
  @endif
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
        <h3>Exames Laboratorias</h3>
      </div>
    </div>

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
