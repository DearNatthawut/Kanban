<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project Management With Kanban Borad</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

@include('layouts.css')
@include('layouts.scriptNG')

<body class="hold-transition skin-blue login-page">
<div class="login-box">

    <div class="login-box-body">
        <br>
        <form method="post" action="/auth/login">
            {!! csrf_field() !!}

            <div class="form-group has-feedback">
                <label for="username">E-mail</label>
                <input type="text" name="username" class="form-control" placeholder="อีเมล หรือรหัสนิสิต" required>

            </div>
            <div class="form-group has-feedback">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>

            </div>


            <p class="login-box-msg">ใช้บัญชีของทางมหาิทยาลัยในการเข้าสู่ระบบ</p>
            <div class="form-group">


                <button type="submit" class="btn btn-primary"> Login</button>
            </div>

        </form>
    </div>



</div>
</body>
@include('layouts.script')
</html>