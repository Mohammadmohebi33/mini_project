@extends('panel.master.index')


@section('content')
    <form action="{{route('category.update' , $category->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
            <label for="exampleInputEmail1">category</label>
            <input name="category" type="text" class="form-control" id="exampleInputEmail1" placeholder="category name" value="{{$category->name}}">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
