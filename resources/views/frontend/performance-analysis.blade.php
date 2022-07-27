<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5">Performance analysis for {{ $data->course->course_name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h4>Course Statistic</h4>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 mt-5 bg-light">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs mt-3" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#table">Table</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#chart">Chart</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="table" class="container tab-pane active"><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-light text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Test Name</th>
                                    <th scope="col">Average</th>
                                    <th scope="col">Minimum</th>
                                    <th scope="col">Maximum</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @php
                                  $i = 1;
                                @endphp
                                @foreach ($data->coursestatistics as $coursestatistic)
                                  <tr>
                                    <th scope="row">{{ $i }} @php($i++)</th>
                                    <td>
                                    @foreach($data->notifications as $notification)
                                      @if($notification->id == $coursestatistic->test_name)
                                          {{ $notification->topic }}
                                      @endif
                                    @endforeach
                                    </td>
                                    <td>{{ $coursestatistic->average }}%</td>
                                    <td>{{ $coursestatistic->maximum }}%</td>
                                    <td>{{ $coursestatistic->minimum }}%</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div id="chart" class="container tab-pane fade">
                    @foreach ($data->coursestatistics as $coursestatistic)
                      <h5 class="pt-3">
                        @foreach($data->notifications as $notification)
                            @if($notification->id == $coursestatistic->test_name)
                                {{ $notification->topic }}
                            @endif
                        @endforeach
                      </h5>
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
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
      </div>
    @include('frontend.includes.footer')
</body>
</html>