<!DOCTYPE html>
<html>
<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">
    <link href="../TemLogin/css/style.css" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="../captcha/jquery-1.2.6.min.js"></script>
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
                document.getElementById('captcha').src = "../captcha/get_captcha.php?rnd=" + Math.random();
            }

            function clear_form() {
                $("#name").val('');
                $("#email").val('');
                $("#message").val('');
            }
        });

    </script>
    <style>
        #wrap{
            border:solid #CCCCCC 1px;
            width:203px;
            -webkit-border-radius: 10px;
            float:left;
            -moz-border-radius: 10px;
            border-radius: 10px;
            padding:3px;
            margin-top:3px;
            margin-left:80px;
        }

        .error{ color:#CC0000; font-size:12px; margin:4px; font-style:italic; width:200px;}

        .success{ color:#009900; font-size:12px; margin:4px; font-style:italic; width:200px;}
        img#refresh {
            float: left;
            margin-top: 30px;
            margin-left: 4px;
            cursor: pointer;
        }
        #name,#email{float:left;margin-bottom:3px; height:20px; border:#CCCCCC 1px solid;}

        #message{ width:260px; height:100px;float:left;margin-bottom:3px; border:#CCCCCC 1px solid;}

        label{ float:left; color:#666666; width:80px;}

        #REGISTER{ border:#CC0000 solid 1px; float:left; background:#CC0000; color:#FFFFFF; padding:5px;}
    </style>
</head>
<body>
<!-----start-main---->
<div class="main">
    <div class="login-form">
        <h1>Register</h1>

        <!-- resources/views/auth/register.blade.php -->

        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div>
                Name
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div>
                Email
                <input type="text" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password">
            </div>

            <div>
                Confirm Password
                <input type="password" name="password_confirmation" >
            </div>

            <div id="wrap" align="left">
                <img src="../captcha/get_captcha.php" alt="" id="captcha"/>
                <br clear="all"/>
                <input name="code" type="text" id="code">
            </div>
            <img src="../captcha/refresh.jpg" width="25" alt="" id="refresh"/>
            <br clear="all"/><br clear="all"/>
            <label>&nbsp;</label>

            <div class="submit">
                <input type="submit"  value="REGISTER" >
            </div>
        </form>
    </div>
    <!--//End-login-form-->

</div>
<!-----//end-main---->

</body>
</html>