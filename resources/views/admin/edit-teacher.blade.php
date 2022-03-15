<x-header/>
<x-navbar/>
<div class= 'container form-container' style="padding-left:15%">
    <form action="/admin-panel/dashboard/teacher/edit/" method="post">
        <div class="container" id="popup">
            <div class="row rows">
                <div class="col-sm-4">
                    @csrf
                    <input type="hidden" name='teacher_id' value="{{$teacher['id']}}"/>
                    <label for="name">Name</label>
                    <em>
                        <input type="text" name="name" id="name" value="@if(old('name')){{old('name')}}@else{{$teacher['name']}}@endif" class="form-control" required/>
                        <span class="form-errors">@error('name'){{$message}}@enderror</span>
                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="email">Email</label><em>
                        <input type="email" name="email" id="email" value="@if(old('email')){{old('email')}}@else{{$teacher['email']}}@endif" class="form-control" required/>
                        <span class="form-errors">@error('email'){{$message}}@enderror</span>
                    </em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-4">
                    <label for="username">Username</label>
                    <em>
                        <input type="text" name="username" id="username" value="@if(old('username')){{old('username')}}@else{{$teacher['username']}}@endif" class="form-control" required/>
                        <span class="form-errors">@error('username'){{$message}}@enderror</span>
                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="dob">D.O.B</label><em>
                        <input type="date" name="dob" id="dob" value="@if(old('dob')){{old('dob')}}@else{{$teacher['dob']}}@endif" class="form-control" required/>
                        <span class="form-errors">@error('dob'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-4">
                    <label for="password">Password</label><em>
                        <input type="password" name="password" id="password" value="@if(old('password')){{old('password')}}@else{{$teacher['password']}}@endif" class="form-control" required />
                        <span class="form-errors">@error('password'){{$message}}@enderror</span></em>
                </div>
                <div class="col-sm-6 col-md-6">
                    <br>
                    <button style="margin-left:100px" type="submit" name="submit" class="btn btn-primary btn-lg">Update Teacher Now!</button>
                </div>
            </div>
        </div>
    </form>
</div>
<x-footer/>
