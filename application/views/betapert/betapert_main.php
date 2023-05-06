<div class="firstpg">
    <div class="title">
        <b> BETA-PERT Distribution </b>
    </div>
    <div class="paragone">
        The BETA-PERT distribution is a type of probability
        distribution that is used in PERT analysis. It combines aspects of both the
        normal and triangular distributions to model uncertainty in task durations.
        <br><br>
        The BETA-PERT distribution is characterized by three parameters: the minimum,
        most likely, and maximum duration for a task. It is often used in scheduler
        calculators to perform simulations that take into account the uncertainty and
        variability of task durations.
        <br> <br>
        <div class = "howto">
            <b>How To?</b> <br>
            • Enter the Number of Activities of your project<br>
            • Choose your desired Unit of Time: Days, Weeks, or Months<br>
            • Click 'Generate Table' to generate a table to input your project details<br><br>
        </div>

    </div>

</div>
<center>
    <div class="form">
        <form action="<?= base_url('betapert/proj_details') ?>" method="post">
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
    <button class="btn">Generate Table</button>
</div>
</form>
<br><br>
