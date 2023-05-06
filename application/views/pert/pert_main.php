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
<style>
    .title {
    font-size: 2rem;
    text-align: center;
    margin: 1rem;
}

.howto
{
    font-size: 22px;
}
.paragone {
    font-size: 24px;
    font-style: normal;
    text-align: justify;
    margin: 2rem 3rem;
}

.generate {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 2rem;
}

.container {
    width: 100%;
}

center {
    width: 75%;
    margin-left: 12%;
}

.form {
    background-color: #f0f0f0;
    border-radius: 1.2rem;
}

.form-group {
    margin: 2rem 5rem;
    text-align: center;
    box-sizing: border-box;

}

input, select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

.btn {
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

.btn:hover {
    background-color: #eeee;
    color: #B19090;

}
@media screen {
    .form {
        background-color: #f0f0f0;
        margin: 0rem 0rem 2rem;
        border-radius: 1.2rem;
        padding: 0.25rem;
    }
}

</style>