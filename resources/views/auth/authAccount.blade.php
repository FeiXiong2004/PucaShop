<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login and Registration Form in HTML | CodingNepal</title>
    <link rel="stylesheet" href="{{ asset('asset/auth/css') }}/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Login
            </div>
            <div class="title signup">
                Signup
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="{{ route('handleLogin') }}" class="login" method="POST">
                    @csrf
                    <div class="field">
                        <input type="text" placeholder="Email" name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password"required>
                    </div>
                    <div class="pass-link">
                        <a href="#">Forgot password?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login">
                    </div>

                    @if (session('error'))
                        <h4 class="alert alert-danger text-center" style="color:red">
                            {{ session('error') }}
                        </h4>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                </form>

                <form action="{{ route('handleRegister') }}" class="signup" method="POST">
                    @csrf
                    <div class="field">
                        <input type="text" placeholder="FullName" name="fullname" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="UserName" name="username" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm password" name="password_confirmation" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup">
                    </div>
                    <div class="field">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: red">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>
</body>

</html>
