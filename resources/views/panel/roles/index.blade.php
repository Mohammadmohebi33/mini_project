@extends('panel.master.index')



@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Projects</h3>

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
                            id
                        </th>
                        <th style="width: 20%">
                            Role Name
                        </th>

                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role->id}}
                            </td>
                            <td>
                                <a>
                                    {{$role->role_name}}
                                </a>
                                <br>
                                <small>
                                    join {{$role->created_at->diffForHumans()}}
                                </small>
                            </td>



                            <td class="project-actions text-right">

                                <a class="btn btn-primary btn-sm" href="">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>

                                <form action="{{route('destroyRole' , $role->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash">Delete</i></button>
                                </form>
{{--                                <a class="btn btn-danger btn-sm" href="">--}}
{{--                                    <i class="fas fa-trash">--}}
{{--                                    </i>--}}
{{--                                    Delete--}}
{{--                                </a>--}}

                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </section>
@endsection

