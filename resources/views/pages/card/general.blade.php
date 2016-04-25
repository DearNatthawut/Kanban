<!-- /**
* Created by PhpStorm.
* User: DNOJ
* Date: 3/20/2016
* Time: 12:15 AM
*/ -->


<div class="box-body">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                   required>
        </div>
    </div>
    <div class="form-group">
        <label for="detail" class="col-sm-2 control-label">Detail</label>
        <div class="col-sm-10">
                                        <textarea id="detail" name="detail" class="form-control" rows="5"
                                                  placeholder="Detail"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
            <select class="form-control" name="status">
                @foreach($status as $status)
                    <div class="col-sm-10">
                        <option value="{{$status['id']}}">{{$status['name']}}</option>
                    </div>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="color" class="col-sm-2 control-label">Color</label>
        <div class="col-sm-10">
            <select class="form-control" name="color">
                @foreach($color as $color)
                    <div class="col-sm-10">
                        <option value="{{$color['id']}}">{{$color['name']}}</option>
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
                        <option value="{{$member->id}}">{{$member->member['name']}}</option>
                    </div>
                @endforeach

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="reservation" class="col-sm-2 control-label">Estimate Date</label>
        <div class="col-sm-10 ">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date" class="form-control " id="reservation" placeholder="Estimate Date"
                       required>
            </div>
        </div>
        <!-- /.input group -->
    </div>


</div><!-- /.box-body -->