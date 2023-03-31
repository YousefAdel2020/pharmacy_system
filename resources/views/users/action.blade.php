<a href="{{ route('users.edit', 1) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route('users.edit', 1) }}" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" name="id" title="Delete" class="form-button">
                        <i class="fa-sharp fa-solid fa-trash black"></i>
                    </button>
                </form>