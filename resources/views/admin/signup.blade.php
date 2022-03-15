<x-header/>
<x-navbar/>
<div class= 'container form-container' style="padding-left:15%">


    <form action="" method="post">
        <div class="container" id="popup">
            <div class="row rows">
                <div class="col-sm-4">
                    @csrf
                    <label for="name">Name</label>
                    <em>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" />
                        <span class="form-errors">@error('name'){{$message}}@enderror</span>
                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="email">Email</label><em>
                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" />
                        <span class="form-errors">@error('email'){{$message}}@enderror</span>
                    </em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-4">
                    <label for="username">Username</label>
                    <em>
                        <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control" />
                        <span class="form-errors">@error('username'){{$message}}@enderror</span>
                    </em>
                </div>
                <div class="col-sm-4">
                    <label for="dob">D.O.B</label><em>
                        <input type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" />
                        <span class="form-errors">@error('dob'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-4">
                    <label for="pass1">Password</label><em>
                        <input type="password" name="pass1" id="pass1" value="{{old('pass1')}}" class="form-control" />
                        <span class="form-errors">@error('pass1'){{$message}}@enderror</span></em>
                </div>
                <div class="col-sm-4">
                    <label for="pass2">Confirm Password</label><em>
                        <input type="password" name="pass2" id="pass2" value="{{old('pass1')}}" class="form-control" />
                        <span class="form-errors">@error('pass2'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-4">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Create Now!</button>
                </div>
                <div >
                    <br>
                    <a href="/login"><button type="button" name="Create Account" class="btn btn-info btn-lg">Already have an Account</button></a>
                </div>
            </div>
        </div>
    </form>
</div>
<x-footer/>
