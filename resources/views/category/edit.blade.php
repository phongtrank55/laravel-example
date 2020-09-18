@extends('layouts.master')

@section('title', 'Edit Category')

@section('content')
    <h3>Edit category</h3>
    <form action="{{route('category.update', ['id' => $category->id])}}" id="form-create" method="POST" class="form-horizontal" >
        @csrf
        <div class="form-group">
            <label class="control-label col-md-2">
                Name
                <span class="require-field">(*)</span>
            </label>
            <div class="col-md-3">
                <input type="text" id='name' name="name" value="{{$errors->any() ? old('name') : $category->name}}" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">
                Slug: 
                <span class="require-field">(*)</span>
            </label>
            <div class="col-md-5">
                <input type="text" name="slug" id="slug" readonly class="form-control" value="{{$errors->any() ? old('slug') : $category->slug}}">
            </div>
        </div>
         
        <div class="form-group">
            <label class="control-label col-md-2">
                Description:
            </label>
            <div class="col-md-10">
                <input type="text" name="description" value = "{{$errors->any() ? old('description') : $category->description}}" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </form>
</div>
<!-- box body -->
</div>
@stop

@section('js')

    <script type="text/javascript" src="{{ asset('common/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('common/js/additional-methods.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('common/js/slug.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('#name').keyup(function(e){
                // console.log(e.target.value);
                // alert($(this).val());
                $('#slug').val(toSlug(e.target.value));
            });
            $('form#form-create').validate({ // initialize the plugin

                rules: {
                    name: {
                        required: true
                    },
                    slug: {
                        required: true
                    },
                },
                messages: {
                    name: "Name can't be empty!",
                    slug: "Slug can't be empty!",
                }

            });        
        });

    </script>
@endsection
