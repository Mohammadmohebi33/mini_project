@extends('panel.master.index')



@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>

            <form action="{{ route('users') }}" method="get">
                <div class="row">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="adminCheckbox" name="roles[]" value="admin">
                        <label for="adminCheckbox" class="custom-control-label">ادمین</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="authorCheckbox" name="roles[]" value="author">
                        <label for="authorCheckbox" class="custom-control-label">نویسنده ها</label>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="memberCheckbox" name="roles[]" value="member">
                        <label for="memberCheckbox" class="custom-control-label">کاربر عادی</label>
                    </div>
                </div>
                <button type="submit">ثبت</button>
            </form>

        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">all User</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        UserName
                    </th>
                    <th style="width: 30%">
                        Email
                    </th>
                    <th>
                        avatar
                    </th>
                    <th style="width: 8%" class="text-center">
                        status
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        <a>
                            {{$user->name}}
                        </a>
                        <br>
                        <small>
                            join {{$user->created_at->diffForHumans()}}
                        </small>
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}" style="width: 80px">
                    </td>
                    <td class="project-state">

                        @if($user->status == 'able')
                        <span class="badge badge-success">able</span>
                        @else
                        <span class="badge badge-danger">disable</span>
                        @endif
                    </td>


                    <td class="project-actions text-right">
                        <form method="post" action="{{route('users.restore' , $user->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">restore</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>


        {{--            {{$users->links()}}--}}
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection
