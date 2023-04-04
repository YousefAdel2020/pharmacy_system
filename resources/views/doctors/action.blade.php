<a href="{{ route('doctors.edit', $id) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>

<form action="{{ route('doctors.destroy', $id) }}" class="d-inline" method="post"
    onsubmit="return confirm('Are you sure you want to delete this doctor?')">
    @csrf
    @method('delete')
    <button type="submit" name="id" title="Delete" class="form-button">
        <i class="fa-sharp fa-solid fa-trash black"></i>
    </button>

</form>
@if ($banned_at)
<form method="post" action="{{route('doctors.unban')}}" class="d-inline">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}" />
    <button type="submit" title="UnBan" name="unban" class="form-button"><i
            class="fa-solid fa-user-slash red"></i></button>
</form>

@else
<form method="post" action="{{route('doctors.ban')}}" class="d-inline">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}" />
    <button type="submit" title="Ban" name="ban" class="form-button"><i class="fa-solid fa-user green"></i></button>
</form>

@endif