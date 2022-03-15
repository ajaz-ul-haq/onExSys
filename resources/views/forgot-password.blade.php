<x-header/>
<x-navbar/>

<div class= 'container form-container'>
    @isset($tokenSent)
        <div class="container-fluid alert alert-warning">A Password reset Email has been sent to your email.<strong> Please Check Your email</strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @endisset

    @isset($notExists)
        <div class="container-fluid alert alert-danger"><em><strong>No account Exists with given data !!</strong></em><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @endisset
    <form action="/reset" method="post">
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
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Send Password Reset Email!!</button>
                    <br>
                </div>
            </div>
        </div>
    </form>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 ">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Login Now!</button>
                </div>
                <div class="col-sm-4 col-md-4 ">
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
</div>
<x-footer/>
