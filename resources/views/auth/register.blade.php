<!DOCTYPE html>
<html>
<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">
    <link href="../packages/TemLogin/css/style.css" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="../packages/captcha/jquery-1.2.6.min.js"></script>
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
    <script>

        $(document).ready(function () {
            $('#REGISTER').click(function() {

                // name validation

                var nameVal = $("#name").val();
                if(nameVal == '') {

                    $("#name_error").html('');
                    $("#name").after('<label class="error" id="name_error">Please enter your name.</label>');
                    return false
                }
                else
                {
                    $("#name_error").html('');
                }

                /// email validation

                var emailReg = /^(@([\w-]+\.)+[\w-]{2,4})?$/;
                var emailaddressVal = $("#email").val();

                if(emailaddressVal == '') {
                    $("#email_error").html('');
                    $("#email").after('<label class="error" id="email_error">Please enter your email address.</label>');
                    return false
                }
                else if(!emailReg.test(emailaddressVal)) {
                    $("#email_error").html('');
                    $("#email").after('<label class="error" id="email_error">Enter a valid email address.</label>');
                    return false

                }
                else
                {
                    $("#email_error").html('');
                }

                $.post("post.php?"+$("#MYFORM").serialize(), {

                }, function(response){

                    if(response==1)
                    {
                        $("#after_submit").html('');
                        $("#REGISTER").after('<label class="success" id="after_submit">Your message has been submitted.</label>');
                        change_captcha();
                        clear_form();
                    }
                    else
                    {
                        $("#after_submit").html('');
                        $("#REGISTER").after('<label class="error" id="after_submit">Error ! invalid captcha code .</label>');
                    }


                });

                return false;
            });

            // refresh captcha
            $('img#refresh').click(function () {

                change_captcha();
            });

            function change_captcha() {
                document.getElementById('captcha').src = "../packages/captcha/get_captcha.php?rnd=" + Math.random();
            }

            function clear_form() {
                $("#name").val('');
                $("#email").val('');
                $("#message").val('');
            }
        });

    </script>
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
            font-size: 24px;
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
        .login-block input#code {
            background: #fff  ;
            background-size: 16px 80px;
        }

        .login-block input#code:focus {
            background: #fff ;
            background-size: 16px 80px;
        }

        .login-block input#username {
            background: #fff  ;
            background-size: 16px 80px;
        }

        .login-block input#username:focus {
            background: #fff ;
            background-size: 16px 80px;
        }

        .login-block input#password {
            background: #fff ;
            background-size: 16px 80px;
        }

        .login-block input#password:focus {
            background: #fff ;
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
        <h1>Register</h1>

        <!-- resources/views/auth/register.blade.php -->

        <form method="POST" action="/auth/register">
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
                Name
                <input type="text" name="name" value="{{ old('name') }}"id="username">
            </div>

            <div>
                Email
                <input type="text" name="email" value="{{ old('email') }}"id="username">
            </div>

            <div>
                Password
                <input type="password" name="password" id="password">
            </div>

            <div>
                Confirm Password
                <input type="password" name="password_confirmation" id="password">
            </div>

            <div id="wrap" align="left">
                <img src="../packages/captcha/get_captcha.php" alt="" id="captcha"/>
                <br clear="all"/>
                <input name="code" type="text"  id="code">
            </div>
            <img src="../packages/captcha/refresh.jpg" width="25" alt="" id="refresh"/>
            <br clear="all"/><br clear="all"/>
            <label>&nbsp;</label>

            <div class="submit">
                <button type="submit">  Register </button>
            </div>
        </form>
    </div>
    <!--//End-login-form-->

</div>
<!-----//end-main---->

</body>
</html>