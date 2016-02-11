
    @include("layouts.header")
    @include("layouts.aside")

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$Board->name}}
            <small></small>
        </h1>
    </section>

    <section class="content" >
        <div ng-view></div>
        </nav>

    </section>

</div>

</body>
@include('layouts.js')

</html>
