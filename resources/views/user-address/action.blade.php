<a class="" href="{{ route('user-address.show', $userAddress->id) }}"><i class="fa-solid fa-eye"></i></a>
<a class="" href="{{ route('user-address.edit', $userAddress->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
<form action="{{ route('user-address.destroy', $userAddress->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="border-0 "><i class="fa fa-close"></i></button>
</form>
