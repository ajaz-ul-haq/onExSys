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

    @foreach($questions as $question)
        <div class="container question-holder" >
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{$question['question']}}</h3>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="/teachers-panel/dashboard/edit/{{$question['paper_id']}}/{{$question['id']}}">
                        <button type="button" class="btn btn-primary btn-inline btn-sm">Edit This</button>
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

</div>
<div class="container">

</div>
