<!--header start-->
<header class="header black-bg">

    <!--logo start-->
    <a href="" class="logo">@yield('content-hedding')</a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <li id="header_notification_bar" class="dropdown">
                <a style ="border:1px solid #4f5c68" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-bell-o"></i>
                    @if(Auth::user()->unreadNotifications()->count())
                    <span class="badge bg-warning">
                        {{Auth::user()->unreadNotifications()->count()}}
                    </span>
                    @endif
                </a>
                <ul class="dropdown-menu extended notification">

                    <li>
                        <p class="yellow">You have {{Auth::user()->unreadNotifications()->count()}} new notifications</p>
                    </li>

                    <li>
                        <a href="{{Route('markAllAsRead')}}">
                           Mark as read All
                        </a>
                    </li>


                    @foreach(Auth::user()->unreadNotifications()->take(5)->get()  as $notification)  
                    <li>
                        <a id="ReadNotification" href="{{$notification->data['route']}}"  data-notif-id="{{$notification->id}}">
                            <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                            {{ $notification->data['message'] }}.<br>
                            <span style="float:right;" class="small italic"> {{ $notification->created_at->diffForHumans() }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                <a class="logout" href = "{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

        <li>
        </ul>
        <ul class="nav pull-right top-menu">
            <li>
                <a class="btn profile" data-id = "{{Auth::user()->id}}" style="margin-top: 15px">
                    {{ Auth::user()->name }}
                </a>
            </li>
        </ul>
    </div>
</header>
<!--header end-->