<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class FrontNotificationController extends Controller
{
     public function index($id)
    {
        if(Session::has('front_user')){

        $notifications  = CourseNotification::where( [['course_name', $id],] )->orderBy('id', 'DESC')->get();
        $course         = Course::findorFail($id);

        $data = [
            'title'         => 'Notification',
            'notifications' => $notifications,
            'course'        => $course
        ];

        $data = ( object ) $data;

        return view('frontend.all-notification', compact('data'));

        }
        else{
            return redirect('/');
        }
    }
}
