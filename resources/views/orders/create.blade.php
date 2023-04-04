@extends("layouts.adminlte")

@section('title' , 'Create order')



@section('content')

<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Order</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('orders.store')}}" method="post">
          @csrf
            <div class="card-body">
                    
                <div class="form-group" data-select2-id="13">
                  <label for="userName">User Name</label>
                  <select name="userName" class="form-control select2" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    @foreach($users as $user)
                    <option>{{$user->name}}</option>
                    @endforeach
                  </select>
                  
                </div>

                <div class="form-group" >
                  <label for="is_insured">Is insured</label>
                  <select id="mySelect2" name="is_insured">
                    <option value="1">YES</option>
                    <option value="2">NO</option>
                
                  </select>
                
                </div>



                <div class="form-group">
                  <label for="medicine_names">Medicine Names</label>
                  <select class="form-control select2-tags" multiple='multiple'  name="medicine_names[]">
                    @foreach($medicines as $medicine)
                    <option value="{{$medicine->id}}">{{$medicine->name}}-{{$medicine->type}}</option>
                @endforeach
                      <!-- Add more options as needed -->
                  </select>
              </div>
                  

            



              

              
                  <div class="form-group">
                    <label for="qty[]" class="form-label">Qty</label>

                    <select class="form-control select2-tags @error('qty[]') is-invalid @enderror" name="qty[]" multiple="multiple" style="width: 100%;">
                        
                    @for($x=1;$x<=10;$x++)
                        <option value="{{$x}}">{{$x}}</option>
                    @endfor
                    </select>

                  

                  </div>




                  

                  <div class="form-group">
                        <label for="DocName">Doctor Name</label>
                        <select name="DocName" class="form-control " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          @foreach($doctors as $doctor)
                          <option>{{$doctor->name}}</option>
                          @endforeach
                        </select>
                  </div>

                  <div class="form-group">
                        <label for="PharmacyName">Pharmacy Name</label>
                        <select name="PharmacyName" class="form-control " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          @foreach($pharmacy as $phar)
                          <option>{{$phar->name}}</option>
                          @endforeach
                        </select>
                  </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark w-100">Create</button>
            </div>
        </form>
    </div>


@endsection







@section('script')

<script>
  $(document).ready(function() {
      $('.select2-tags').select2({
          tags: true,
          theme: 'bootstrap-5',
         
        });



        $('#mySelect2').prop('disabled', true);



        $("select").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);
        
        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
      });

      $("select").on('select2:unselect', function (e) {

        if (e.params.originalEvent != null && e.params.originalEvent.handleObj.type == "mouseup") {
            $(this).append('<option value="' + e.params.data.id + '">' + e.params.data.text + '</option>');
            let vals = $(this).val();
            vals.push(e.params.data.id);
            $(this).val(vals).trigger('change');
            $(this).select2('close');
        } else if (e.params.data.element != null) {
            e.params.data.element.remove();
        }
    });

  });

 
</script>

@endsection


