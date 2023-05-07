<div class="firstpg">
    <div class="title">
        <b> Critical Path Method (CPM)</b>
    </div>
    <div class="paragone">
        CPM is a deterministic approach to project management. 
        <br>
        It focuses on identifying the critical path of a project, which is the 
        sequence of activities that determine the project's total duration. 
        <br><br>
        <div class="howto">
       <b> How To?</b><br>
       • Enter the Number of Activities of your project.  <br>
       • Choose your desired Unit of Time: Days, Weeks, or Months.<br>
       • Click 'Generate Table' to generate a table to input your project details.<br>
     </div>
    </div>
<br>
    <center>
        <div class="form">
            <form action="<?= base_url('cpm/proj_details') ?>" method="post">
                <div class="form-group">
                    <label for="InputTask">Number of Activities:</label>
                    <input type="number" name="proj_len" class="form-control" id="InputTask" aria-describedby="input" placeholder="Max. 20." min="1" max="20" oninput="validity.valid||(value='');" required>
                </div>
                <div class="form-group">
                    <label for="InputTime">Unit of Time:</label>
                    <select id="InputTime" name="unit" class="form-control" required>
                        <option value="" disabled selected hidden></option>
                        <option value="Days">Days</option>
                        <option value="Weeks">Weeks</option>
                        <option value="Months">Months</option>
                    </select>
                    <!-- <input type="text" name="unit" class="form-control" id="InputTime" placeholder="(e.g. Days, Weeks, Months)" required> -->
                </div>
                <br>

        </div>
    </center>
</div>

<div class="generate">
    <!-- <a class="btn" href="CPMInput.html">Generate Table</a> -->
    <button class="btn">Generate Table</button>
</div>
</form>

