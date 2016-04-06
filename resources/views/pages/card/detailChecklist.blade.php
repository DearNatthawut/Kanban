<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/5/2016
 * Time: 12:54 AM
 */?>
<div class="box box-primary">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Check List</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list">

            @foreach($checklist as $checklist)
            <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <input type="checkbox" value="{{$checklist['status']}}" name="status{{$checklist['id']}}"
                       @if ($checklist['status'] == 1)checked @endif>
                <span class="text">{{$checklist['name']}}</span>
                <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                </div>
            </li>
            @endforeach

        </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border">
        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
    </div>
</div><!-- /.box -->
