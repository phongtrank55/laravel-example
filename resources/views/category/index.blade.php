@extends('layouts.master')

@section('title', 'Categories')

@section('content')
    <h3>Categories</h3>
    @if(session('alert'))
        <div class="alert alert-{{ session('alert')['type'] }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ session('alert')['title'] }}</strong> {{session('alert')['content']}}
        </div>
    @endif
    <div class="box pull-right">
        <a href="{{ route('category.create') }}" class="btn btn-md btn-primary"><i class="fa fa-plus"></i> Create </a>
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
                    <td>{{ $category->count }}</td>
                    <td>
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-md btn-primary">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <a href="#" class="btn btn-md btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
@endsection