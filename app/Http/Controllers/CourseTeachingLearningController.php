<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseTeachingLearning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseTeachingLearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title                      = 'Course Teaching & Learning';
        $courses                    = Course::all();
        $courseteachinglearnings    = CourseTeachingLearning::orderBy('id', 'DESC')->get();
        $count                      = CourseTeachingLearning::count(); 

        $data =[
            'title'                     => $title,
            'courses'                   => $courses,
            'courseteachinglearnings'   => $courseteachinglearnings,
            'count'                     => $count
        ];

        $data = (object)$data;

        return view('dashboard.course_teaching_learning', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'lecture_notes'         => 'required',
            'teaching_activities'   => 'required',
            'course_name'           => 'required',
            'status'                => 'required'
       ]);

        $courseteachinglearning             = new CourseTeachingLearning();

        $courseteachinglearning->course_name      = $request->course_name;
        $courseteachinglearning->status           = $request->status;

        if($request->hasfile('lecture_notes')){
            $path = $request->file('lecture_notes')->store('/public/file/courseteachinglearning');
            $path = explode('/' , $path);
            $path = end($path);
            $courseteachinglearning->lecture_notes = $path;
        }

        if($request->hasfile('teaching_activities')){
            $path = $request->file('teaching_activities')->store('/public/file/courseteachinglearning');
            $path = explode('/' , $path);
            $path = end($path);
            $courseteachinglearning->teaching_activities = $path;
        }

        $courseteachinglearning->save();

        return redirect()->route('course_teaching_learning.index')->with('success',
        'Course Teaching Learning Data is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courseteachinglearning = CourseTeachingLearning::findOrFail($id);
        $courseteachinglearning->delete();

        if(isset($courseteachinglearning->lecture_notes) && !empty($courseteachinglearning->lecture_notes)){
            $file = public_path('storage/file/courseteachinglearning/' . $courseteachinglearning->lecture_notes);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($courseteachinglearning->teaching_activities) && !empty($courseteachinglearning->teaching_activities)){
            $file = public_path('storage/file/courseteachinglearning/' . $courseteachinglearning->teaching_activities);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
