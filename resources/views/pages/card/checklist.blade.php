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

    var i = 0;

    function createChecklist() {

        console.log(i)
        var job = document.getElementById("appendedInputButton").value;
        var container = document.getElementById("containerChecklist");
        var container2 = document.getElementById("labelChecklist");

        //createChecklist
        var input = document.createElement("input");
        input.type = "hidden";
        var str1 = "sub[";
        var str2 = "]";
        var indexNum = i;
        var res = str1.concat(indexNum,str2);
        input.name = res;
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

        var hiCheck = document.createElement("input");
        hiCheck.type = "hidden";
        var str1 = "checkL[";
        var str2 = "]";
        var indexNum = i;
        var res = str1.concat(indexNum,str2);
        hiCheck.name = res;
        hiCheck.value = 0;

        console.log(hiCheck.name)
        var check = document.createElement("input");
        check.type = "checkbox";
        var str1 = "checkL[";
        var str2 = "]";
        var indexNum = i;
        var res = str1.concat(indexNum,str2);
        check.name = res;
        check.value = 1;

        var nameC = document.createElement("span");
        nameC.class = "text";
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
        Li.appendChild(hiCheck);
        Li.appendChild(check);
        Li.appendChild(nameC);
        Li.appendChild(tools);

        container2.appendChild(Li);

        i++;

    }

</script>