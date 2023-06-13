<div class="projectdetailspg">
    <div class="left-button">
        <button onclick="back()"><i class="fa fa-arrow-left"></i></button>
    </div>
    <div class="body-container">
        <div class="firstpg">
            <div class="title">
                <h1>WAPS with Simulation Calculator</h1>
            </div>
            <div class="dashboard">
                <div class="progress-circle">
                    <div class="steps">
                        <span class="circle active">1</span>
                        <span class="circle">2</span>
                        <span class="circle">3</span>
                        <div class="progress-bar">
                            <span class="indicator1"></span>
                        </div>
                    </div>
                </div>
                <div class="progress-label">
                    <div class="steps">
                        <span class="">Project<br>Details</span>
                        <span class="">Input<br>Taks</span>
                        <span class="">Results</span>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <div class="form">
                <form action="<?= base_url('projectdetails/proj_info') ?>" method="post">
                    <input type="text" name="ReferenceNo" id="ReferenceNo" value="<?php echo $_SESSION['ReferenceNo']; ?>" hidden>
                    <div class="form-group">
                        <label for="ProjectName">Project Name</label><br>
                        <input type="text" name="ProjectName" id="ProjectName" aria-describedby="input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ProjectDesc">Project Description</label><br>
                        <textarea type="text" name="ProjectDesc" id="ProjectDesc" aria-describedby="input" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputTask">Number of Tasks:</label><br>
                        <input type="number" name="proj_len" class="form-control" id="InputTask" aria-describedby="input" placeholder="Min. 2 Max. 20" min="2" max="20" onchange="validity.valid||(value='');" required>
                    </div>
                    <div class="form-group">
                        <label for="InputTime">Unit of Time:</label><br>
                        <select id="InputTime" name="unit" class="form-control" required>
                            <option value="" style="color: gray;" disabled selected>Select Unit of Time</option>
                            <option value="Days">Days</option>
                            <option value="Weeks">Weeks</option>
                            <option value="Months">Months</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                            <label for="StartDate">Start Date</label>
                            <input type="date" name="StartDate" id="StartDate" aria-describedby="input" class="form-control" required>
                        </div> -->
                    <div class="form-group">
                        <label for="CompType">Computation Method</label><br>
                        <select name="CompType" id="CompType" class="form-control" required>
                            <option value="" style="color: gray;" disabled selected>Select Computation Type</option>
                            <option value="CPM">CPM</option>
                            <option value="PERT">PERT</option>
                            <option value="NORMAL">NORMAL</option>
                            <option value="TRIANGULAR">TRIANGULAR</option>
                            <option value="BETAPERT">BETAPERT</option>
                        </select>
                    </div>
            </div>
        </center>

        <div class="generate">
            <button class="btn">Generate Table</button>
        </div>
    </div>
    </form>

</div>
</div>

<script>
    function back() {
        if (confirm("Are you sure you want to go back? Your progress will be lost.")) {
            history.go(-1);
        }
        return false;
    }
</script>