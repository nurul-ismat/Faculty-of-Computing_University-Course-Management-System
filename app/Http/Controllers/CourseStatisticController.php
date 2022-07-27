<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseNotification;
use App\FrontUser;
use App\CourseStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CourseStatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title              = 'Course Statistic';
        $notifications      = CourseNotification::where( [['type', 3],] )->get();
        $courses            = Course::all();
        $front_users        = FrontUser::all();
        $coursestatistics   = CourseStatistic::all();

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'notifications'     => $notifications,
            'front_users'       => $front_users,
            'coursestatistics'  => $coursestatistics
        ];

        $data = (object)$data;

        return view('dashboard.view_course_statistics', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title          = 'Course Statistic';
        $notifications  = CourseNotification::where( [['type', 3],] )->get();
        $courses        = Course::all();
        $front_users    = FrontUser::all();

        $data =[
            'title'         => $title,
            'courses'       => $courses,
            'notifications' => $notifications,
            'front_users'   => $front_users,
        ];

        $data = (object)$data;

        return view('dashboard.course_statistic', compact(['data']));
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
            'course_name'           => 'required',
            'test_name'             => 'required',
            'student_id'            => 'required',
            'average'               => 'required',
            'maximum'               => 'required',
            'minimum'               => 'required',
            'status'                => 'required'
       ]);

        $coursestatistic                = new CourseStatistic();

        $coursestatistic->course_name   = $request->course_name;
        $coursestatistic->test_name     = $request->test_name;
        $coursestatistic->student_id    = $request->student_id;
        $coursestatistic->average       = $request->average;
        $coursestatistic->maximum       = $request->maximum;
        $coursestatistic->minimum       = $request->minimum;
        $coursestatistic->status        = $request->status;

        $coursestatistic->save();

        return redirect()->route('course_statistic.create')->with('success',
        'Course Statistic Data is Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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
        //
    }
}
