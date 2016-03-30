<?php
/**
 * Created by PhpStorm.
 * User: DNOJ
 * Date: 3/21/2016
 * Time: 12:01 AM
 */ ?>


<br>
<div class="input-append">
    <input class="span2" id="appendedInputButton" type="text">
    <button class="btn" type="button" onclick="createChecklist()"> Add</button>
</div>


<div class="row">
    <div class="col-xs-6" id="containerChecklist"></div> <!--  เอา Job จาก createFrom มาแปะ-->
    <!--  เอา Job จาก createFrom มาแปะ-->
</div>


<div class="box-body">
    <ul class="todo-list" id="labelChecklist">

    </ul>
</div><!-- /.box-body -->


<script>

    function createChecklist() {

        var job = document.getElementById("appendedInputButton").value;
        var container = document.getElementById("containerChecklist");
        var container2 = document.getElementById("labelChecklist");

        //createChecklist
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "sub[]";
        input.className = "form-control";
        input.placeholder = "name job";
        input.value = job;
        input.required = "true";
        container.appendChild(input);

        var Li = document.createElement("li");

       var spanhand = document.createElement("span");
        spanhand.class = "handle";

        var I = document.createElement("i");
        I.class = "fa fa-ellipsis-v";

        var I2 = document.createElement("i");
        I.class = "fa fa-ellipsis-v";

        var check = document.createElement("input");
        check.type = "checkbox";
        check.name = "checkL";

        var nameC = document.createElement("span");
        nameC.class="text";
        nameC.innerHTML = job;

        var tools = document.createElement("div");
        tools.class = "tools";

        var Iedit = document.createElement("i");
        Iedit.class = "fa fa-edit";

        var Itrash = document.createElement("i");
        Itrash.class = "fa fa-trash-o";

        spanhand.appendChild(I);
        spanhand.appendChild(I2);

        tools.appendChild(Iedit);
        tools.appendChild(Itrash);

        Li.appendChild(spanhand);
        Li.appendChild(check);
        Li.appendChild(nameC);
        Li.appendChild(tools);

        container2.appendChild(Li);



    }

</script>