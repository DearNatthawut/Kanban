
    @include("layouts.header")
    @include("layouts.aside")

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$Board->name}}

            <small></small>
        </h1>
        <a href="/createCard">
            <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-plus"> Create
                    Card</i></button>
        </a>
    </section>

    <section class="content" >
        <div ng-view></div>
        </nav>

    </section>

</div>

</body>
@include('layouts.js')

</html>
