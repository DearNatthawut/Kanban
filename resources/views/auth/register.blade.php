<!DOCTYPE html>
<html>
<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">

    @extends('layouts.css')

    @extends('layouts.scriptNG')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <span class="logo-lg"><b>KANBAN</b></span>

                </a>
            </div>
        </div>
    </nav>
    <script type="text/javascript">
        var verifyCallback = function(response) {
            alert(response);
        };
        var onloadCallback = function() {
            widgetId1 = grecaptcha.render('g-recaptcha', {
                'sitekey': '6LdDAiITAAAAAAjt0ATo045kGSuV-2-S11evj4wZ',
                'callback': verifyCallback,
            });
        };
    </script>
</head>
<body>
<br><br><br>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="box-body">
            <div class="form-group">

                <form method="POST" action="/auth/register">
                    {!! csrf_field() !!}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label for="username">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="username" required>
                    </div>

                    <div>
                        <label for="InputEmail1">Email address</label>
                        <input type="email" name="email"class="form-control" value="{{ old('email') }}" id="InputEmail1" required>
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password"class="form-control" name="password" id="password" required>
                    </div>

                    <div>
                        <label for="Confirm Password">Confirm Password</label>
                        <input type="password" class="form-control"name="password_confirmation" id="Confirm Password" required>
                    </div>
                    <br>
                    <center><div class="g-recaptcha " data-sitekey="6LdDAiITAAAAAAjt0ATo045kGSuV-2-S11evj4wZ" async defer></div></center>
                    <br>
                    <button type="submit" class="btn btn-defaul pull-right"> Register</button>

                </form>
            </div>
        </div>
    </div>
</div>