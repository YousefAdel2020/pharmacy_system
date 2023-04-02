<div class="btn-group btn-group-toggle" data-toggle="buttons">
        <form action="{{ route('revenues.destroy', $id) }}" onsubmit="return confirm('Are you sure you want to delete this medicine?')" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" name="id" title="Delete" class="form-button btn btn-danger">
                        delete
                    </button>
                </form>
        </div>