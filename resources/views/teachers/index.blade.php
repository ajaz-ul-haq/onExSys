<x-header/>
<x-navbar/>
<div class='holder' style="margin:100px auto; max-width:60%;">


    <div class="row">
        <div class="col-sm-6 ">
            <a href="/teachers-panel/create">
                <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">Create New</button>
            </a>
        </div>
        <div class="col-sm-6">
            @if(isset($creator))


            <a href="all">
                <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">All Exams</button>
            </a>
                @else
                    <a href="/teachers-panel/dashboard/created-by-me">
                        <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">My Exams</button>
                    </a>
                @endif
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col" >Time</th>
            <th scope="col">Created On</th>
            <th scope="col" class="action-col">Actions</th>
        </tr>
        </thead>
        <tbody>



        @foreach($paper as $paper)
        <tr>
            <th scope="row">{{$paper['class']}}</th>
            <td>{{$paper['subject']}}</td>
            <td>{{$paper['time']}}</td>
            <td>{{$paper['created_at']}}</td>
            <td class="action-col">
                <a href="/teachers-panel/dashboard/view/{{$paper['id']}}"><span style="color:purple" class="glyphicon glyphicon-edit"></span></a>&nbsp
                @if(isset($creator))<a href="/teachers-panel/dashboard/delete/{{$paper['id']}}"><span style="color:red" class="glyphicon glyphicon-trash"></span></a>@endif
            </td>
        </tr>
            @endforeach

        </tbody>
    </table>
</div>
</body>
</html>


