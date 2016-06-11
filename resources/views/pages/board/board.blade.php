@include("layouts.header")
@include("layouts.aside")

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div><h3>
        @if(Auth::user()->Level_id == 1 || Auth::user()->id == $Board->manager_id) <!--    hide member -->
        <a href="/createCard/{{$Board->id}}">
            <button type="button" class="btn btn-primary "><i class="glyphicon glyphicon-plus"> Create Card</i></button>
        </a>

        @endif
          {{$Board->name}}</h3>
           </div>


        {{--  <ol class="breadcrumb">
              <li><a href="/home"> Home</a></li>
              <li class="active">Board</li>
          </ol>--}}
    </section>
    <section class="content">
        <div ng-view></div>
        </nav>

    </section>

</div>

</body>
@include('layouts.script')
</html>
