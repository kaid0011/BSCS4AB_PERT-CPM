<div class="firstpg">
    <div class="title">
        <b> TRIANGULAR DISTRIBUTION </b>
    </div>
    <div class="paragone">
    Triangular distribution: In a triangular distribution, the probability of an
        event occurring is highest at the most likely value, and decreases as the
        values move away from the most likely value. 
        <br><br>
        Triangular distributions are
        often used in scheduler calculators to represent task durations that have a
        range of possible values, but are most likely to fall within a specific range.
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
        margin: 2rem 5rem;
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

    input,
    select {
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