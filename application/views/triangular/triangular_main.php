<div class="mainpg">
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>Triangular Distribution</h1>
            </div>
            <div class="paragone">
                <div class="description">
                    <p>Triangular distribution: In a triangular distribution, the probability of an
                        event occurring is highest at the most likely value, and decreases as the
                        values move away from the most likely value.
                        <br>
                        Triangular distributions are
                        often used in scheduler calculators to represent task durations that have a
                        range of possible values, but are most likely to fall within a specific range.
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
                            <p>Click 'Generate Table' to generate a table to input your project details</p>
                        </li>
                    </ul>
                </div>
            </div>
            <center>
                <div class="form">
                    <form action="<?= base_url('triangular/proj_details') ?>" method="post">
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
            <!-- FOR DEMO PURPOSES -->
            <a class="btn" href="<?= base_url('triangular/demo/demo1') ?>">Demo 1</a>
            <a class="btn" href="<?= base_url('triangular/demo/demo2') ?>">Demo 2</a>
            <a class="btn" href="<?= base_url('triangular/demo/demo3') ?>">Demo 3</a>
        </div>
        </form>
    </div>
</div>