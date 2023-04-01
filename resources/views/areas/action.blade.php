 <a href="{{ route('areas.show', $area->id) }}" class="btn btn-info btn-sm">View </a>
 <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-primary btn-sm">Edit</a>
 <form action="{{ route('areas.destroy', $area->id) }}" method="POST" style="display: inline-block">
     @csrf @method('DELETE')
     <button type="submit" class="btn btn-danger btn-sm">
         Delete
     </button>
 </form>
