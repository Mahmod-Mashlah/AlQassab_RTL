<!DOCTYPE html>
<html>

<head>
    <title> تسجيل الدخول || ثانويّة القصّاب </title>
    {{-- <link rel="stylesheet" type="text/css" href="css/loginstyle.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loginstyle.css') }}">

    @yield('css')

    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="{{ asset('assets/img/bg-2.png') }}">
    <div class="container">
        <div class="img">
            <!-- <img src="img/Picture1.png"> -->
            <!-- <img src="img/logo2.png"> -->

        </div>
        <div class="login-content">
            <form action="index.html">
                <img src="{{ asset('assets/img/logo.png') }}">

                <br><br>

                <h1 class="title">ثانويّة القصّاب للعلوم الشّرعيّة</h1>
                <br><br>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>الاسم الثلاثي</h5>
                        <input type="text" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>الرمز</h5>
                        <input type="password" id="password" class="input form-control rounded-right" required>
                    </div>

                </div>

                <input class="custom-control-input" type="checkbox"id="show-password">
                <br>
                <!-- <a href="#">Forgot Password?</a> -->
                <input type="submit" class="btn" value="تسجيل الدخول">

            </form>
        </div>
    </div>
    {{-- <script type="text/javascript" src="js/loginmain.js"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/loginmain.js') }}"></script>

    {{-- Show password button --}}
    <script>
        document.getElementById("show-password").addEventListener("change", function() {
            const passwordInput = document.getElementById("password");
            passwordInput.type = this.checked ? "text" : "password";
        });
    </script>
</body>

</html>
