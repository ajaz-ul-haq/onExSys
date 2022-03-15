<x-header/>
<x-navbar/>
<div class="container">
    <div class="row"  style="padding-top:50px;">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <a href="/"><button type="button" class="btn btn-primary btn-lg btn-block">Back to Dashboard</button></a>
        </div>
        <div class="col-sm-4">
        </div>

    </div>
    @if(count($questions)>0)
    @foreach($questions as $question)
        <div class="container question-holder" >
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{$question['question']}}</h3>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="/admin-panel/dashboard/edit-exam/{{$question['paper_id']}}/{{$question['id']}}">
                        <span style="color:blue" class="glyphicon glyphicon-edit"></span></a>
                    </a>
                </div>
            </div>
            <div class="row" style="padding-left:10%;">
                <div class="col-sm-3">
                    <h4>(a) {{$question['op1']}}</h4>
                </div>
                <div class="col-sm-3">
                    <h4>(b) {{$question['op2']}}</h4>
                </div>
                <div class="col-sm-3">
                    <h4>(c) {{$question['op3']}}</h4>
                </div>
                <div class="col-sm-3">
                    <h4>(d) {{$question['op4']}}</h4>
                </div>
            </div>
        </div>
    @endforeach
    @else
    <div class="container holder">
        <em><h3>No Question in This Exam till now......</h3></em>
    </div>
    @endif
</div>
<div class="container">

</div>
