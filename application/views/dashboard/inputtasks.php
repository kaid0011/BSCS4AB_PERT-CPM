<div class="inputpg">
    <div class="body-container">
        <div class="grid-container">
            <div class="tablecontainer" style="overflow-x:auto;">
                <div id="d1">
                    <table class="results" id="inputTbl1">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th title="Task Name">Task Name</th>
                                <th title="Task Description">Description</th>
                                <th title="Estimated Activity Duration">Duration </th>
                                <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text1" name="TaskID_1" id="TaskID_1" value="1" readonly></td>
                                <td><input type="text" name="TaskName_1" id="TaskName_1"></td>
                                <td><input type="text" name="TaskDesc_1" id="TaskDesc_1"></td>
                                <td><input type="number" name="Duration_1" id="Duration_1" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="text" name="PreRequisites_1" id="PreRequisites_1" value="-" readonly></td>
                            </tr>
                            <tr>
                                <td><input type="text1" name="TaskID_2" id="TaskID_2" value="2" readonly></td>
                                <td><input type="text" name="TaskName_2" id="TaskName_2"></td>
                                <td><input type="text" name="TaskDesc_2" id="TaskDesc_2"></td>
                                <td><input type="number" name="Duration_2" id="Duration_2" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="text" name="PreRequisites_2" id="PreRequisites_2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="addRowbtn" onclick="addRow1()">+1</button>
                </div> 
                
                <div id="d3">
                    <table class="results" id="inputTbl3">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th title="Task Name">Task Name</th>
                                <th title="Task Description">Description</th>
                                <th title="Shortest Estimated Activity Duration">Optimistic </th>
                                <th title="Reasonable Estimated Activity Duration">Most Likely </th>
                                <th title="Maximum Estimated Activity Duration">Pessimistic </th>
                                <th title="Activity Number that needs to be completed first.">Pre-Requisites </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text1" name="TaskID_1" id="TaskID_1" value="1" readonly></td>
                                <td><input type="text" name="TaskName_1" id="TaskName_1"></td>
                                <td><input type="text" name="TaskDesc_1" id="TaskDesc_1"></td>
                                <td><input type="number" name="Opt_1" id="Opt_1" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="number" name="ML_1" id="ML_1" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="number" name="Pes_1" id="Pes_1" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="text" name="PreRequisites_1" id="PreRequisites_1" value="-" readonly></td>
                            </tr>
                            <tr>
                                <td><input type="text1" name="TaskID_2" id="TaskID_2" value="2" readonly></td>
                                <td><input type="text" name="TaskName_2" id="TaskName_2"></td>
                                <td><input type="text" name="TaskDesc_2" id="TaskDesc_2"></td>
                                <td><input type="number" name="Opt_2" id="Opt_2" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="number" name="ML_2" id="ML_2" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="number" name="Pes_2" id="Pes_2" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value='');" required></td>
                                <td><input type="text" name="PreRequisites_2" id="PreRequisites_2"></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="addRowbtn" onclick="addRow3()">+1</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function addRow1() {
    var rowCount = $('#inputTbl1 tbody tr').length;
    console.log(rowCount);

    var rowID = rowCount + 1;

    if(rowID <= 20) {
        if(rowCount <= 10) {
            $('#inputTbl1 tbody').append('<tr><td><input type="text1" name="TaskID_'+ rowID +'" id="TaskID_'+ rowID +'" value="'
                + rowID +'" readonly></td><td><input type="text" name="TaskName_'
                + rowID +'" id="TaskName_'+ rowID +'"></td><td><input type="text" name="TaskDesc_'
                + rowID +'" id="TaskDesc_'+ rowID +'"></td><td><input type="number" name="Duration_'
                + rowID +'" id="Duration_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="text" name="PreRequisites_'
                + rowID +'" id="PreRequisites_'+ rowID +'" pattern="[1-'+ rowCount +'](,[1-'+ rowCount +'])*|^[\-]" oninvalid="this.setCustomValidity("Enter Valid Activity ID")" onchange="this.setCustomValidity("")" required></td></tr>');
        }
        else if(rowCount > 10) {
            var y = rowID - 11;
            $('#inputTbl1 tbody').append('<tr><td><input type="text1" name="TaskID_'+ rowID +'" id="TaskID_'+ rowID +'" value="'
                + rowID +'" readonly></td><td><input type="text" name="TaskName_'
                + rowID +'" id="TaskName_'+ rowID +'"></td><td><input type="text" name="TaskDesc_'
                + rowID +'" id="TaskDesc_'+ rowID +'"></td><td><input type="number" name="Duration_'
                + rowID +'" id="Duration_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="text" name="PreRequisites_'
                + rowID +'" id="PreRequisites_'+ rowID +'" pattern="([1-9]|1[0-'+ y +'])(,([1-9]|1[0-'+ y +']))*|^[\-]" oninvalid="this.setCustomValidity("Enter Valid Activity ID")" onchange="this.setCustomValidity("")" required></td></tr>');
        }

        if(rowID == 20) {
            document.getElementById('addRowbtn').style.display = "none";
        }
    }
    else {
        document.getElementById('addRowbtn').style.display = "none";
    }
}

function addRow3() {
    var rowCount = $('#inputTbl3 tbody tr').length;
    console.log(rowCount);

    var rowID = rowCount + 1;

    if(rowID <= 20) {
        if(rowCount <= 10) {
            $('#inputTbl3 tbody').append('<tr><td><input type="text1" name="TaskID_'+ rowID +'" id="TaskID_'+ rowID +'" value="'
                + rowID +'" readonly></td><td><input type="text" name="TaskName_'
                + rowID +'" id="TaskName_'+ rowID +'"></td><td><input type="text" name="TaskDesc_'
                + rowID +'" id="TaskDesc_'+ rowID +'"></td><td><input type="number" name="Opt_'
                + rowID +'" id="Opt_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="number" name="ML_'
                + rowID +'" id="ML_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="number" name="Pes_'
                + rowID +'" id="Pes_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="text" name="PreRequisites_'
                + rowID +'" id="PreRequisites_'+ rowID +'" pattern="[1-'+ rowCount +'](,[1-'+ rowCount +'])*|^[\-]" oninvalid="this.setCustomValidity("Enter Valid Activity ID")" onchange="this.setCustomValidity("")" required></td></tr>');
        }
        else if(rowCount > 10) {
            var y = rowID - 11;
            $('#inputTbl3 tbody').append('<tr><td><input type="text1" name="TaskID_'+ rowID +'" id="TaskID_'+ rowID +'" value="'
                + rowID +'" readonly></td><td><input type="text" name="TaskName_'
                + rowID +'" id="TaskName_'+ rowID +'"></td><td><input type="text" name="TaskDesc_'
                + rowID +'" id="TaskDesc_'+ rowID +'"></td><td><input type="number" name="Opt_'
                + rowID +'" id="Opt_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="number" name="ML_'
                + rowID +'" id="ML_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="number" name="Pes_'
                + rowID +'" id="Pes_'+ rowID +'" min="1" max="100" placeholder="Max. 100" step="any" oninput="validity.valid||(value="");" required></td><td><input type="text" name="PreRequisites_'
                + rowID +'" id="PreRequisites_'+ rowID +'" pattern="([1-9]|1[0-'+ y +'])(,([1-9]|1[0-'+ y +']))*|^[\-]" oninvalid="this.setCustomValidity("Enter Valid Activity ID")" onchange="this.setCustomValidity("")" required></td></tr>');
        }

        if(rowID == 20) {
            document.getElementById('addRowbtn').style.display = "none";
        }
    }
    else {
        document.getElementById('addRowbtn').style.display = "none";
    }
}
</script>