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
                Update Account
            </div>
        </div>
        <div class="form-container">
            <div class="form-inner">
                <form action="{{ route('handleUpdateAccount',$user->id) }}" class="login" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <input type="text" placeholder="FullName" name="fullname" value="{{ $user->fullname }}"required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="UserName" name="UserName"  value="{{ $user->username }}" required>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Email" name="email"  value="{{ $user->email }} "required>
                    </div>
                    <div class="field">
                        <input type="file" name="avatar" >
                        <img src="{{  asset('/storage/images' ) .'/' . $user->avatar }}" alt="" width="100" height="100">
                    </div>       
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Update information">
                    </div>
                    <div class="pass-link">
                        <a href="{{ route('showPassword',$user->id) }}">Change password</a>
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
