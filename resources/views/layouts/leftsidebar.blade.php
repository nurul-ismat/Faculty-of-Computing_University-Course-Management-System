@php
$permissions = Session::get('permissions');
@endphp

<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="/utm-admin" aria-expanded="false" aria-controls="submenu-1-1"><i
                        class="fas fa-home"></i>{{ __('messages.ln1')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-user-circle"></i>{{ __('messages.ln2')}}<span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-1" aria-controls="submenu-1-1">{{ __('messages.ln3')}}</a>
                                    <div id="submenu-1-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(1,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.index') }} ">{{ __('messages.ln4')}}</a>
                                            </li>
                                            @endif

                                            @if (check(1,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('user.create') }} ">{{ __('messages.ln5')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-2" aria-controls="submenu-1-2">{{ __('messages.ln6')}}</a>
                                    <div id="submenu-1-2" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(2,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('group.index') }}">{{ __('messages.ln7')}}</a>
                                            </li>
                                            @endif
                                            @if (check(2,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('group.create') }}">{{ __('messages.ln8')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-3" aria-controls="submenu-1-3">{{ __('messages.ln9')}}</a>
                                    <div id="submenu-1-3" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(3,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('module.index') }} ">{{ __('messages.ln10')}}</a>
                                            </li>
                                            @endif
                                            @if (check(3,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('module.create') }} ">{{ __('messages.ln11')}}s</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                @if (check(4,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('userlog') }} ">{{ __('messages.ln12')}}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-cogs"></i>{{ __('messages.ln13')}}</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @if (check(5,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('general_view') }}">{{ __('messages.ln14')}}</a>
                                </li>
                                @endif
                                @if (check(6,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user_view') }}">{{ __('messages.ln15')}}</a>
                                </li>
                                @endif
                                @if (check(7,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href=" {{ route('email_view') }} ">{{ __('messages.ln16')}}</a>
                                </li>
                                @endif
                                @if (check(14,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contactsetting.index') }}">{{ __('messages.ln17')}}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-9" aria-controls="submenu-9"><i class="fa fa-fw fa-user-circle"></i>{{ __('messages.ln177')}}</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @if (check(22,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('course.index') }}">{{ __('messages.ln179')}}</a>
                                </li>
                                @endif
                                @if (check(22,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('course.create') }}">{{ __('messages.ln178')}}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-9-1" aria-controls="submenu-9-1">{{ __('messages.ln198')}}</a>
                                    <div id="submenu-9-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(24,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('course_management.index') }} ">{{ __('messages.ln184')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_assessment.index') }} ">{{ __('messages.ln185')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_curriculum.index') }} ">{{ __('messages.ln186')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_teaching_learning.index') }} ">{{ __('messages.ln187')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-10" aria-controls="submenu-10"><i class="fa fa-fw fa-user-circle"></i>{{ __('messages.ln189')}}</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                @if (check(23,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('enrolled_courses.index') }}">{{ __('messages.ln190')}}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-10-1" aria-controls="submenu-10-1">{{ __('messages.ln191')}}</a>
                                    <div id="submenu-10-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(23,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('course_notification.index') }} ">{{ __('messages.ln208')}}</a>
                                            </li>
                                            @endif
                                            @if (check(23,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_notification.create') }} ">{{ __('messages.ln207')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-10-2" aria-controls="submenu-10-2">{{ __('messages.ln195')}}</a>
                                    <div id="submenu-10-2" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(24,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('lecture_slide.create') }} ">{{ __('messages.ln210')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_activities.create') }} ">{{ __('messages.ln211')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-10-3" aria-controls="submenu-10-3">{{ __('messages.ln196')}}</a>
                                    <div id="submenu-10-3" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(24,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('upload_marks.create') }} ">{{ __('messages.ln224')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('upload_marks.index') }} ">{{ __('messages.ln197')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-10-4" aria-controls="submenu-10-4">{{ __('messages.ln198')}}</a>
                                    <div id="submenu-10-4" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(24,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('course_management.index') }} ">{{ __('messages.ln184')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_assessment.index') }} ">{{ __('messages.ln185')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_curriculum.index') }} ">{{ __('messages.ln186')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_teaching_learning.index') }} ">{{ __('messages.ln187')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                @if (check(23,1, $permissions))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('project_proposal.create') }}">{{ __('messages.ln249')}}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-10-5" aria-controls="submenu-10-5">{{ __('messages.ln199')}}</a>
                                    <div id="submenu-10-5" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            @if (check(24,1, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('course_statistic.create') }}">{{ __('messages.ln247')}}</a>
                                            </li>
                                            @endif
                                            @if (check(24,2, $permissions))
                                            <li class="nav-item">
                                                <a class="nav-link" href=" {{ route('course_statistic.index') }} ">{{ __('messages.ln248')}}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
        </ul>
    </div>
    </nav>
</div>
</div>