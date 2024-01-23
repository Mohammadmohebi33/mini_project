@extends('panel.master.index')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header"><h3 class="card-title">Create <small>Session</small></h3></div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('episodes.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>Select Course</label>
                                <select  class="form-control" name="course_id">
                                    <option value="">___</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="card-body">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option selected value="free">رایگان</option>
                                    <option value="lock">غیر رایگان</option>
                                </select>
                            </div>


                            <div class="card-body">
                                <label for="exampleInputFile">File input</label>
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
