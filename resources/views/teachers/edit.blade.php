<x-header/>
<x-navbar/>
<div class="container holder">
    <form action="/teachers-panel/dashboard/editNow" method="post">
        <br>
        @csrf
        <div class="row">
            <div class="col-sm-12" >
                <label for="question"> Question </label>
                <input class="form-control" id='question' value="{{$questions['question']}}" name="question" ></input>
                <span class="form-errors"><em>@error('question'){{$message}}@enderror</em></span>
                <br><br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <input type="hidden" name='pid' value="{{$questions['paper_id']}}">
                <input type="hidden" name='question_id' value="{{$questions['id']}}">
                <label for="op1">Option 1 :</label>
                <input type="text" id='op1' name="op1" value="{{$questions['op1']}}" value="{{old('op1')}}" class="form-control"/>
                <span class="form-errors"><em>@error('op1'){{$message}}@enderror</em></span>
            </div>
            <div class="col-sm-6">
                <label for="op2">Option 2 :</label>
                <input type="text" id='op2' name="op2"  value="{{$questions['op2']}}" value="{{old('op2')}}" class="form-control"/>
                <span class="form-errors"><em>@error('op2'){{$message}}@enderror</em></span>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-sm-6">
                <label for="op3">Option 3 :</label>
                <input type="text" id='op3' name="op3"  value="{{$questions['op3']}}" value="{{old('op3')}}" class="form-control"/>
            </div>
            <div class="col-sm-6">
                <label for="op4">Option 4 :</label>
                <input type="text" id='op4'name="op4" value="{{$questions['op4']}}" value="{{old('op4')}}"  class="form-control"/>
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <button style="margin-left:40%;" type="submit" class="btn btn-primary btn-lg ">Edit and Save</button>
            </div>
        </div>
    </form>
</div>
