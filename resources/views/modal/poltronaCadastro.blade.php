


@for ($i = 1; $i <= 30; $i++)
<form method = "post" action="{{route('cadastro-poltrona')}}">
@csrf
<input type="button" class="btn btn-primary" name="minhaEntrada" value="Valor {{ $i }}"  data-bs-target="#exampleModal{{$i}}" data-bs-toggle="modal" data-valor="{{ $i }}">

<div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Reservar poltrona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nome do cliente:</label>
            <input type="text" class="form-control" name="nomeclie" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Número da poltrona</label>
            <input type="text" class="form-control" value="{{$i}}" name="numpol" id="message-text" disabled>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Reservar</button>
      </div>
    </div>
  </div>
</div>

</form>

@endfor


