<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title              = 'Course Assessment';
        $courses            = Course::all();
        $courseassessments  = CourseAssessment::orderBy('id', 'DESC')->get();
        $count              = CourseAssessment::count(); 

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'courseassessments' => $courseassessments,
            'count'             => $count
        ];

        $data = (object)$data;

        return view('dashboard.course_assessment', compact(['data']));
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
            'course_name'       => 'required',
            'status'            => 'required'
       ]);

        $courseassessment                    = new CourseAssessment();

        $courseassessment->course_name      = $request->course_name;
        $courseassessment->status           = $request->status;

        if($request->hasfile('assignments')){
            $path = $request->file('assignments')->store('/public/file/courseassessment');
            $path = explode('/' , $path);
            $path = end($path);
            $courseassessment->assignments = $path;
        }

        if($request->hasfile('student_progress')){
            $path = $request->file('student_progress')->store('/public/file/courseassessment');
            $path = explode('/' , $path);
            $path = end($path);
            $courseassessment->student_progress = $path;
        }

        if($request->hasfile('final_exam')){
            $path = $request->file('final_exam')->store('/public/file/courseassessment');
            $path = explode('/' , $path);
            $path = end($path);
            $courseassessment->final_exam = $path;
        }

        if($request->hasfile('marking_scheme')){
            $path = $request->file('marking_scheme')->store('/public/file/courseassessment');
            $path = explode('/' , $path);
            $path = end($path);
            $courseassessment->marking_scheme = $path;
        }

        if($request->hasfile('transcripts')){
            $path = $request->file('transcripts')->store('/public/file/courseassessment');
            $path = explode('/' , $path);
            $path = end($path);
            $courseassessment->transcripts = $path;
        }

        $courseassessment->save();

        return redirect()->route('course_assessment.index')->with('success',
        'Course Assessment Data is Added');
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
        $courseassessment = CourseAssessment::findOrFail($id);
        $courseassessment->delete();

        if(isset($courseassessment->assignments) && !empty($courseassessment->assignments)){
            $file = public_path('storage/file/courseassessment/' . $courseassessment->assignments);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($courseassessment->student_progress) && !empty($courseassessment->student_progress)){
            $file = public_path('storage/file/courseassessment/' . $courseassessment->student_progress);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($courseassessment->final_exam) && !empty($courseassessment->final_exam)){
            $file = public_path('storage/file/courseassessment/' . $courseassessment->final_exam);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($courseassessment->marking_scheme) && !empty($courseassessment->marking_scheme)){
            $file = public_path('storage/file/courseassessment/' . $courseassessment->marking_scheme);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($courseassessment->transcripts) && !empty($courseassessment->transcripts)){
            $file = public_path('storage/file/courseassessment/' . $courseassessment->transcripts);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
