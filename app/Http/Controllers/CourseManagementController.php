<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title              = 'Course Management';
        $courses            = Course::all();
        $coursemanagements  = CourseManagement::orderBy('id', 'DESC')->get();
        $count              = CourseManagement::count(); 

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'coursemanagements' => $coursemanagements,
            'count'             => $count
        ];

        $data = (object)$data;

        return view('dashboard.course_management', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'appointment_letter'    => 'required',
            'course_survey'         => 'required',
            'minutes_meeting'       => 'required',
            'students_feedback'     => 'required',
            'course_name'           => 'required',
            'status'                => 'required'
       ]);

        $coursemanagement                    = new CourseManagement();

        $coursemanagement->course_name      = $request->course_name;
        $coursemanagement->status           = $request->status;

        if($request->hasfile('appointment_letter')){
            $path = $request->file('appointment_letter')->store('/public/file/coursemanagement');
            $path = explode('/' , $path);
            $path = end($path);
            $coursemanagement->appointment_letter = $path;
        }

        if($request->hasfile('course_survey')){
            $path = $request->file('course_survey')->store('/public/file/coursemanagement');
            $path = explode('/' , $path);
            $path = end($path);
            $coursemanagement->course_survey = $path;
        }

        if($request->hasfile('minutes_meeting')){
            $path = $request->file('minutes_meeting')->store('/public/file/coursemanagement');
            $path = explode('/' , $path);
            $path = end($path);
            $coursemanagement->minutes_meeting = $path;
        }

        if($request->hasfile('students_feedback')){
            $path = $request->file('students_feedback')->store('/public/file/coursemanagement');
            $path = explode('/' , $path);
            $path = end($path);
            $coursemanagement->students_feedback = $path;
        }

        $coursemanagement->save();

        return redirect()->route('course_management.index')->with('success',
        'Course Management Data is Added');
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
        $coursemanagement = CourseManagement::findOrFail($id);
        $coursemanagement->delete();

        if(isset($coursemanagement->appointment_letter) && !empty($coursemanagement->appointment_letter)){
            $file = public_path('storage/file/coursemanagement/' . $coursemanagement->appointment_letter);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($coursemanagement->course_survey) && !empty($coursemanagement->course_survey)){
            $file = public_path('storage/file/coursemanagement/' . $coursemanagement->course_survey);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($coursemanagement->minutes_meeting) && !empty($coursemanagement->minutes_meeting)){
            $file = public_path('storage/file/coursemanagement/' . $coursemanagement->minutes_meeting);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($coursemanagement->students_feedback) && !empty($coursemanagement->students_feedback)){
            $file = public_path('storage/file/coursemanagement/' . $coursemanagement->students_feedback);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
