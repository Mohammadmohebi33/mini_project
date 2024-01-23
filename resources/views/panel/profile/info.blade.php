@extends('panel.index')


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


                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('updateProfile', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">email</label>
                                    <input disabled type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Emain" value="{{$user->email}}">
                                </div>
                            </div>



                            <div class="card-body">
                                <label>about me</label>
                                <textarea name="about_me" class="form-control" rows="3" placeholder="Enter ...">{{$user->about_me}}</textarea>
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
                                @if($user->image == null)
                                    <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}" style="width: 180px">
                                @else
                                    <img alt="Avatar" class="table-avatar" src="{{asset('images/'.$user->image)}}" style="width: 180px">
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
