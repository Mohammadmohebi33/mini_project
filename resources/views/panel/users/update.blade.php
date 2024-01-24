@extends('panel.master.index')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update <small>User</small></h3>
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


                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('updateUser' , $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>about me</label>
                                    <textarea name="about_me" class="form-control" rows="3" placeholder="Enter ...">{{$user->about_me}}</textarea>
                            </div>



                            <div class="card-body">
                                <label>Status</label>
                                <select class="form-control" name="status">

                                    <option  @if($user->status == 'able') selected @endif  value="able">able</option>
                                    <option @if($user->status == 'disable') selected @endif value="disable">disable</option>
                                </select>
                            </div>


                            <div class="card-body">
                                @foreach($roles as $role)
                                <div class="custom-control custom-switch">
                                    <input @if($user->userHasRole($role->role_name)) checked @endif  type="checkbox" class="custom-control-input" id="{{$role->id}}" name="roles[]" value="{{$role->id}}">
                                    <label class="custom-control-label" for="{{$role->id}}">{{$role->role_name}}</label>
                                </div>
                                @endforeach
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


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
