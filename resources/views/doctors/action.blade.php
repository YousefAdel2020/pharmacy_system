<a href="{{ route('doctors.edit', $id) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>

<form action="{{ route('doctors.destroy', $id) }}" class="d-inline" method="post"
    onsubmit="return confirm('Are you sure you want to delete this medicine?')">
    @csrf
    @method('delete')
    <button type="submit" name="id" title="Delete" class="form-button">
        <i class="fa-sharp fa-solid fa-trash black"></i>
    </button>

</form>

<a href="#" title="UnBan"><i class="fa-solid fa-user-slash red"></i></a>
<a href="#" title="Ban"><i class="fa-solid fa-user green"></i></a>