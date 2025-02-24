<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $id }}" aria-hidden="true">
    <form action="{{ route($main_name . '.destroy', [$name => $id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $id }}">{{ __('site.are_you_sure_from_delete') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('site.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('site.delete') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
