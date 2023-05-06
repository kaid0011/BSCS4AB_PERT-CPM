<div class="firstpg">
    <div class="title">
        <b> Project Evaluation Review Technique (PERT) </b>
    </div>
    <div class="paragone">
    PERT, short for Project Evaluation Review Technique, is a project management tool that assists in estimating the time needed to complete an activity or project. It facilitates effective scheduling and coordination of all project tasks and enables monitoring of the project's progress. PERT is particularly useful in identifying any delays or deviations from the plan.
      <br><br>
     <div class="howto">
       <b> How To?</b><br>
       • Enter the Number of Activities of your project.  <br>
       • Choose your desired Unit of Time: Days, Weeks, or Months.<br>
       • Click 'Generate Table' to generate a table to input your project details.<br>
     </div>
    </div>

    <center>
        <div class="form">
            <form action="<?=base_url('pert/proj_details')?>" method="post">
                <div class="form-group">
                    <label for="InputTask">Number of Activities:</label>
                    <input type="number" name ="proj_len" class="form-control" id="InputTask" aria-describedby="input" placeholder="Max. 20." min="1" max="20" oninput="validity.valid||(value='');" required>
                </div>
                <div class="form-group">
                    <label for="InputTime">Unit of Time:</label>
                    <select id="InputTime" name="unit" class="form-control" required>
                        <option value="" disabled selected hidden></option>
                        <option value="Days">Days</option>
                        <option value="Weeks">Weeks</option>
                        <option value="Months">Months</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="InputTime" placeholder="(e.g. Days, Weeks, Months)"> -->
                </div>
                <br>
            
        </div>
    </center>
</div>


<div class="generate">
    <button class="btn">Generate Table</button>
</div>
</form>
