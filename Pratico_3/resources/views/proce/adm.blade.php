@extends('menu')

@section('conteudo')

<div class="row">

<div class="col-sm-3"></div>
<div class="col-sm-5">


    <table class="table table-striped">
      <thead class="thead-dark">

        <tr class="table table-bordered table-striped table-hover table-responsive">
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Ações</th>

        </tr>

      </thead>
    @foreach( $procedure as $e )

      <tr class="table-light">
        <td>{{ $e->id }}</td>
        <td>{{ $e->name }}</td>
        <td>{{ $e->price }}</td>
        <td>
          <div class="col-sm-1">
              <form method="post" onsubmit="return confirm('Confirma exclusão do Procedimento?');" action="{{ route('procedure.destroy',[$e->id])}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"type="submit" style="font-size:12px"> <i class="fa fa-trash-o "></i></button>
              </form>
          </div>

        </td>


    </tr>

    @endforeach

    </table>
 @if ( Auth::check() )
<a class="btn btn-primary "href="{{ route('procedure.create') }}">Inserir Procedimentos</a>
<button class="btn btn-primary"style="font-size:14px" id="myBtn">Editar Exame <i class="fa fa-edit"></i></button>
@else
<a class="btn btn-primary "onclick="funcao1()" value="Exibir Alert">Inserir Procedimentos</a>

@endif
</div>


<div id="myModal" class="modal">


  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Edite seu Exame:</h2>
    </div>
    <div class="modal-body">
      <form method="post" action="{{ route('procedure.update',$e->id)}}">
        @csrf
        @method('PATCH')
        <p>Procedimento:
        <select  name="e->id">
          <option value="">Selecione</option>
          @foreach( $procedure as $x )
          <option value="x->id"> {{$x->id}}</option>
          @endforeach

        </select></p>

      <p>Nome: <input type="text" name="name"></p>
      <p>Preço: <input type="number" name="price"></p>
      <input type="submit" name="btnAtualizar" value="Atualizar">
      </form>
    </div>
    <div class="modal-footer">
      <h3>Exames Laboratorias</h3>
    </div>
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
