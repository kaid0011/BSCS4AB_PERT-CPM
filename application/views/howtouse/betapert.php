<div class="howtouse">
    <div class="body-container">
        <div class="summary">
            <h1>How to use WAPS with Simulation's BETA-PERT Distribution?</h1>
            <h3>To use WAPS with Simulation's BETA-PERT Distribution, you must follow these steps:</h3>
            <ol type="1">
                <li>
                    <p>Enter the Number of Activities of your project.</p>
                </li>
                <li>
                    <p>Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                </li>
                <li>
                    <p>Click 'Generate Table' to generate a table to input your project details.</p>
                </li>
                <li>
                    <p>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                        pre-requisite/s.</p>
                </li>
                <li>
                    <p>Enter the Number of Trials you desire for the simulation to perform.</p>
                </li>
                <li>
                    <p>After completing the table, click 'Calculate' to schedule your project. </p>
                </li>
                <li>
                    <p>A table will show the following
                        information for your project: <i> Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Alpha, Beta, Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</i>.</p>
                </li>
            </ol>
        </div>
        <div class="explained">
            <h3>Example:</h3>
            <table class="use">
                <tr>
                    <th>
                        <h6>Activity</h6>
                    </th>
                    <th>
                        <h6>Description</h6>
                    </th>
                    <th>
                        <h6>Optimistic</h6>
                    </th>
                    <th>
                        <h6>Most Likely</h6>
                    </th>
                    <th>
                        <h6>Pessimistic</h6>
                    </th>
                    <th>
                        <h6>Pre-requisite/s</h6>
                    </th>
                </tr>
                <tr>
                    <td>
                        <p>1</p>
                    </td>
                    <td>
                        <p>This is the first activity</p>
                    </td>
                    <td>
                        <p>6</p>
                    </td>
                    <td>
                        <p>9</p>
                    </td>
                    <td>
                        <p>10</p>
                    </td>
                    <td>
                        <p>-</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>2</p>
                    </td>
                    <td>
                        <p>This is the second activity</p>
                    </td>
                    <td>
                        <p>2</p>
                    </td>
                    <td>
                        <p>3</p>
                    </td>
                    <td>
                        <p>6</p>
                    </td>
                    <td>
                        <p>1</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>3</p>
                    </td>
                    <td>
                        <p>This is the third activity</p>
                    </td>
                    <td>
                        <p>2</p>
                    </td>
                    <td>
                        <p>5</p>
                    </td>
                    <td>
                        <p>9</p>
                    </td>
                    <td>
                        <p>1</p>
                    </td>
                </tr>
            </table>
            <ul>
                <li>
                    <p>Enter the Number of Activities of your project.</p>
                </li>
                <li>
                    <p>Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                </li>
            </ul>
            <center><img class="how1" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert1.png"></center>
            <ul>
                <li>
                    <p>Click 'Generate Table' to generate a table to input your project details.</p>
                </li>
            </ul>
            <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert2.png"></center>
            <ul>
                <li>
                    <p>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its pre-requisite/s.</p>
                </li>
                <li>
                    <p>Enter the Number of Trials you desire for the simulation to perform.</p>
                </li>
                <li>
                    <p>After completing the table, click 'Calculate' to schedule your project. </p>
                </li>
            </ul>
            <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert3.png"></center>
            <ul>
                <li>
                    <p>A table will show the following information for your project: Activity, Description, Estimated Duration, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical.</p>
                </li>
                <li>
                    <p>The Critical Path and Project Completion time of the project is located below the table of results.</p>
                </li>
                <li>
                    <p>You will have an option to download the table of results in Excel file by clicking the "Export Results" button.</p>
                </li>
                <li>
                    <p>You will have an option to download an Excel file containing the simulations by clicking the "Export Simulation Values" button.</p>
                </li>
            </ul>
            <center><img class="how6" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert4.png"></center>
            <center><img class="how6" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert5.png"></center>
            <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert6.png"></center>
            <ul>
                <li>
                    <p>Additionally, a gantt chart is provided for better visualization of the scheduled project activities.</p>
                </li>
            </ul>
            <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/betapert/betapert7.png"></center>
        </div>
    </div>
</div>