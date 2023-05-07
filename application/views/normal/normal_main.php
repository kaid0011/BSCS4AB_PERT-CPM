<div class="firstpg">
    <div class="title">
        <b> Normal Distribution </b>
    </div>
    <div class="paragone">
        In normal distribution, the probability of an
        event occurring is evenly distributed around the mean, and the probability
        decreases as the distance from the mean increases. The normal distribution
        is often used in scheduler calculators to represent task durations that are
        evenly distributed around an average value.
        <br><br>
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
        <form action="<?= base_url('normal/proj_details') ?>" method="post">
            <div class="form-group">
                <label for="InputTask">Number of Activities:</label>
                <input type="number" name="proj_len" class="form-control" id="InputTask" min="1" max="20" oninput="validity.valid||(value='');" aria-describedby="input" placeholder="Max. 20." required>
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
