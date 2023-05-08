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
        </div>
    </div>
    <center>
        <div class="form">
            <form action="<?= base_url('triangular/proj_details') ?>" method="post">
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
<br> <br>
</div>