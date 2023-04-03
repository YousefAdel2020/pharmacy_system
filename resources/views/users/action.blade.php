<a href="{{ route('users.edit', $id) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
<form action="{{ route('user.destroy', $id) }}" class="d-inline" method="post">
    @csrf
    @method('delete')
    <button onclick="return confirm('Are you sure?')" type="submit" name="id" title="Delete"
        class="form-button border-0 bg-transparent text-danger">
        <i class="fa-sharp fa-solid fa-trash black"></i>
    </button>
</form>
