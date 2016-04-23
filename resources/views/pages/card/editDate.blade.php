<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/21/2016
 * Time: 11:01 PM
 */ ?>

<br>
<div class="form-group">
    <label for="reservation" class="col-sm-2 control-label">Estimate Date</label>
    <div class="col-sm-10 ">
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="date" class="form-control " id="reservation" placeholder="Estimate Date"
                   @if($Card[0]['estimate_start'] != null ) value="{{$Card[0]['estimate_start']}} - {{$Card[0]['estimate_end']}}" @endif
                   required>
        </div>
    </div>
    <!-- /.input group -->


</div>

