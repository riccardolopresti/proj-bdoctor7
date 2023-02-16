<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$rating->id}}">
    Elimina
</button>

  <!-- Modal -->
<div class="modal fade" id="modal{{$rating->id}}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Stai per eliminare {{$rating->name}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Vuoi davvero eliminare definitivamentte la valutazione di <strong>{{$rating->name}}</strong>  ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form class="d-inline" action="{{route('admin.ratings.destroy', $rating)}}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger" title="delete">
                Elimina
            </button>
        </form>
        </div>
      </div>
    </div>
</div>
