<div class="mainpg">
    <center>
        <div class="form">
            <div class="form-group">
                <label for="ProjectName">Project Name</label>
                <input type="text" name="ProjectName" id="ProjectName" aria-describedby="input" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ProjectDesc">Project Description</label>
                <input type="text" name="ProjectDesc" id="ProjectDesc" aria-describedby="input" class="form-control" required>
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
            <div class="form-group">
                <label for="StartDate">Start Date</label>
                <input type="date" name="StartDate" id="StartDate" aria-describedby="input" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="CompType">Computation Type</label>
                <select name="CompType" id="CompType" class="form-control" required>
                    <option value="">Select Computation Type</option>
                    <option value="CPM">CPM</option>
                    <option value="PERT">PERT</option>
                    <option value="NORMAL">NORMAL</option>
                    <option value="TRIANGULAR">TRIANGULAR</option>
                    <option value="BETAPERT">BETAPERT</option>
                </select>
            </div>
        </div>
    </center>
</div>