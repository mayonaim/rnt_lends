<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>

</head>


<body style="background-color: #008b91">
    @include('partials.css')
    <div class="card mx-auto" style="max-width: 400px; margin-top: 100px;">
        <div class="card-head">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ asset('/img/logo.jpg') }}" width="200px">
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center">
                <form action="{{ route('signUp.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input type="text" name="name" id="username" class="form-control"
                                placeholder="ID User" autocomplete="off" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="role" value="student">
                        <button type="submit" class="btn btn-primary btn-block" name="login" value="Login">Sign
                            Up</button>
                        <a href="/login" class="btn btn-link">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
        @include('partials.js')
</body>


</html>
