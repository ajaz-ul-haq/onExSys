<x-header/>
<x-navbar/>
<div class="container holder">
    <div class="row" style="border-bottom: 1px solid grey">
        <div class="col-sm-4 col-md-4">
            <a href="/admin-panel/dashboard/admins">
                <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">Admins</button>
            </a>
        </div>
        <div class="col-sm-4 col-md-4">
                <a href="/admin-panel/dashboard/teachers">
                    <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">Teachers List</button>
                </a>
        </div>
        <div class="col-sm-4 col-md-4">
            <a href="/admin-panel/dashboard/students">
                <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">Students List</button>
            </a>
        </div>
    </div>
    <div class="row">
        @if(isset($admin))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            D.O.B
                        </th>
                        <th>
                            Registered On
                        </th>
                        <th class="action-col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($admin as $admin)
                    <tr>
                        <td>
                            {{$admin['name']}}
                        </td>
                        <td>
                            {{$admin['username']}}
                        </td>
                        <td>
                            {{$admin['email']}}
                        </td>
                        <td>
                            {{$admin['dob']}}
                        </td>
                        <td>
                            {{$admin['created_at']}}
                        </td>
                        <td class="action-col">
                            <a href="/admin-panel/dashboard/admin/edit/{{$admin['id']}}"><span style="color:purple" class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(isset($teacher))
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        D.O.B
                    </th>
                    <th>
                        Registered On
                    </th>
                    <th class="action-col">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($teacher as $teacher)
                    <tr>
                        <td>
                            {{$teacher['name']}}
                        </td>
                        <td>
                            {{$teacher['username']}}
                        </td>
                        <td>
                            {{$teacher['email']}}
                        </td>
                        <td>
                            {{$teacher['dob']}}
                        </td>
                        <td>
                            {{$teacher['created_at']}}
                        </td>
                        <td class="action-col">
                            <a href="/admin-panel/dashboard/teacher/edit/{{$teacher['id']}}"><span style="color:purple" class="glyphicon glyphicon-edit"></span></a>&nbsp
                            <a href="/admin-panel/dashboard/teacher/delete/{{$teacher['id']}}"><span style="color:red" class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(isset($student))
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Class
                    </th>
                    <th>
                        Roll No
                    </th>
                    <th>
                        D.O.B
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Created at
                    </th>
                    <th class="action-col">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($student as $student)
                    <tr>
                        <td>
                            {{$student['name']}}
                        </td>
                        <td>
                            {{$student['class']}}
                        </td>
                        <td>
                            {{$student['rollno']}}
                        </td>

                        <td>
                            {{$student['dob']}}
                        </td>
                        <td>
                            {{$student['email']}}
                        </td>
                        <td>
                            {{$student['created_at']}}
                        </td>
                        <td class="action-col">
                            <a href="/admin-panel/dashboard/student/edit/{{$student['id']}}"><span style="color:purple" class="glyphicon glyphicon-edit"></span></a>&nbsp
                            <a href="/admin-panel/dashboard/student/delete/{{$student['id']}}"><span style="color:red" class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
<div class="container holder ">
    <div class="row" style="border-bottom: 1px solid grey">
        <div class="col-md-12">
                <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">All Exams</button>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
               <tr>
                   <th>Class</th>
                   <th>Subject</th>
                   <th>Time </th>
                   <th>Created On</th>
                   <th>Creator</th>
                   <th class="action-col">Actions</th>
               </tr>
            </thead>
            <tbody>
               @foreach($paper as $paper)
                   <tr>
                       <td>{{$paper['class']}}</td>
                       <td>{{$paper['subject']}}</td>
                       <td>{{$paper['time']}}</td>
                       <td>{{$paper['created_at']}}</td>
                       <td>{{$paper['creator']}}</td>

                       <td class="action-col">
                           <a href="/admin-panel/dashboard/view-exam/{{$paper['id']}}"><span style="color:purple" class="glyphicon glyphicon-edit"></span></a>&nbsp
                           <a href="/admin-panel/dashboard/delete-exam/{{$paper['id']}}"><span style="color:red" class="glyphicon glyphicon-trash"></span></a>
                       </td>
                   </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-footer/>

