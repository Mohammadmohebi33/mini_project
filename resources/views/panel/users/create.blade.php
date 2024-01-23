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


                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('storeUser')}}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Emain">
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Pass">
                                </div>
                            </div>


                            <div class="card-body">
                                <label>about me</label>
                                <textarea name="about_me" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>



                            <div class="card-body">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="able">able</option>
                                    <option value="disable">disable</option>
                                </select>
                            </div>


                            <div class="card-body">
                                <label>Select Roles</label>
                                <select multiple="" class="form-control" name="roles[]">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                                    @endforeach

                                </select>
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
