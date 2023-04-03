<a href="{{ route('pharmacies.edit', $id) }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
          
           @if($pharmacy->trashed()) 
              <form action="{{ route('pharmacies.restore', $id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to restore this pharmacy?')" class="d-inline" method="post">
                    @csrf
                    @method('POST')
                    <button type="submit" name="id" title="RESTORE" class="form-button">
                        <i class="fa-sharp fa-solid fa-trash black"></i>
                    </button>
                   
                </form>

            @else
                <form action="{{ route('pharmacies.destroy', $id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this pharmacy?')" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" name="id" title="Delete" class="form-button">
                        <i class="fa-sharp fa-solid fa-trash black"></i>
                    </button>
                   
                </form>