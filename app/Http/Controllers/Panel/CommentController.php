<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function index()
    {
        if (auth()->user()->userHasRole('admin')){
            $comments = Comment::query()->where('status' , 'pending')->latest()->paginate(30);
        }else{
            foreach (\auth()->user()->courses as $course)
            {
                $comments = $course->comments()->where('status' , 'pending')->latest()->paginate(30);
            }
        }
        return view('panel.comments.index' , compact('comments'));
    }





    public function activeComments()
    {
        if (auth()->user()->userHasRole('admin')){
            $comments = Comment::query()->where('status' ,'active')->latest()->paginate(30);
        }else{
            foreach (\auth()->user()->courses as $course)
            {
                $comments = $course->comments()->where('status' , 'active')->latest()->paginate(30);
            }
        }

        return view('panel.comments.index' , compact('comments'));
    }




    public function rejectComments()
    {
        if (auth()->user()->userHasRole('admin')){
            $comments = Comment::query()->where('status' , 'deactivate')->latest()->paginate(30);
        }else{
            foreach (\auth()->user()->courses as $course)
            {
                $comments = $course->comments()->where('status' , 'deactivate')->latest()->paginate(30);
            }
        }
        return view('panel.comments.index' , compact('comments'));
    }



    public function changeStatus(Comment $comment , string $status)
    {
        if ($status == Comment::CONFIRM){
            $comment->update([
                'status' => 'active'
            ]);
        }elseif ($status == Comment::REJECT){
            $comment->update([
                'status' => 'deactivate',
            ]);
        }

        return back();
    }
}
