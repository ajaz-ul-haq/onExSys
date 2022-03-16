<nav style="border-bottom:1px solid green" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Online Examination System</a>
        </div>
        <ul class="nav navbar-nav navbar-right">

            @if(Session::has('email'))
                @if(Session::get('email')==App\Models\Admin::find(1)['email'])
                    <li class="nav-item">


                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            @if(count(App\Models\Admin::find(1)->unreadNotifications)>0)
                                <span style="color:red; font-size:130%;">*</span><span class="glyphicon glyphicon-bell"></span> Notifications
                            @else
                                <span class="glyphicon glyphicon-bell"></span> Notifications
                            @endif
                        </a>
                        <ul class="dropdown-menu" style="color:black; border:1px solid green; border-radius:5%; min-width:300px; padding:10px; background-color:lightgrey; ">
                            @if(count(App\Models\Admin::find(1)->notifications)>0)
                            <span style="float:right;"><a href='admin-panel/dashboard/deleteAllNotifications' style="color:red;">Delete All</a></span>
                            @foreach(App\Models\Admin::find(1)->notifications as $notification)
                                @if($notification['read_at']!=NULL)
                                      <li style="border-bottom: 1px solid green; padding-top: 8px;"><strong><em>{{$notification['data']['name']}}</em></strong> just signed up as a <b><em>{{$notification['data']['type']}}</em> </b></li>
                                @else
                                <li style="border-bottom: 1px solid green; padding-top: 8px;"><strong><em><span style="color:red;">*</span> {{$notification['data']['name']}}</em></strong> just signed up as a <b><em>{{$notification['data']['type']}}</em> </b></li>
                                @endif
                                    {{$notification->markAsRead()}}
                            @endforeach
                            @else
                                <li style="border-bottom: 1px solid green; padding-top: 8px;"><em>No new notification</em> </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li><a href="/exit"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspLog Out</a></li>
            @else
                <li><a href="/"><span class="glyphicon glyphicon-log-in"></span>&nbsp&nbspLogin</a></li>
            @endif
        </ul>
    </div>
</nav>
