<div class="mainpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>BETA-PERT Distribution</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>The BETA-PERT distribution is a type of probability
                        distribution that is used in PERT analysis. It combines aspects of both the
                        normal and triangular distributions to model uncertainty in task durations.
                        <br>
                        The BETA-PERT distribution is characterized by three parameters: the minimum,
                        most likely, and maximum duration for a task. It is often used in scheduler
                        calculators to perform simulations that take into account the uncertainty and
                        variability of task durations.
                    </p>
                </div>
                <div class="howto">
                    <h2>How To?</h2>
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
            <center>
                <div class="form">
                    <form action="<?= base_url('betapert/proj_details') ?>" method="post">
                        <div class="form-group">
                            <label for="InputTask">Number of Activities:</label><br>
                            <input type="number" name="proj_len" class="form-control" id="InputTask" aria-describedby="input" placeholder="Max. 20." min="1" max="20" oninput="validity.valid||(value='');" required>
                        </div>
                        <div class="form-group">
                            <label for="InputTime">Unit of Time:</label><br>
                            <select id="InputTime" name="unit" class="form-control" required>
                                <option value="" disabled selected hidden></option>
                                <option value="Days">Days</option>
                                <option value="Weeks">Weeks</option>
                                <option value="Months">Months</option>
                            </select>
                        </div>
                </div>
            </center>
        </div>

        <div class="generate">
            <button class="btn">Generate Table</button>
        </div>
        </form>
    </div>
</div>