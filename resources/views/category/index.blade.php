@extends('layouts.app')

@section('content')

 @if(Session::has('success'))
    <script>
        toastr.info("{{ Session::get('success') }}");
     </script>
@endif
      

<div class="container">
  
   <div class="row">
      <div class="col-sm-8">
         <h4 class="float-left">Category list</h4>
      </div>
	<div class="col-sm-4">
    <a href="{{ route('category.create') }}" class="btn btn-primary"  type="button">Add Category</a>  
   </div>
	</div>
 
    <div class="row mt-3">
     
      <div class="col">
        <table id="catgoryDatas" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Action</th>
                  </tr>
              </thead>
               <tbody>
               <?php $i=1; ?>
                  @foreach($category as $catData) 
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $catData->name }}</td>
                      <td><a class="btn btn-primary" href="{{ route('category.edit',$catData->id) }}">Edit</a>
                  <form action="{{ route('category.destroy',$catData->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" id="cat_del" class="btn btn-danger">Delete</button>
                  </form>

                    </td>
                   </tr>
                   @endforeach 
                </tbody>
            </table>
            </div>
        </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
   $('#catgoryDatas').DataTable();
   });

</script>
@endsection