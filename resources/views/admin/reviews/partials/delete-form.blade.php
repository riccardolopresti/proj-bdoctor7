<!-- Button trigger modal -->
<button type="button" class="bn632-hover bn26 delete-profile" data-bs-toggle="modal" data-bs-target="#modal{{ $review->id }}">
    Elimina
</button>

<!-- Modal -->
<div class="modal fade" id="modal{{ $review->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Stai per eliminare {{ $review->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi davvero eliminare definitivamentte la recensione di <strong>{{ $review->name }}</strong> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="bn632-hover bn26 close-btn" data-bs-dismiss="modal">Close</button>
                <form class="d-inline" action="{{ route('admin.ratings.destroy', $review) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bn632-hover bn26 delete-profile" title="delete">
                        Elimina
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
