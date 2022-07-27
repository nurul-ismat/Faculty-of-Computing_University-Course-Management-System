<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
@php 
$user = Session::has('front_user')
@endphp 
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">Activities for {{ $data->course->course_name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
               <div class="assignment">
                    <div class="assignment-list">
                        <h4 class="text-center mt-3">Assignment Lists</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Assignment Name</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @php
                                  $i = 1;
                                @endphp
                                @foreach($data->courseassessments as $courseassessment)
                                  <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>Assignment-{{ $i }} @php ($i++) @endphp</td>
                                    <td>
                                    <iframe src="{{ asset('storage/file/courseassessment/'.$courseassessment->assignments) }}" width="100%" height="260">
                                      <a href="{{ asset('storage/file/courseassessment/'.$courseassessment->assignments) }}">Download PDF</a>
                                    </iframe>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                              </table>
                        </div>
                        <h4 class="text-center">Assignment Upload or Done Lists</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Assignment Name</th>
                                    <th scope="col">Assignment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                      $i = 1;
                                    @endphp
                                    @foreach($data->courseassessments as $courseassessment)
                                    <th scope="row">{{ $i }}</th>
                                    <td>Assignment-{{ $i }} @php ($i++) @endphp</td>
                                    <td>
                                      @foreach($data->uploadassignments as $uploadassignment)
                                      <iframe src="{{ asset('storage/file/uploaded_assignment/'.$uploadassignment->upload) }}" width="210px" height="260px">
                                        <a href="{{ asset('storage/file/uploaded_assignment/'.$uploadassignment->upload) }}">Download PDF</a>
                                      </iframe>
                                      @endforeach
                                    </td>
                                    <td>
                                      @foreach($data->uploadassignments as $uploadassignment)
                                        @if($uploadassignment->status == 1)
                                          <h6>Done</h6>
                                          @else
                                          <h6>Pending</h6>
                                        @endif
                                      @endforeach
                                    </td>
                                    <td>
                                        <form action="{{route('upload_assignment.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="upload" class="form-control" require>
                                            <input type="hidden" name="user_id" value="{{ $user }}">
                                            <input type="hidden" name="assignment_id" value="{{ $courseassessment->id }}">
                                            <input type="hidden" name="course_id" value="{{ $data->course->id }}">
                                            <button class="btn btn-info btn-sm mt-3" type="submit"><i class="fa fa-upload"></i> Upload</button>
                                        </form>
                                    </td>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
               </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="project-lists">
                    <h4 class="text-center mt-3">Project Proposal</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-light text-center">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                  $i = 1;
                                @endphp 
                              @foreach($data->projectproposals as $projectproposal)
                                <tr>
                                  <th scope="row">{{ $i }} @php ($i++) @endphp</th>
                                  <td>{{ $projectproposal->title }}</td>
                                  <td>
                                  <iframe src="{{ asset('storage/file/project_proposals/'.$projectproposal->file) }}" width="100%" height="260">
                                      <a href="{{ asset('storage/file/project_proposals/'.$projectproposal->file) }}">Download PDF</a>
                                    </iframe>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                    <h4 class="text-center">Project Upload or Done Lists</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @php
                                    $i = 1;
                                  @endphp
                                  @foreach($data->projectproposals as $projectproposal)
                                  <tr>
                                    <th scope="row">{{ $i }} @php ($i++) @endphp</th>
                                    <td>{{ $projectproposal->title }}</td>
                                    <td>
                                    @foreach($data->uploadprojects as $uploadproject)
                                      <iframe src="{{ asset('storage/file/uploaded_project/'.$uploadproject->upload) }}" width="210px" height="260px">
                                        <a href="{{ asset('storage/file/uploaded_project/'.$uploadproject->upload) }}">Download PDF</a>
                                      </iframe>
                                      @endforeach
                                    </td>
                                    <td>
                                    @foreach($data->uploadprojects as $uploadproject)
                                        @if($uploadproject->status == 1)
                                          <h6>Done</h6>
                                          @else
                                          <h6>Pending</h6>
                                        @endif
                                      @endforeach
                                    </td>
                                    <td>
                                        <form action="{{route('upload_project.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="upload" class="form-control" require>
                                            <input type="hidden" name="user_id" value="{{ $user }}">
                                            <input type="hidden" name="project_id" value="{{ $projectproposal->id }}">
                                            <input type="hidden" name="course_id" value="{{ $data->course->id }}">
                                            <button class="btn btn-info btn-sm mt-3" type="submit"><i class="fa fa-upload"></i> Upload</button>
                                        </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                </div>
            </div>
        </div>
      </div>
    @include('frontend.includes.footer')
</body>
</html>