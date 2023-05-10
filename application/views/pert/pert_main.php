<div class="body-container">
    <div class="firstpg">
        <div class="title">
            <h1>Project Evaluation Review Technique (PERT) </h1>
        </div>
        <div class="paragone">
            <div class="description">
                <p>PERT, short for Project Evaluation Review Technique, is a project management tool that assists in estimating the time needed to complete an activity or project. It facilitates effective scheduling and coordination of all project tasks and enables monitoring of the project's progress. PERT is particularly useful in identifying any delays or deviations from the plan.
                </p>
            </div>
            <div class="howto">
                <h2> How To?</h2>
                <ul>
                    <li>
                        <p>Enter the Number of Activities of your project.</p>
                    </li>
                    <li>
                        <p>Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                    </li>
                    <li>
                        <p>Click 'Generate Table' to generate a table to input your project details.</p>
                    </li>
                </ul>
            </div>
        </div>
        </br>
        <center>
            <div class="form">
                <form action="<?= base_url('pert/proj_details') ?>" method="post">
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
</div>