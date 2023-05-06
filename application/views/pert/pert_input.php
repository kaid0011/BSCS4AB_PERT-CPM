<div class="firstpg">
    <div class="title">
        <b> Project Evaluation Review Technique (PERT) </b>
    </div>
    <div class="paragone">
        PERT calculates three time estimates for each activity: optimistic, pessimistic, and most likely. 
      <br>These estimates are then used to calculate the expected time for each activity and the entire project.
<br><br>
      <div class="howto">
       <b> How To?</b><br>
       • For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its 
        pre-requisite/s.  <br>
       • After completing the table, click 'Calculate' to schedule your project. A table will show the following 
information for your project: <i> Activity, Description, Three Durations, Mean, Standard Deviation, Variance, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i><br>
       • After generating the results of your input, you will have a choice to calculate completion probability 
based on your expected duration. There are 2 types: Project Completion Probability and Activity 
Completion Probability.<br>
     </div>
    </div>
    <!-- <div class="instructions" style="overflow-x:auto;"> 
      <p>INSTRUCTIONS:</p>
    <dl>
      <li> DESCRIPTION - Enter the name or description of the activity.</li>
      <li> OPTIMISTIC - Enter the measure of estimated optimistic time.</li>
      <li> PESSIMISTIC - Enter the measure of estimated pessimistic time.</li>
      <li> MOST LIKELY - Enter the measure of estimated most likely time.</li>
      <li> PRE-REQUISITES - Enter the <b>activity number</b> of the required activity.</li>
    </dl>
    </div> -->
   
</div>

<br>
<div class="container" style="overflow-x:auto;">
      <table class="table">
        <thead>
            <tr>
            <th>Activity</th>
                <th title ="Activity Description">Description <span class="tooltiptext">&#9432;</span></th>
                <th title ="Shortest Estimated Activity Duration">Optimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Reasonable Estimated Activity Duration">Most Likely <span class="tooltiptext">&#9432;</span></th>
                <th title ="Maximum Estimated Activity Duration">Pessimistic <span class="tooltiptext">&#9432;</span></th>
                <th title ="Activity Number that needs to be completed first.">Pre-Requisites <span class="tooltiptext">&#9432;</span></th>
            </tr>
        </thead>
        <tbody>
            <form action="<?php echo base_url('pert/calculate') ?>" method="post">
                <input type="number" name="proj_len" value="<?php echo $proj_len; ?>" hidden>
                <input type="text" name="choice" value="<?php echo 'pert'; ?>" hidden>
                <input type="text" name="unit" value="<?php echo $unit; ?>" hidden>
                <?php
                for ($i = 1; $i <= $proj_len; $i++) {
                ?>
                    <tr>
                        <td><input type="text1" name="<?php echo $i; ?>" value="<?php echo $i; ?>" readonly></td>
                        <td><input type="text" name="task_desc_<?php echo $i; ?>"></td>
                        <!-- <td><textarea  name = "task_desc_<?php echo $i; ?>"></textarea></td> -->
                        <td><input type="number" name="task_opt_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
                        <td><input type="number" name="task_ml_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
                        <td><input type="number" name="task_pes_<?php echo $i; ?>" step="any"  min="1" max="20" oninput="validity.valid||(value='');" required></td>
                        <td><?php
                            if ($i == 1) {
                            ?>
                                <input type="text" name="task_prereq_<?php echo $i; ?>" value="-" readonly>
                            <?php
                            } else { ?>
                                <input type="text" name="task_prereq_<?php echo $i; ?>" pattern="[1-<?php echo $i-1; ?>](,[1-<?php echo $i-1; ?>])*|^[\-]" 
                                oninvalid="this.setCustomValidity('bawal yan haha XD')" onchange="this.setCustomValidity('')" required>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }
            ?>
        </tbody>
    </table>  
</div>
<br><br>
<div class="calculate">
        <button class="btn">Calculate</button>      
    </div> 

    <div class="box">
	<a class="button" href="#popup1"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
    </div>
    <br>
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Must Know!</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                    <b>• Activity</b>
                   <br>
                    The activity column is auto iterated from 1 by the system and cannot be changed.<br>
                    <b>• Description</b>
                   <br>
                    Description of each activity with a maximum of 50 characters. <br>
                    <i>This is an optional input</i><br>
                    <b>• Optimistic</b><br>
                    The minimum amount of time required to finish a task, assuming that the progress is faster than
                    the typical expectations.
                    Optimistic duration must be a positive integer. Decimals are accepted.<br>
                    <b>• Most Likely</b><br>
                    The expected duration for completing a task, assuming that progress is in accordance with 
                    standard expectations. Most Likely duration must be a positive integer. Decimals are accepted. <br>
                    <b>• Pessimistic</b><br>
                    The maximum amount of time required to complete a task, assuming everything that could 
                    possibly go wrong, actually goes wrong. <br>
                    Pessimistic duration must be a positive integer. Decimals are accepted.<br>
                   <b> • Pre-requisites </b><br>
                    The activity/s that must be completed before the current activity starts. 
                    The first activity's pre-requisite is automatically set to '-' that means none.
                    Pre-requisites of each activity must be existing activity numbers separated by commas without 
                    spaces. If there are no pre-requisites, enter '-'<br>
            </div>
        </div>
    </div>

    <style>
        .title {
    font-size: 2rem;
    text-align: center;
    margin: 1rem;
}

.paragone {
    font-size: 24px;
    font-style: normal;
    text-align: justify;
    margin: 2rem 3rem;
}
.howto
{
    font-size: 22px;
    
}
.instructions
{
    font-style: normal;
    text-align: justify;
    margin-left: 25rem;
    margin-right: 25rem;
}

.instructions p
{
    font-size: 20px;
}

dl
{
    padding-right: 20rem;
    padding-bottom: 5rem;
}

.calculate
{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 2rem;
}

.container
{
    width: 99rem;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}

.btn
{
    text-decoration: none;
    text-align: center;
    font-size: 1.2rem;
    color: #eeee; 
    background-color: #B19090;
    border-radius: 40px;
    display: inline-block;
    padding: 10px 20px;
    border-color: #544141;

}

.btn:hover
{
    background-color: #eeee;
    color:#B19090;
    cursor: pointer;
    
}

/* TABLE */
table {
    padding: 1rem;
    margin-top: 3rem;
    margin-bottom: 2rem;
    margin-left: auto;
    margin-right: auto;
    align-items: center;
    border-spacing: 0;
    border: none;
    overflow: hidden;
    border-radius: .8em;
    border-collapse: collapse;
    border-style: none;
    text-align: center;
    background-color: #f0f0f0;
    
}

td,
th 
{
    border: none;
    border-collapse: collapse;
    border-style: none;
    text-align: center;
    padding: .5rem .8rem;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    border-radius: 0;
    background-color: transparent;
}
tr 
{
    border-bottom: 1px solid #ddd;
}
td{
    background-color: #f0f0f0;
}

th{
    background-color: #d9c7c7;
    padding: 15px;
    
}

input[type=text1]
{
    border-style: none;
    text-align: center;
    font-size: 2.5vh;
    background-color: transparent;
}

input[type=numbers]
{
    width:14rem;
    padding:.5rem;
}
input
{
    /* background-color: transparent; */
    border-radius: 5px;
    border: .5px solid;
    padding: 5px;
}

textarea
{
    /* background-color: transparent; */
    border: .5px solid;
    border-radius: 5px;
    /* padding: 3px; */
    resize: none;
    /* margin: 3px; */
}
/* POPUP */
.box {
        position: fixed;
        bottom: 0px;
        right: 0px; 
        width: 90%;
        margin-right:1em; 
        padding: 3em;
        /* background-clip: padding-box;  */
        text-align: right;
        justify-content: right;
        display: flex;
    
    }

    .button {
    font-size: 3em;
    padding: 10px;
    color: #D7D0D0;
    cursor: pointer;
    transition: all 0.3s ease-out;
    }

    .button:hover {
        color: #B19090;
    }

    .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 200ms;
    visibility: hidden;
    opacity: 0;
    }
    .overlay:target {
    visibility: visible;
    opacity: 1;
    }

    .popup {
    margin: 70px auto;
    padding: 20px;
    background: #f0f0f0;
    border-radius: 5px;
    width: 30%;
    position: relative;
    transition: all 5s ease-in-out;
    }

    .popup h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
    }
    .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
    }
    .popup .close:hover {
    color: #06D85F;
    }
    .popup .content {
    max-height: 30%;
    overflow: auto;
    }

@media screen and (max-width: 700px){
.box{
width: 70%;
}
.popup{
width: 70%;
}
}
/* RESPONSIVE */
@media screen {
.form
{
background-color: #f0f0f0;
margin: 3rem 10rem 2rem;
border-radius: 1.2rem;
padding: 0.25rem;
}
}
@media only screen and (max-width: 1500px) and (min-width: 300px)
{
    .table
    {
        margin-left: 3vh;
        margin-right: 5vh;
    }
}
    </style>