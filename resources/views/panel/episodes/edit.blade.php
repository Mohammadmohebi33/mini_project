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

                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('episodes.update' , $session->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">title</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter title" value="{{$session->title}}">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>Select Category</label>
                                <select  class="form-control" name="course_id">
                                    @foreach($courses as $course)
                                        <option
                                            @if($course->title === $session->course->title)
                                                selected
                                            @endif
                                            value="{{$course->id}}">{{$course->title}}</option>
                                    @endforeach
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

