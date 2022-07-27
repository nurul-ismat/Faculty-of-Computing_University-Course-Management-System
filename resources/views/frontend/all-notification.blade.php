<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')
<body>
@include('frontend.includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard_title text-center">
                    <h2 class="pt-5"><i class="fa fa-bell"></i> Notification for {{ $data->course->course_name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            @foreach($data->notifications as $notification)
            <div class="col-12 col-md-8 offset-md-2">
                <div class="notification_bar">
                    <ul>
                        <li><span>Topic:</span>&nbsp;{{$notification->topic}}</li>
                        <li><span>Notification:</span>&nbsp;{{$notification->notification_message}}</li>
                        <li><span>Date:</span>&nbsp;{{date('d-m-Y', strtotime($notification->date))}}</li>
                        <li><span>Time:</span>&nbsp;{{date('h:i a', strtotime($notification->time))}}</li>
                      </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
  @include('frontend.includes.footer')
</body> </html>
