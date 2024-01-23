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
                        <th style="width: 30%">comment</th>
                        <th>user name</th>
                        <th>status</th>
                        <th>course name</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->body}}</td>

                            <td>{{$comment->user->name}}</td>
                            <td>{{$comment->status}}</td>
                            <td>{{$comment->course->title}}</td>
                            <td class="project-actions">
                                <a class="btn btn-primary btn-sm" href="">
                                    <i class="fas fa-folder"></i>View
                                </a>


                                @if($comment->status == 'pending')
                                <form action="{{route('comment.status', [$comment->id , 'confirm'])}}" method="post">
                                    @csrf
                                    <button class="btn btn-success btn-sm">confirm</button>
                                </form>

                                <form action="{{route('comment.status', [$comment->id , 'reject'])}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">reject</button>
                                </form>

                                @elseif($comment->status == 'active')

                                    <form action="{{route('comment.status', [$comment->id , 'reject'])}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">reject</button>
                                    </form>
                                @else

                                    <form action="{{route('comment.status', [$comment->id , 'confirm'])}}" method="post">
                                        @csrf
                                        <button class="btn btn-success btn-sm">confirm</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            {{$comments->links()}}
        </div>
    </section>
@endsection
