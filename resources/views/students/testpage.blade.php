<x-header/>
<x-navbar/>
@if(isset($correct_question) && Session::has('now_solving'))
    {{Session::forget('now_solving')}}
@endif

@if(isset($err))
{{$err}}
@endif
<div class='container holder'>
    <input type="hidden" value="{{$i=1}}"/>
    <form action="submit" method="post">
        @csrf
    @if(count($questions)>0)
    @foreach($questions as $question)
        <div class="row" style='margin-bottom: 0px;'>
            <div class="col-sm-11 col-md-11">
                <h3>Q{{$i.'): '.$question['question']}}</h3>
            </div>
            @if(isset($correct_question))
               @if($correct_question[($i-1)]==$i)
                    <div class="col-sm-1 col-md-1">
                        <h4><span style="color:green;" class="glyphicon glyphicon-ok"></span></h4>
                    </div>
                @elseif($correct_question[($i-1)]==404)
                    <div class="col-sm-1 col-md-1">
                        <h4><span style="color:orange;" class="glyphicon glyphicon-warning-sign"></span></h4>
                    </div>
                @else
                    <div class="col-sm-1 col-md-1">
                        <h4><span style="color:red" class="glyphicon glyphicon-remove"></span></h4>
                    </div>
                @endif
            @endif

            <div class="row" style="padding-left:10%;">
                <div class="col-sm-3">
                    <input class="form-check-input" type="radio" name="q{{$i}}" value="1" id="q{{$i}}">
                    <label class="form-check-label" for="q{{$i}}">
                        {{$question['op1']}}
                    </label>
                </div>
                <div class="col-sm-3">
                    <input class="form-check-input" type="radio" name="q{{$i}}" value="2"id="q{{$i}}">
                    <label class="form-check-label" for="q{{$i}}">
                        {{$question['op2']}}
                    </label>
                </div>
                <div class="col-sm-3">
                    <input class="form-check-input" type="radio" name="q{{$i}}" value="3" id="q{{$i}}">
                    <label class="form-check-label" for="q{{$i}}">
                        {{$question['op3']}}
                    </label>
                </div>
                <div class="col-sm-3">
                    <input class="form-check-input" type="radio" name="q{{$i}}" value="4" id="q{{$i}}">
                    <label class="form-check-label" for="q{{$i}}">
                        {{$question['op4']}}
                    </label>
                </div>
            </div>
        </div>
        <hr>
        <input type="hidden" value="{{$i++}}"/>
    @endforeach
         @if(!isset($correct_question))
    <div class="row">
            <div class="col-sl-4 col-md-3"></div>
            <div class="col-sl-4 col-md-3"></div>
            <div class="col-sl-4 col-md-3"></div>
            <div class="col-sl-4 col-md-3">
                <a href=""><button style="margin-top:30px;" type="submit" class="btn btn-primary btn-outline btn-block btn-lg ">Submit Now</button></a>
            </div>
    </div>

            @endif
        @else
                <h4> No Question In this Exam till now!</h4>
        @endif
    </form>
</div>
<div class="container holder">
    <div class="row">
        <div class="col-sl-4 col-md-12">
            <a href="/student-panel/dashboard"><button type="submit" class="btn btn-primary btn-outline btn-block btn-lg ">Back to Dashboard</button></a>
        </div>
    </div>
</div>

