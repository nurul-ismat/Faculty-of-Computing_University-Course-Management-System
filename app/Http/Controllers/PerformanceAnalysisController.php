<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseNotification;
use App\FrontUser;
use App\CourseStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PerformanceAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        if(Session::has('front_user')){

            $user               = Session::has('front_user');
            $notifications      = CourseNotification::where( [['course_name', $id],['type', 3]] )->get();
            $course             = Course::findorFail($id);
            $front_users        = FrontUser::all();
            $coursestatistics   = CourseStatistic::where( [['course_name', $id],['student_id', $user]] )->orderBy('id', 'DESC')->get();
    
            $data = [
                'title'             => 'Performance Analysis',
                'notifications'     => $notifications,
                'course'            => $course,
                'front_users'       => $front_users,
                'coursestatistics'  => $coursestatistics
            ];
    
            $data = ( object ) $data;
    
            return view('frontend.performance-analysis', compact('data'));
    
        }
        else{
            return redirect('/');
        }
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
        //
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
        //
    }
}
