@extends('layouts.app')

@section('content')
<div class="container">

  	<h4>Update SubCategory</h4>
  	<div class="row mb-5">
  		<div class="col">
  			<form id="formData">
                @csrf
              <div class="form-group mb-2">
                <label for="catname">SubCategory Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $subcat->name }}" placeholder="Enter name">
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
          url: "{{ route('sub-category.update',$subcat->id) }}",
          data: {name: name},
          method: "put",
          success:function(res){
            toastr.success(res.success);
            window.location.href = "{{ route('sub-category.index') }}";
          }
      });
   });
 
</script>
@endsection