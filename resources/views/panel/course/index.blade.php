@extends('panel.master.index')


@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Courses</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
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
                <table class="table  table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>status</th>
                        <th >image</th>
                        <th>isCompleted</th>
                        <th style="width: 10%;" >price</th>
                        <th>create by</th>
                        <th>lase update</th>
                        <th>categories</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->id}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->status}}</td>
                        <td>
                            @if($course->image == null)
                            <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}" style="width: 80px">
                            @else
                                <img alt="Avatar" class="table-avatar" src="{{$course->image}}" style="width: 80px">
                            @endif
                        </td>

                        <td>{{$course->isCompleted}}</td>
                        <td>$ {{$course->price}}</td>
                        <td>{{$course->user->name}}</td>
                        <td>{{$course->updated_at}}</td>
                        <td>
                            @foreach($course->categories as $category)
                                [{{$category->name}}]
                            @endforeach
                        </td>

                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href={{route('course.show' , $course->id)}}>
                                <i class="fas fa-folder"></i>View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('course.edit' , $course->id)}}">
                                <i class="fas fa-pencil-alt"></i>Edit
                            </a>

                            <form action="{{route('course.destroy' , $course->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
{{--            {{$users->links()}}--}}
        </div>
    </section>
@endsection
