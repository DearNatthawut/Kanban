<!DOCTYPE html>
<html>
<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">
    <link href="../TemLogin/css/style.css" rel='stylesheet' type='text/css'/>
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
</head>
<body>
<!-----start-main---->
<div class="main">
    <div class="login-form">
        <h1>Member Login</h1>
        <div class="head">
            <img src="../TemLogin/images/user.png" alt=""/>
        </div>
        <form method="post" action="/auth/login">
            {!! csrf_field() !!}

            <div>
                Email
                <input type="text" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password" id="password">
            </div>


            <div class="submit">

                <input type="submit"  value="LOGIN">
                <input type="button" value="Register" ONCLICK="window.location.href='auth/register'">
            </div>

        </form>
    </div>
    <!--//End-login-form-->

</div>
<!-----//end-main---->

</body>
</html>