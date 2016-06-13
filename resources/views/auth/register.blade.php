<!DOCTYPE html>
<html>
<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">

    @extends('layouts.css')

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
                        <input type="password"class="form-control" name="password" id="password" pattern="[A-Za-z0-9]{4,}" title="Use password at least  letter 4" required>
                    </div>

                    <div>
                        <label for="Confirm Password">Confirm Password</label>
                        <input type="password" class="form-control"name="password_confirmation" id="Confirm Password" pattern="[A-Za-z0-9]{4,}" title="Use password at least  letter 4 "required>
                    </div>
                    <h5> <font color="red">Use password at least  letter 4</font></h5>
                    <br>
                    <center><div class="g-recaptcha " data-sitekey="6LdDAiITAAAAAAjt0ATo045kGSuV-2-S11evj4wZ" async defer></div></center>
                    <br>
                    <button type="submit" class="btn btn-defaul pull-right"> Register</button>

                </form>
            </div>
        </div>

        <div class="panel-footer"></div>

    </div>
</div>