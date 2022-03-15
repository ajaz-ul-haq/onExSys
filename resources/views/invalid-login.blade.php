<x-header/>
<x-navbar/>
<div class= 'container form-container'>
    @isset($response)<div class="container-fluid alert alert-danger"><strong>Invalid Credentials!! Please Try Again </strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>@endisset

    <form action="login" method="post">
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
                <div class="col-sm-4">
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Login Now!</button>
                </div>
                <div class="col-sm-4">
                    <br>
                    <a href="signup"><button type="button" name="Create Account" onclick="" class="btn btn-info btn-lg">Create Account</button></a>
                </div>
            </div>
        </div>
    </form>
</div>
<x-footer/>
