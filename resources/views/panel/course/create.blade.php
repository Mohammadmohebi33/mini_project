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


                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('course.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="active">active</option>
                                    <option selected value="pending">pending</option>
                                    <option value="inactive">inactive</option>
                                </select>
                            </div>


                            <div class="card-body">
                                <label>Status</label>
                                <select class="form-control" name="isCompleted">
                                    <option selected value="soon">soon</option>
                                    <option value="completed">completed</option>
                                    <option value="completing">completing</option>
                                </select>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">price</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>Select Category</label>
                                <select multiple="" class="form-control" name="category[]">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="card-body">
                                <textarea class="form-control" name="description" id="summernote"></textarea>
                            </div>


                            <div class="card-body">
                                <label for="exampleInputFile">Image course</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <label for="exampleInputFile">introduction video</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="video" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
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
