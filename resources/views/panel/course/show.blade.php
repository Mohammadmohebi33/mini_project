@extends('panel.master.index')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>E-commerce</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">E-commerce</li>
                    </ol>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{$course->title}}</h3>
                            <div class="col-12">
                                @if($course->image != null)
                                <img src="{{$course->image}}" class="product-image" alt="Product Image">
                                @else
                                    <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$course->title}}</h3>
                            {!! $course->description !!}
                            <hr>
                            <h4>Categories</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach($course->categories as $category)

                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked="">
                                    {{$category->name}}
                                    <br>
                                </label>
                                @endforeach
                            </div>


                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    ${{$course->price}}
                                </h2>
                            </div>

                            <div class="mt-4">
                                <div class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    {{$course->like}}
                                </div>
                                <div class="btn btn-default btn-lg btn-flat">
                                    {{$course->isCompleted}}
                                </div>
                                <div class="btn btn-default btn-lg btn-flat">
                                    {{$course->status}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                                <a class="nav-item nav-link" id="users" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Rating</a>

                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {!! $course->description !!}
                            </div>
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
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
                                            @foreach($course->comments as $comment)
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
{{--                                    {{$comments->links()}}--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
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
                                                <th style="width: 30%">title</th>
                                                <th>video</th>
                                                <th>course</th>
                                                <th>action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($episodes as $session)
                                                <tr>
                                                    <td>{{$session->id}}</td>
                                                    <td>{{$session->title}}</td>
                                                    <td>
                                                        <video width="20%" controls="" height="10%">
                                                            <source src="/sessions/{{$session->video_url}}" type="video/mp4">
                                                        </video>
                                                    </td>
                                                    <td>{{$session->course->title}}</td>
                                                    <td class="project-actions">
                                                        <a class="btn btn-primary btn-sm" href="">
                                                            <i class="fas fa-folder"></i>View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="{{route('episodes.edit', $session->id)}}">
                                                            <i class="fas fa-pencil-alt"></i>Edit
                                                        </a>

                                                        <form action="{{route('episodes.destroy' , $session->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    {{--                                {{$sessions->links()}}--}}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="users">
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
                                            <tr>
{{--                                            @foreach($course->purchase as $purchases)--}}

{{--                                                    <td>--}}
{{--                                                        {{$purchases->user->id}}--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <a>--}}
{{--                                                            {{$purchases->user->name}}--}}
{{--                                                        </a>--}}
{{--                                                        <br>--}}
{{--                                                        <small>--}}
{{--                                                            join {{$purchases->user->created_at->diffForHumans()}}--}}
{{--                                                        </small>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        {{$purchases->user->email}}--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}" style="width: 80px">--}}
{{--                                                    </td>--}}
{{--                                                    <td class="project-state">--}}

{{--                                                        @if($purchases->user->status == 'able')--}}
{{--                                                            <span class="badge badge-success">able</span>--}}
{{--                                                        @else--}}
{{--                                                            <span class="badge badge-danger">disable</span>--}}
{{--                                                        @endif--}}
{{--                                                    </td>--}}
{{--                                                    <td class="project-actions text-right">--}}
{{--                                                        <a class="btn btn-primary btn-sm" href="{{route('showUser' , $purchases->user->id)}}">--}}
{{--                                                            <i class="fas fa-folder">--}}
{{--                                                            </i>--}}
{{--                                                            View--}}
{{--                                                        </a>--}}
{{--                                                        <a class="btn btn-info btn-sm" href="{{route('showUser' , $purchases->user->id)}}">--}}
{{--                                                            <i class="fas fa-pencil-alt">--}}
{{--                                                            </i>--}}
{{--                                                            Edit--}}
{{--                                                        </a>--}}


{{--                                                        <form action="{{route('deleteUser' , $purchases->user->id)}}" method="post">--}}
{{--                                                            @csrf--}}
{{--                                                            @method('DELETE')--}}
{{--                                                            <button class="btn btn-danger btn-sm">Delete</button>--}}
{{--                                                        </form>--}}

{{--                                                    </td>--}}
{{--                                                    @endforeach--}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                {{--            {{$users->links()}}--}}
                                <!-- /.card-body -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
