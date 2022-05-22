@extends('layouts.app')

@section('content')
<div class="container">

  	<h4>Update MiniSubCategory</h4>
  	<div class="row mb-5">
  		<div class="col">
  			<form id="formData">
                @csrf
              <div class="form-group mb-2">
                <label for="catname">MiniSubCategory Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $minicat->name }}" placeholder="Enter name">
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
        if(name == ''){
            alert('Input can not be left blank');
         }
        $.ajax({
          url: "{{ route('mini-sub-category.update',$minicat->id) }}",
          data: {name: name},
          method: "put",
          success:function(res){
            toastr.success(res.success);
            window.location.href = "{{ route('mini-sub-category.index') }}";
          }
      });
   });
 
</script>
@endsection