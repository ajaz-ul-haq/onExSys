<x-header/>
<x-navbar/>

<div class= 'container form-container'>
    @isset($response)
        <div class="container-fluid alert alert-success">Password Changed Succesfully!! <strong><a href="/login">Login Now</a></strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @endisset
        @isset($invalidToken)
            <div class="container-fluid alert alert-danger"><strong>Invalid Token !!</strong><em>  Please try again...</em><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
        @endisset

    <form action="{{URL::current()}}" method="post">
        <div class="container" id="popup">
            @csrf
            <input type="hidden" name="type" value="@isset($type){{$type}}@endisset"/>
            <input type="hidden" name="token" value="@isset($token){{$token}}@endisset"/>
            <div class="row rows">
                <div class="col-sm-6 col-md-6">
                    <label for="pass1">Password</label><em>
                        <input type="password" name="pass1" id="pass1" value="" class="form-control" />
                        <span class="form-errors">@error('pass1'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-6 col-md-6">
                    <label for="pass2">Confirm Password</label><em>
                        <input type="password" name="pass2" id="pass2" value="" class="form-control" />
                        <span class="form-errors">@error('pass2'){{$message}}@enderror</span></em>
                </div>
            </div>
            <div class="row rows">
                <div class="col-sm-3 col-md-6">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">Reset Password!!</button>
                </div>
            </div>
        </div>
    </form>
</div>
<x-footer/>
