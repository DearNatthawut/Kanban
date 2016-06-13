<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/19/2016
 * Time: 11:22 PM
 */ ?>

@include("layouts.header")
@include("layouts.adminside")


<div class="content-wrapper">

    <section class="content">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="page-header">
                        <h2>
                            Forgotten account
                        </h2>

                    </div>

                    <form method="post" action="/changeName/{{Auth::user()->id}}">
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
                            <h3>Name</h3>
                            <input type="text" name="name" placeholder="Name" class="form-control"
                                   value="{{Auth::user()->name}}" id="name" required>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success pull-right"><span
                                    class="glyphicon glyphicon-floppy-save"></span> Save
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </section>
</div>

</body>

@include('layouts.script')

</html>
