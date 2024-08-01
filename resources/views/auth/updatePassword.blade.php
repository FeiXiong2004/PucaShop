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
            <div class="title signup">
                Update Password
            </div>
        </div>
        <div class="form-container">
            <div class="form-inner">
                <form action="{{ route('handleUpdatePassword', $user->id) }}" class="login" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="field">
                        <input type="password" placeholder="Current Password" name="current_password" required>
                    </div>

                    <div class="field">
                        <input type="password" placeholder="New Password" name="password" required>
                    </div>

                    <div class="field">
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>

                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Update Password">
                    </div>

                    <div class="pass-link">
                        <a href="{{ route('showAccount', $user->id) }}">Change information</a>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger" >
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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
