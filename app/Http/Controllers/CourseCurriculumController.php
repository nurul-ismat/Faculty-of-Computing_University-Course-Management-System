<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseCurriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseCurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title              = 'Course Curriculum';
        $courses            = Course::all();
        $coursecurriculums  = CourseCurriculum::orderBy('id', 'DESC')->get();
        $count              = CourseCurriculum::count(); 

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'coursecurriculums' => $coursecurriculums,
            'count'             => $count
        ];

        $data = (object)$data;

        return view('dashboard.course_curriculum', compact(['data']));
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
            'clos_plos'             => 'required',
            'weekly_lecture'        => 'required',
            'course_name'           => 'required',
            'status'                => 'required'
       ]);

        $coursecurriculum                   = new CourseCurriculum();

        $coursecurriculum->course_name      = $request->course_name;
        $coursecurriculum->status           = $request->status;

        if($request->hasfile('clos_plos')){
            $path = $request->file('clos_plos')->store('/public/file/coursecurriculum');
            $path = explode('/' , $path);
            $path = end($path);
            $coursecurriculum->clos_plos = $path;
        }

        if($request->hasfile('weekly_lecture')){
            $path = $request->file('weekly_lecture')->store('/public/file/coursecurriculum');
            $path = explode('/' , $path);
            $path = end($path);
            $coursecurriculum->weekly_lecture = $path;
        }

        $coursecurriculum->save();

        return redirect()->route('course_curriculum.index')->with('success',
        'Course Curriculum Data is Added');
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
        $coursecurriculum = CourseCurriculum::findOrFail($id);
        $coursecurriculum->delete();

        if(isset($coursecurriculum->clos_plos) && !empty($coursecurriculum->clos_plos)){
            $file = public_path('storage/file/coursecurriculum/' . $coursecurriculum->clos_plos);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        if(isset($coursecurriculum->weekly_lecture) && !empty($coursecurriculum->weekly_lecture)){
            $file = public_path('storage/file/coursecurriculum/' . $coursecurriculum->weekly_lecture);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
