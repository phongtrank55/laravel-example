@extends('layouts.master')

@section('title', 'Categories')

@section('content')
    <h3>Categories</h3>
    <div class="box pull-right">
        <form action="{{route('category.export')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-file-excel-o"></i> Xuất excel</button>
            <a href="{{ route('category.create') }}" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Create </a>
        </form>
        
    </div>

    <br><br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Count</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index+1 }}</td> 
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td></td>
                    <td>
                        <a href="{{ route('category.edit', ['slug' => $category->slug, 'id' => $category->id]) }}" class="btn btn-md btn-primary">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        {{-- <a href="#" class="btn btn-md btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </a> --}}
                        <a class="btn btn-md btn-danger" data-toggle="modal" href="#modal-delete"
                                            data-id = "{{$category->id}}" 
                                            data-title = "{{$category->name}}"> 
                                        <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal Delete Room -->
<div class="modal fade" id="modal-delete" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Warning</h5>
            </div>
            <form method="post" action="{{route('category.delete')}}">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" id="modal-delete-id" name="id">
                    Are you sure delete <strong id="modal-delete-name"></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>	
<!-- End modal Delete Room-->
@endsection

@section('js')
    <script>
          $('#modal-delete').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget) // Button that triggered the modal
            var title = button.data('title'); // Extract info from data-* attributes
            
            var id = button.data('id');
            var title = button.data('title');
            // alert(id);
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this);
        
            modal.find('.modal-body #modal-delete-id').val(id);
            modal.find('.modal-body #modal-delete-name').text(title);
            
        });
    </script>

@endsection