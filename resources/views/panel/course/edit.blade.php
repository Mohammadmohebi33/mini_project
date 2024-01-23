@extends('panel.master.index')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create <small>User</small></h3>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('course.update',  $course->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{$course->title}}">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    @foreach(['active', 'pending', 'inactive'] as $status)
                                        @if($status === $course->status)
                                            <option selected value="{{ $status }}">{{ $status }}</option>
                                        @else
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="card-body">
                                <label>isCompleted</label>
                                <select class="form-control" name="isCompleted">
                                    @foreach(['soon' , 'completed' , 'completing'] as $type)
                                        @if($type === $course->isCompleted)
                                            <option selected value="{{ $type }}">{{ $type }}</option>
                                        @else
                                            <option value="{{$type}}">{{$type}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">price</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" value="{{$course->price}}">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>Select Category</label>
                                <select multiple="" class="form-control" name="category[]">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @foreach($course->categories as $courseCat)
                                                @if($category->id === $courseCat->id)
                                                selected
                                            @endif
                                            @endforeach
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="card-body">
                                <textarea class="form-control" name="description" id="summernote">{{$course->description}}</textarea>
                            </div>


                            <div class="card-body">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>


                                </div>
                                @if($course->image == null)
                                    <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}" style="width: 180px">
                                @else
                                    <img alt="Avatar" class="table-avatar" src="{{asset('images/'.$course->image)}}" style="width: 180px">
                                @endif
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
