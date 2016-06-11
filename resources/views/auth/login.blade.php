<!DOCTYPE html>


@extends('layouts.css')

<head>
    <title>Project Management With Kanban Borad</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <span class="logo-lg"><b>KANBAN</b></span> </a>

            </div>
        </div>
    </nav>
</head>
<body>
<br><br><br><br>


<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="box-body">
            <div class="form-group">
                <form method="post" action="/auth/login">
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
                        <label for="InputEmail1">Email address</label>
                        <input type="text" name="email" placeholder="E-Mail" class="form-control" id="InputEmail1"
                               value="{{ old('email') }}" id="username">
                    </div>
                    <div>
                        <label for="InputPassword">Password</label>
                        <input type="password" placeholder="Password" class="form-control" id="InputPassword"
                               name="password" id="password">
                    </div>
                    <br>

                    <button type="submit" class="btn btn-defaul pull-right" value="LOGIN"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>

                </form>

            </div>
        </div>

        <div class="panel-footer"></div>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="box-body">
               <center><p>How to Project Mangement With Kanban Board ? <a href="/auth/register" class="navbar-link">Create an account</a></p></center>
                </div>
            </div>
        </div>
</div>