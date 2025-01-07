@extends('layouts.master')
@section('content')
<li class="nav-item dropdown noti-dropdown me-2">
    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
        <img src="{{ URL::to('assets/img/icons/header-icon-05.svg') }}" alt="">
    </a>
    <div class="dropdown-menu notifications">
        <div class="topnav-dropdown-header">
            <span class="notification-title">Notifications</span>
            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
        </div>
        <div class="noti-content">
            <ul class="notification-list">
                @foreach($messages as $message)
                    <li class="notification-message">
                        <a href="#">
                            <div class="media d-flex">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="{{ URL::to('assets/img/logo-small.png') }}">
                                </span>
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details">
                                        <span class="noti-title">{{ $message->name }}</span> has sent a message
                                    </p>
                                    <p class="noti-time">
                                        <span class="notification-time">{{ $message->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</li>
@endsection
