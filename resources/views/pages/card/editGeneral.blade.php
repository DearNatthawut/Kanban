<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 4/21/2016
 * Time: 10:22 PM
 */?>
<div class="box-body">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                   value="{{$Card[0]['name']}}"
                   required>
        </div>
    </div>
    <div class="form-group">
        <label for="detail" class="col-sm-2 control-label">Detail</label>
        <div class="col-sm-10">
                                        <textarea id="detail" name="detail" class="form-control" rows="5"
                                                  placeholder="Detail" >{{$Card[0]['detail']}}</textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="color" class="col-sm-2 control-label">Color</label>
        <div class="col-sm-10">
            <select class="form-control" name="color">
                @foreach($color as $color)
                    <div class="col-sm-10">
                        <option value="{{$color['id']}}" @if($color['id']== $Card[0]['color_id']) selected="selected" @endif>{{$color['name']}}</option>
                    </div>
                @endforeach

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="member" class="col-sm-2 control-label">Responsible</label>
        <div class="col-sm-10">
            <select class="form-control" name="member">
                <div class="col-sm-10">
                </div>
                @foreach($member as $member)
                    <div class="col-sm-10">
                        <option value="{{$member->id}}" @if($member->id == $Card[0]['MemberManagement_id']) selected="selected" @endif>{{$member->member['name']}}</option>
                    </div>
                @endforeach

            </select>
        </div>
    </div>


    </div><!-- /.box-body -->