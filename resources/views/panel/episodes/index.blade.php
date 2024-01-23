@extends('panel.master.index')


@section('content')

    <form action="{{route('episodes.index')}}" method="get">
    <div class="card-body">
        <label>Select Course</label>
        <select  class="form-control" name="course_id">
            <option value="">___</option>
            @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
        </select>
        <button  type="submit" class="btn btn-primary">Select</button>
    </div>
    </form>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Episodes</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">all Episode</h3>
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
                    @foreach($episodes as $episode)
                        <tr>
                            <td>{{$episode->id}}</td>
                            <td>{{$episode->title}}</td>
                            <td>
                                <video width="20%" controls="" height="10%">
                                    <source src="/sessions/{{$episode->video_url}}" type="video/mp4">
                                </video>
                            </td>
                            <td>{{$episode->course->title}}</td>
                            <td class="project-actions">
                                <a class="btn btn-primary btn-sm" href="">
                                    <i class="fas fa-folder"></i>View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{route('episodes.edit', $episode->id)}}">
                                    <i class="fas fa-pencil-alt"></i>Edit
                                </a>

                                <form action="{{route('episodes.destroy' , $episode->id)}}" method="post">
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
                        {{$episodes->links()}}
        </div>
    </section>
@endsection
