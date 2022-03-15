<x-header/>
<x-navbar/>
<div class='holder' style="margin:100px auto; max-width:60%;">


    <div class="row">
        <div class="col-sm-6 ">
            <a href="/student-panel/dashboard/submitted">
                <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">My Submission</button>
            </a>
        </div>
        <div class="col-sm-6">
            @if(isset($user))
                <a href="all">
                    <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">All Exams</button>
                </a>
            @else
                <a href="/student-panel/dashboard/for-me">
                    <button type="button" class="switch-bar btn btn-secondary btn-lg btn-block">My Exams</button>
                </a>
            @endif
        </div>
    </div>



    @if(isset($responded))
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Class</th>
                <th scope="col">Subject</th>
                <th scope="col">Time</th>
                <th scope="col">Submitted On</th>
                <th class="action-col">Marks Obtained</th>
            </tr>
            </thead>

            <tbody>
            @foreach($paper as $paper)
                @if(DB::table('marks')->where('paper_id','=',$paper['id'])->where('student_id','=',DB::table('students')->where('email','=',Session::get('email'))->value('id'))->exists())
                <tr>
                    <th scope="row">{{$paper['class']}}</th>
                    <td>{{$paper['subject']}}</td>
                    <td>{{$paper['time']}}</td>
                    <td>{{DB::table('marks')->where('paper_id','=',$paper['id'])->where('student_id','=',DB::table('students')->where('email','=',Session::get('email'))->value('id'))->value('created_at')}}</td>
                    <th class="action-col">{{DB::table('marks')->where('paper_id','=',$paper['id'])->where('student_id','=',DB::table('students')->where('email','=',Session::get('email'))->value('id'))->value('marks')}}%</th>
                </tr>
                @else
                    <em>No Submission Yet...</em>
                    @endif
                @endforeach

            </tbody>
        </table>
    @else

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col" >Time</th>
            <th scope="col">Created On</th>
            <th scope="col">Total Questions</th>
            @if(isset($user))<th class="action-col">Actions</th>@endif
        </tr>
        </thead>
        <tbody>



        @foreach($paper as $paper)
            <tr>
                <th scope="row">{{$paper['class']}}</th>
                <td>{{$paper['subject']}}</td>
                <td>{{$paper['time']}}</td>
                <td>{{$paper['created_at']}}</td>
                <td>{{count(App\Models\Paper::find($paper['id'])->getQuestion)}}</td>
                @if(isset($user))
                <td class="action-col">
                    @if(DB::table('marks')->where('paper_id','=',$paper['id'])->where('student_id','=',DB::table('students')->where('email','=',Session::get('email'))->value('id'))->exists())
                        <button type="button" class="btn btn-seconary" disabled><em>Submitted</em></button></a>
                    @else
                    <a href="/student-panel/examination/{{$paper['id']}}"><button type="button" class="btn btn-primary">Start Now</button></a>
                    @endif
                </td>
                @endif
            </tr>
        @endforeach

        </tbody>
        @endif
    </table>
</div>



