<x-header/>
<x-navbar/>
<div class= 'container form-container' style="padding-left:15%">
    <form action="/admin-panel/dashboard/student/edit" method="post">
        <div class="container" id="popup">
            <div class="row rows">
                <div class="col-sm-4">
                    @csrf

                    <input type="hidden" name='student_id' value="{{$student['id']}}"/>
                    <label for="name">Name</label>
                    <em>
                        <input type="text" name="name" id="name" value="@if(old('name')){{old('name')}}@else{{$student['name']}}@endif" class="form-control" />

                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="dob">D.O.B</label><em>
                        <input type="date" name="dob" id="dob" value="@if(old('name')){{old('name')}}@else{{$student['dob']}}@endif" class="form-control" />
                    </em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-4">
                    <label for="email">Email</label><em>
                        <input type="email" name="email" id="email" value="@if(old('name')){{old('name')}}@else{{$student['email']}}@endif" class="form-control" />

                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="phone">Phone</label><em>
                        <input type="number" name="phone" id="phone" value="@if(old('phone')){{old('phone')}}@else{{$student['phone']}}@endif" class="form-control" />

                    </em>
                </div>
            </div>

            <div class="row rows">
                <div class="col-sm-4">
                    <label for="class">Class</label><em>
                        <input type="text" name="class" id="class" value="@if(old('class')){{old('class')}}@else{{$student['class']}}@endif" class="form-control" />

                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="roll">Roll No.</label><em>
                        <input type="number" name="roll" id="roll" value="@if(old('roll')){{old('roll')}}@else{{$student['rollno']}}@endif" class="form-control" />

                    </em>
                </div>
            </div>

            <div class="row rows">
                <div class="col-sm-4">
                    <label for="password">Password</label><em>
                        <input type="password" name="password" id="password" value="@if(old('password')){{old('password')}}@else{{$student['password']}}@endif" class="form-control" />
                        </em>
                </div>
                <div class="col-sm-6 col-md-6">
                    <br>
                    <button style="margin-left:100px" type="submit" name="submit" class="btn btn-primary btn-lg">Update Student Now!</button>
                </div>
            </div>
        </div>
    </form>
</div>
<x-footer/>
