@extends('panel.master.index')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create <small>Role</small></h3>
                        </div>


                        <form id="quickForm" novalidate="novalidate" method="post" action="{{route('storeRole')}}">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Role name</label>
                                    <input type="text" name="role_name" class="form-control" id="exampleInputEmail1" placeholder="Enter role">
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
