<!DOCTYPE html>
<html>
<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet'
          type='text/css'>
    <!--//webfonts-->


    <style>
        body {
            background: url('http://www.scholarship.in.th/wp-content/uploads/2014/05/241740-522add95cfa4a.jpg') no-repeat fixed center center;
            background-size: cover;
            font-family: Montserrat;
        }

        .logo {
            width: 213px;
            height: 36px;

            margin: 30px auto;
        }

        .login-block {
            width: 320px;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            border-top: 5px solid #00b300;
            margin: 0 auto;
        }

        .login-block h1 {
            text-align: center;
            color: #000;
            font-size: 18px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .login-block input {
            width: 100%;
            height: 42px;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            font-size: 14px;
            font-family: Montserrat;
            padding: 0 20px 0 50px;
            outline: none;
        }

        .login-block input#username {
            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#username:focus {
            background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password {
            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
            background-size: 16px 80px;
        }

        .login-block input#password:focus {
            background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
            background-size: 16px 80px;
        }

        .login-block input:active, .login-block input:focus {
            border: 1px solid #009900;
        }

        .login-block button {
            width: 100%;
            height: 40px;
            background:  #4dff4d;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #00b300;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            font-family: Montserrat;
            outline: none;
            cursor: pointer;
        }

        .login-block button:hover {
            background: #009900;
        }
        .alert-box {
            color:#555;
            border-radius:10px;
            font-family:Tahoma,Geneva,Arial,sans-serif;font-size:12px;
            padding:10px 10px 10px 36px;
            margin:10px;
        }
        .alert-box span {
            font-weight:bold;
            text-transform:uppercase;
        }
        .error {
            background:#ffecec  no-repeat 10px 50%;
            border:1px solid #f5aca6;
        }
    </style>
</head>
<body>
<!-----start-main---->
<div class="main">
    <div class="logo"></div>
    <div class="login-block">
        <h1>Member Login</h1>
        <form method="post" action="/auth/login">
            {!! csrf_field() !!}
            @if (count($errors) > 0)
                <div class="alert-box error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <input type="text" name="email" placeholder="E-Mail" value="{{ old('email') }}" id="username">
            </div>
            <div>
                <input type="password" placeholder="Password" name="password" id="password">
            </div>


            <div class="submit">

                <button type="submit"  value="LOGIN">Login</button><br><br>
                <button type="button" value="Register" ONCLICK="window.location.href='auth/register'">REGISTER</button>
            </div>

        </form>
    </div>
    <!--//End-login-form-->

</div>
<!-----//end-main---->

</body>
</html>