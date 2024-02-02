<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    use Upload;


    public function index()
    {
        if (Auth::user()->userHasRole('admin')){
            $courses =  Course::all();
        }else{
            $courses = auth::user()->courses;
        }

        return view('panel.course.index' , compact('courses'));
    }


    public function show(Course $course)
    {
        $episodes = $course->episodes()->latest()->get();
        return view('panel.course.show' , compact('course' , 'episodes'));
    }


    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('panel.course.edit' , compact('course' , 'categories'));
    }


    public function update(CourseRequest $request , Course $course)
    {
        $courseData = $request->validated();
        $course->update($courseData);
        if ($request->hasFile('image')) {
             //remove previous image
            if ($course->image != null) {
                $previousImagePath = storage_path('app/public/course') . '/' . $course->image;
                $this->removeFile($previousImagePath);
                //upload new image and update data
                $course->update([
                    'image' => $this->uploadOneImage($courseData['image'] , 'course')
                ]);
            }
        }

        return to_route('course.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('panel.course.create' , compact('categories'));
    }


    public function store(CourseRequest $request)
    {
        $courseData = $request->validated();
        //upload image course
        $courseData['image'] = $this->uploadOneImage($courseData['image'] , 'course');
        //upload introduction video
        $courseData['introduction'] = $this->uploadVideoCourse($courseData['video'] , 'introduction_course');
        unset($courseData['video']);
        auth()->user()->courses()->create($courseData);
        return to_route('course.index')->with('message' , 'course create successfully');
    }


    public function destroy(Course $course)
    {
        dd($course);
    }

}
