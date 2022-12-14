<!DOCTYPE html>
<html lang="en">
<head>
    {{-- META --}}
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Kamila—Kami lagi, kami lagi" />
    <meta name="author" content="Maula" />

    {{-- TITLE --}}
    <title>Kamila&mdash;{{ $title }}</title>

    {{-- STYLESHEET --}}
    <link href="{{ URL::to('assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('assets/css/custom.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('assets/css/media.min.css') }}" rel="stylesheet" />

    {{-- FAVICON --}}
    <link href="{{ URL::to('assets/img/favicon.png') }}" rel="icon" />

    {{-- SCRIPT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous" defer=""></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous" defer=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer=""></script>
    <script src="{{ URL::to('assets/js/scripts.js') }}" defer=""></script>
</head>

<body class="darker">    
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Authentication</h3></div>
                                <div class="card-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember on this device') }}
                                        </label>
                                    </div>
                                    <form action="{{ URL::to('login') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" id="inputEmail" type="email" placeholder="Username" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        {{--
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Me</label>
                                        </div>
                                        --}}
                                        <div class="d-flex align-items-start justify-content-between mb-0">
                                            <a class="small" href="forgot">Forgot Password?</a>
                                            <a class="btn btn-primary" href="login">Login</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register">Need an account? Register!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>