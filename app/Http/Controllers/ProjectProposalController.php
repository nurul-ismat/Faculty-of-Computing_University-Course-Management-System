<?php

namespace App\Http\Controllers;

use App\Course;
use App\ProjectProposals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProjectProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!check(24,2, session('permissions'))){

            return abort(404);
        }

        $title              = 'Project Proposal';
        $courses            = Course::all();
        $projectproposals   = ProjectProposals::orderBy('id', 'DESC')->get();
        $count              = ProjectProposals::count(); 

        $data =[
            'title'             => $title,
            'courses'           => $courses,
            'projectproposals'  => $projectproposals,
            'count'             => $count
        ];

        $data = (object)$data;

        return view('dashboard.project_proposal', compact(['data']));
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
            'title'                 => 'required',
            //'slug'                => 'unique:pages',
            'course_name'           => 'required',
            'upload_file'           => 'required',
            'status'                => 'required'
       ]);

        $projectproposal                    = new ProjectProposals();

        $projectproposal->title             = $request->title;
        $projectproposal->course_name       = $request->course_name;
        $projectproposal->status            = $request->status;

        if($request->hasfile('upload_file')){
            $path = $request->file('upload_file')->store('/public/file/project_proposals');
            $path = explode('/' , $path);
            $path = end($path);
            $projectproposal->file = $path;
        }

        $projectproposal->save();

        return redirect()->route('project_proposal.create')->with('success',
        'Course Project Proposal Data is Added');
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
        $projectproposal = ProjectProposals::findOrFail($id);
        $projectproposal->delete();

        if(isset($projectproposal->file) && !empty($projectproposal->file)){
            // delete slider image
            $file = public_path('storage/file/project_proposals/' . $projectproposal->file);
            if(File::exists($file)){
                unlink( $file );
            }
        }

        return back();
    }
}
