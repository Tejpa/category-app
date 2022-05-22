@extends('layouts.app')

@section('content')
<div class="container">
  	<h4>Add Category</h4>
  	<div class="row mb-5">
  		<div class="col">
  			<form id="formData">
                @csrf
              <div class="form-group mb-2">
                <label for="catname">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Enter name">
              </div>
                <button type="submit" id="catname" class="btn btn-primary">Submit</button>
        </form>
  		</div>
  	</div>
  </div>
  <script type="text/javascript">
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      $("#formData").on('click',"#catname", function(e) {
          e.preventDefault();
        var name = $("#name").val();
        $.ajax({
          url: "{{ route('category.update',$category->id) }}",
          data: {name: name},
          method: "put",
          success:function(res){
            toastr.success(res.success);
            //$("#formData")[0].reset();
            window.location.href = "{{ route('category.index') }}";
          }
      });
   });
 
</script>
@endsection