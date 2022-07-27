@php
$permissions = Session::get('permissions');
@endphp
@include("layouts.header")

<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    @include("layouts.navbar")
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    @include("layouts.leftsidebar")
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title text-primary">{{ __('messages.ln248')}} </h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kt-admin"
                                            class="breadcrumb-link">{{ __('messages.ln1')}}</a></li>
                                    <li class="breadcrumb-item active">{{ __('messages.ln248')}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h4 class="card-header text-success"> 
                        {{ __('messages.ln248')}}
                        </h4>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Table</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Chart</a>
                                </div>
                            </nav>
                            
                            <div class="tab-content" id="nav-tabContent">
                            <div class="table-responsive tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-bordered text-center mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __('messages.ln40')}}</th>
                                            <th scope="col">{{ __('messages.ln182')}}</th>
                                            <th scope="col">{{ __('messages.ln226')}}</th>
                                            <th scope="col">{{__('messages.ln227')}}</th>
                                            <th scope="col">{{__('messages.ln244')}}</th>
                                            <th scope="col">{{__('messages.ln245')}}</th>
                                            <th scope="col">{{__('messages.ln246')}}</th>
                                            <th scope="col">{{ __('messages.ln43')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($data->coursestatistics as $coursestatistic)
                                        <tr>
                                            <th scope="row"> {{ $i }} @php($i++)</th>
                                            <td>
                                                @foreach($data->courses as $course)
                                                    @if($course->id == $coursestatistic->course_name)
                                                        {{ $course->course_name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($data->notifications as $notification)
                                                    @if($notification->id == $coursestatistic->test_name)
                                                        {{ $notification->topic }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($data->front_users as $front_user)
                                                    @if($front_user->id == $coursestatistic->student_id)
                                                        {{ $front_user->username }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $coursestatistic->average }}</td>
                                            <td>{{ $coursestatistic->maximum }}</td>
                                            <td>{{ $coursestatistic->minimum }}</td>
                                            <td>
                                                @if($coursestatistic->status == 1)
                                                <button class="btn btn-success btn-sm">Publish</button>
                                                @elseif($coursestatistic->status == 0)
                                                <button class="btn btn-danger btn-sm">Unpublish</button>
                                                @else
                                                <h6> Status Not Found </h6>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                
                            @foreach ($data->coursestatistics as $coursestatistic)
                                <div class="container mt-3">
                                    <h4>Course Name:
                                        @foreach($data->courses as $course)
                                            @if($course->id == $coursestatistic->course_name)
                                                {{ $course->course_name }}
                                            @endif
                                        @endforeach
                                    </h4>
                                    <p class="d-inline-block">Test Name:
                                        @foreach($data->notifications as $notification)
                                            @if($notification->id == $coursestatistic->test_name)
                                                {{ $notification->topic }}
                                            @endif
                                        @endforeach
                                    </p>
                                    <span>-</span> 
                                    <p class="d-inline-block">Student ID:
                                        @foreach($data->front_users as $front_user)
                                            @if($front_user->id == $coursestatistic->student_id)
                                                {{ $front_user->username }}
                                            @endif
                                        @endforeach
                                    </p>
                                    <div class="p-2" style="border-left:1px solid #ddd;border-bottom:1px solid #ddd;">
                                    <div class="progress mb-2" style="height:30px; font-size:16px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-dark" style="width:{{ $coursestatistic->average }}%; height:30px;">Average {{ $coursestatistic->average }}%</div>
                                    </div>
                                    <div class="progress mb-2" style="height:30px; font-size:16px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:{{ $coursestatistic->maximum }}%; height:30px;">Maximum {{ $coursestatistic->maximum }}%</div>
                                    </div>
                                    <div class="progress mb-2" style="height:30px; font-size:16px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:{{ $coursestatistic->minimum }}%; height:30px;">Minimum {{ $coursestatistic->minimum }}%</div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="w-25 mx-auto">
                        {{-- $data->users->links() --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include("layouts.footer")
