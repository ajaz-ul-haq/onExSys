<x-header/>
<x-navbar/>
<div class='container'>
        <div class="container holder">
            <form action="/teachers-panel/create/start" method="post">
                @if(!Session::has('class'))
                <div class="row">

                    <h4><em>Fill the basic details to continue...</em></h4>
                    <br><br>
                </div>
                @endif

            <div class="row">
                <div class="col-sm-4">
                    @csrf
                    <label for="class">Class </label>
                    @if(!Session::has('class'))
                    <input type="text" name="class" value="{{old('class')}}" class='form-control' id="class" required/>
                    @else
                        : <b>{{Session::get('class')}}</b>
                    @endif
                    <span class="form-errors"><em>@error('class'){{$message}}@enderror</em></span>
                </div>
                <div class="col-sm-4">
                    <label for="subject">Subject</label>
                    @if(!Session::has('subject'))
                    <input type="text" name="subject" value="{{old('subject')}}" class='form-control' id="subject" />
                    @else
                        : <b>{{Session::get('subject')}}</b>
                    @endif
                    <span class="form-errors"><em>@error('subject'){{$message}}@enderror</em></span>
                </div>
                <div class="col-sm-4">
                    <label for="time">Time (<em>in Minutes</em>) </label>
                    @if(!Session::has('time'))
                    <input type="text" name="time" value="{{old('time')}}" class='form-control' id="time" />
                    @else
                        : <b>{{Session::get('time')}} </b>
                    @endif
                    <span class="form-errors"><em>@error('time'){{$message}}@enderror</em></span>
                </div>
            </div>
            @if(!Session::has('time'))
                        <br>
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Proceed</button>
                </div>
            </div>
                    @endif
            </form>
        </div>

    <div class="container holder" style="@if(!Session::has('class')){{'display:none;'}}@endif">
        <form action="/teachers-panel/create/next" method="post">
            <br>
            @csrf
            <div class="row">
                <div class="col-sm-12" >
                    <label for="question"> Write Your Question Here </label>
                    <input class="form-control" id='question' name="question" ></input>
                    <span class="form-errors"><em>@error('question'){{$message}}@enderror</em></span>
                    <br><br>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="op1">Option 1 :</label>
                    <input type="text" id='op1' name="op1" value="{{old('op1')}}" class="form-control" required/>
                    <span class="form-errors"><em>@error('op1'){{$message}}@enderror</em></span>
                </div>
                <div class="col-sm-6">
                    <label for="op2">Option 2 :</label>
                    <input type="text" id='op2' name="op2" value="{{old('op2')}}" class="form-control" required/>
                    <span class="form-errors"><em>@error('op2'){{$message}}@enderror</em></span>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="op3">Option 3 :</label>
                    <input type="text" id='op3' name="op3" value="{{old('op3')}}" class="form-control" required/>
                </div>
                <div class="col-sm-6">
                    <label for="op4">Option 4 :</label>
                    <input type="text" id='op4'name="op4" value="{{old('op4')}}" class="form-control" required/>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="account_type">Correct Answer :</label>
                        <em>
                            <select class="form-control" name="type" id="account_type">
                                <option name="correct_option" value="1">Option A</option>
                                <option name="correct_option" value="2">Option B</option>
                                <option name="correct_option" value="3">Option C</option>
                                <option name="correct_option" value="4">Option D</option>
                            </select>
                        </em>
                    </div>
                </div>
                <div class="col-sm-6">
                    <br>
                    <button style="margin-left:20%;" type="submit" class="btn btn-primary btn-lg ">Proceed to Next Question</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sl-4"></div>
            <div class="col-sl-4">
                <a href="/teachers-panel/create/stop"><button style="margin-top:30px;" type="submit" class="btn btn-danger btn-outline btn-block btn-lg ">Stop and Leave</button></a>
            </div>
            <div class="col-sl-4"></div>
        </div>
    </div>
</div>
<x-footer/>
