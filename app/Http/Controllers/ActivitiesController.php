<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseAssessment;
use App\ProjectProposals;
use App\UploadAssignment;
use App\UploadProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ActivitiesController extends Controller {
	
    public function index($id) {

        if(Session::has('front_user')){

        $user               = Session::has('front_user');

        $course             = Course::findorFail($id);
        $courseassessments  = CourseAssessment::where( [['course_name', $id],] )->get();
        $ass_id             = $courseassessments->toArray();

        foreach($ass_id as $assment_id){

            $assignment_id  = $assment_id["id"];

        }
        
        $projectproposals   = ProjectProposals::where( [['course_name', $id],] )->get();
        $pro_id             = $projectproposals->toArray();

        foreach($pro_id as $proje_id){

            $project_id  = $proje_id["id"];

        }
        $uploadassignments  = UploadAssignment::where( [['course_id', $id],['user_id', $user],['assignment_id', isset($assignment_id)]]  )->orderBy('id', 'DESC')->get();
        $uploadprojects     = UploadProject::where( [['course_id', $id],['user_id', $user],['project_id', isset($project_id)]]  )->orderBy('id', 'DESC')->get();

        $data = [
            'title'             => 'Course Activities',
            'course'            => $course,
            'courseassessments' => $courseassessments,
            'projectproposals'  => $projectproposals,
            'uploadassignments' => $uploadassignments,
            'uploadprojects'    => $uploadprojects
        ];

        $data = ( object ) $data;

        return view( 'frontend.activities', compact( 'data' ) );

        }else{
            return redirect('/');
        }
    }
}
