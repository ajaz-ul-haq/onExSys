<x-header/>
<x-navbar/>

<div class= 'container form-container'>
    @isset($response)
        <div class="container-fluid alert alert-warning">An Account activation Mail has been sent to your email.<strong> Please Check Your email</strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @endisset
    @isset($activated)
        <div class="container-fluid alert alert-success"><strong>Account Activated Successfully!!<a style='color:green' href="login"> <em>Login Now</em></a> </strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @endisset
        @isset($invalidAttempt)
            <div class="container-fluid alert alert-danger"><strong>Invalid Credentials!!</strong><em>  Please Try Again...</em><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
        @endisset
        @isset($notActivated)
            <div class="container-fluid alert alert-danger"><strong>Account Not Activated!!</strong><em>  Please activate your account first...</em><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
        @endisset
    <form action="/login" method="post">
        <div class="container" id="popup">
            <div class="row rows">
                <div class="col-sm-6">
                    @csrf
                    <label for="email">Email</label><em>
                        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" />
                        <span class="form-errors">@error('email'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-6">
                    <label for="dob">D.O.B</label><em>
                        <input type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" />
                        <span class="form-errors">@error('dob'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-6">
                    <label for="pass">Password</label><em>
                        <input type="password" name="password" id="password" value="" class="form-control" />
                        <span class="form-errors">@error('password'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-md-4">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Login Now!</button>
                </div>
                <div class="col-md-4">
                    <br>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-secondary btn-lg" type="button" data-toggle="dropdown" style="margin-right:0px;">Sign Up
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="/admin-panel/signup">as Admin</a></li>
                                <li><a href="/teachers-panel/signup">as Teacher</a></li>
                                <li><a href="/student-panel/signup">as Student</a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </form>
        <div class="container">
            <div class="row rows">
                <div class="col-md-6 col-sm-3">
                    <a style='color:black' href="/reset-password"><button class="btn btn-inline btn-block">Forgot Password</button></a>
                </div>
            </div>
        </div>
</div>
<x-footer/>
