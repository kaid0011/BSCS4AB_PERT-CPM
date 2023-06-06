<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2>WAPS with Simulation</h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Project Details</strong></li>
                                <li id="personal"><strong>Input Tasks</strong></li>
                                <li id="payment"><strong>Results</strong></li>
                                <li id="confirm"><strong>Get Access</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>       
                                <input type="hidden" name="ProjectID" id="ProjectID" value="0">                        
                                <?php $this->view('dashboard/projectdetails'); ?>                                   
                                <input type="button" name="next" class="next action-button" value="Next Step">
                            </fieldset>
                            <fieldset>
                                <?php $this->view('dashboard/inputtasks'); ?>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                <input type="button" name="next" class="next action-button" id="Calculate" value="Calculate" />
                            </fieldset>
                            <fieldset>
                                <?php $this->view('dashboard/results'); ?>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                <input type="button" name="make_payment" class="next action-button" value="Finish" />
                            </fieldset>
                            <fieldset>
                                <div>
                                    DITO YUNG PANG APAT
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    html {
        height: 100%;
    }
</style>

<script>
$(document).ready(function() {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function() {

        var x = projDetails();

        var CompType = document.getElementById("CompType").value;
        if(CompType == 'CPM') {
            //show 1 duration div
            document.getElementById('d1').style.display = "block";
            document.getElementById('d3').style.display = "none";
        }
        else {
            //show 3 duration div
            document.getElementById('d1').style.display = "none";
            document.getElementById('d3').style.display = "block";
        }

        if(x == true) {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        }
 
    });

    $("#Calculate").click(function() {

        //check computation type
        //if cpm
        //var x = cpmTasks(); //change function name to cpmTasks()
        //else
        //go respective comptype function
        //ex. pertTasks(), normalTasks()

        var CompType = document.getElementById("CompType").value;
        console.log("CompType: " + CompType);
        if(CompType == 'CPM') {
            var x = cpmTasks();
        }
        else if(CompType == 'PERT') {
            var x = pertTasks();
        }
        else if(CompType == 'NORMAL') {
            var x = normalTasks();
        }
        

        if(x == true) {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        }

    });

    $(".previous").click(function() {

        //projDetails();

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function() {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function() {
        return false;
    })
});

function projDetails() {
    var Form = new FormData();
    var ProjectID = document.getElementById("ProjectID").value;
    var ProjectName = document.getElementById("ProjectName").value;
    var ProjectDesc = document.getElementById("ProjectDesc").value;
    var Unit = document.getElementById("InputTime").value;
    var StartDate = document.getElementById("StartDate").value;
    var CompType = document.getElementById("CompType").value;

    //remove later
    console.log(ProjectID);
    console.log(ProjectName);
    console.log(ProjectDesc);
    console.log(Unit);
    console.log(StartDate);
    console.log(CompType);
    //remove later

    if (ProjectName == "" && ProjectDesc == "" && Unit == "" && StartDate == "" && CompType == "") {
        alert("Fill up all required fields.");
        return false;
    }
    else {        
        Form.append("ProjectID", ProjectID);
        Form.append("ProjectName", ProjectName);
        Form.append("ProjectDesc", ProjectDesc);
        Form.append("Unit", Unit);
        Form.append("StartDate", StartDate);
        Form.append("CompType", CompType);

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/insertProjDetails",
            method: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: Form,
            success: function(data) {
                console.log("Project details insert success"); 
                console.log("PID: " + data);
                $('#ProjectID').val(data);
            },
            error: function(err) {
                console.log(err);
            }
        });     
        return true; 
    }
}

function cpmTasks() {
    var Form = new FormData();
    var TaskIDL = new Array();
	var TaskNameL = new Array();
	var TaskDescL = new Array();
	var DurationL = new Array();
	var PreRequisitesL = new Array();
	var ProjectIDL = new Array();
    var ProjectID = document.getElementById("ProjectID").value;

    var rowCount = $('#inputTbl1 tbody tr').length;

    for(var i = 1; i <= rowCount; i++) {
        var ti = $('#TaskID_'+i).val();
        var tn = $('#TaskName_'+i).val();
        var td = $('#TaskDesc_'+i).val();
        var du = $('#Duration_'+i).val();
        var pr = $('#PreRequisites_'+i).val();

        if(ti != "" && du != "" && pr != "") {
            TaskIDL.push(ti);
            TaskNameL.push(tn);
            TaskDescL.push(td);
            DurationL.push(du);
            PreRequisitesL.push(pr);
            ProjectIDL.push(ProjectID);
        }
    }

    Form.append('ProjectID', ProjectIDL);
    Form.append('TaskID', TaskIDL);
    Form.append('TaskName', TaskNameL);
    Form.append('TaskDesc', TaskDescL);
    Form.append('Duration', DurationL);
    Form.append('PreRequisites', PreRequisitesL);

    $.ajax({
        url: "<?php echo base_url(); ?>cpm/dbCalculate",
        method: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: Form,
        success: function(data) {
            console.log("Task details insert success"); 
            console.log(data);
            getcpmResults(data);
        },
        error: function(err) {
            console.log(err);
        }
    });     
    //return true; 
}

function getcpmResults(data) {
    console.log("getProject - ProjID: " + data);
    var Form = new FormData();
    var ProjectID = data;

    Form.append('ProjectID', ProjectID);

    $.ajax({
        url: "<?php echo base_url(); ?>dashboard/getcpmResults",
        method: 'POST',
        processData: false,
        contentType: false,
        data: Form,
        success: function(data) {
            console.log(data);
            document.getElementById("cpmResults").style.display = "block";
            document.getElementById("pertResults").style.display = "none";
            // document.getElementById("normalResults").style.display = "none";
            // document.getElementById("triResults").style.display = "none";
            // document.getElementById("betaResults").style.display = "none";
            $('#cpmResults tbody').html(data);           
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function pertTasks() {
    var Form = new FormData();
    var TaskIDL = new Array();
	var TaskNameL = new Array();
	var TaskDescL = new Array();
	var OptL = new Array(); 
	var MLiL = new Array(); 
	var PesL = new Array(); 
	var PreRequisitesL = new Array();
	var ProjectIDL = new Array();
    var ProjectID = document.getElementById("ProjectID").value;

    var rowCount = $('#inputTbl3 tbody tr').length;

    for(var i = 1; i <= rowCount; i++) {
        var ti = $('#3TaskID_'+i).val();
        var tn = $('#3TaskName_'+i).val();
        var td = $('#3TaskDesc_'+i).val();
        var op = $('#Opt_'+i).val();
        var ml = $('#ML_'+i).val();
        var pe = $('#Pes_'+i).val();
        var pr = $('#3PreRequisites_'+i).val();

        if(ti != "" && op != "" && ml != "" && pe != "" && pr != "") {

            TaskIDL.push(ti);
            TaskNameL.push(tn);
            TaskDescL.push(td);
            OptL.push(op);
            MLiL.push(ml);
            PesL.push(pe);
            PreRequisitesL.push(pr);
            ProjectIDL.push(ProjectID);
        }
    }

    Form.append('ProjectID', ProjectIDL);
    Form.append('TaskID', TaskIDL);
    Form.append('TaskName', TaskNameL);
    Form.append('TaskDesc', TaskDescL);
    Form.append('Optimistic', OptL);
    Form.append('MostLikely', MLiL);
    Form.append('Pessimistic', PesL);
    Form.append('PreRequisites', PreRequisitesL);

    $.ajax({
        url: "<?php echo base_url(); ?>pert/dbCalculate", //change to pert
        method: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: Form,
        success: function(data) {
            console.log("Task details insert success"); 
            console.log(data);
            getpertResults(data);
        },
        error: function(err) {
            console.log(err);
        }
    });     //done - get data w/ results from db
    return true; 
}

function getpertResults(data) {
    console.log("getProject - ProjID: " + data);
    var Form = new FormData();
    var ProjectID = data;

    Form.append('ProjectID', ProjectID);

    $.ajax({
        url: "<?php echo base_url(); ?>dashboard/getpertResults",
        method: 'POST',
        processData: false,
        contentType: false,
        data: Form,
        success: function(data) {
            console.log(data);
            document.getElementById("pertResults").style.display = "block";
            document.getElementById("cpmResults").style.display = "none";
            // document.getElementById("normalResults").style.display = "none";
            // document.getElementById("triResults").style.display = "none";
            // document.getElementById("betaResults").style.display = "none";
            $('#pertResults tbody').html(data);           
        },
        error: function(err) {
            console.log(err);
        }
    });
}

function normalTasks() {
    var Form = new FormData();
    var TaskIDL = new Array();
	var TaskNameL = new Array();
	var TaskDescL = new Array();
	var OptL = new Array(); 
	var MLiL = new Array(); 
	var PesL = new Array(); 
	var PreRequisitesL = new Array();
	var ProjectIDL = new Array();
    var ProjectID = document.getElementById("ProjectID").value;

    var rowCount = $('#inputTbl3 tbody tr').length;

    for(var i = 1; i <= rowCount; i++) {
        var ti = $('#3TaskID_'+i).val();
        var tn = $('#3TaskName_'+i).val();
        var td = $('#3TaskDesc_'+i).val();
        var op = $('#Opt_'+i).val();
        var ml = $('#ML_'+i).val();
        var pe = $('#Pes_'+i).val();
        var pr = $('#3PreRequisites_'+i).val();

        if(ti != "" && op != "" && ml != "" && pe != "" && pr != "") {

            TaskIDL.push(ti);
            TaskNameL.push(tn);
            TaskDescL.push(td);
            OptL.push(op);
            MLiL.push(ml);
            PesL.push(pe);
            PreRequisitesL.push(pr);
            ProjectIDL.push(ProjectID);
        }
    }

    Form.append('ProjectID', ProjectIDL);
    Form.append('TaskID', TaskIDL);
    Form.append('TaskName', TaskNameL);
    Form.append('TaskDesc', TaskDescL);
    Form.append('Optimistic', OptL);
    Form.append('MostLikely', MLiL);
    Form.append('Pessimistic', PesL);
    Form.append('PreRequisites', PreRequisitesL);

    $.ajax({
        url: "<?php echo base_url(); ?>normal/dbCalculate",
        method: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: Form,
        success: function(data) {
            console.log("Task details insert success"); 
            console.log(data);
            getpertResults(data);
        },
        error: function(err) {
            console.log(err);
        }
    });     //done - get data w/ results from db
    return true; 
}
</script>