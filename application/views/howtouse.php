<div class="howtouse">
    <div class="body-container">
        <div class="summary">
            <h1>How to use WAPS with Simulation's Calculator?</h1>
            <h3>To use WAPS with Simulation's Calculator, you must follow these steps:</h3>
            <ol type="1">
                <li>
                    <p>Enter the Project Name, Project Description, and Number of Activities of your project.</p>
                </li>
                <li>
                    <p>Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                </li>
                <li>
                    <p>Choose your desired Computation Method: CPM, PERT, Normal Distribution, Triangular Distribution, or BETA-PERT Distribution.</p>
                </li>
                <li>
                    <p>Click 'Generate Table' to generate a table to input your project details.</p>
                </li>
                <li>
                    <p><strong>For CPM: </strong>For each activity, enter the description, duration, and its
                        pre-requisite/s.</p>
                        <p><strong>For PERT: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                        pre-requisite/s.</p>
                        <p><strong>For Normal Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                        pre-requisite/s.</p>
                        <p><strong>For Triangular Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                        pre-requisite/s.</p>
                        <p><strong>For BETA-PERT Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                        pre-requisite/s.</p>
                </li>
                <li>
                    <p>After completing the table, click 'Calculate' to schedule your project. </p>
                </li>
                <li>
                    <p>A table will show the following information for your project. There is a toggle to show the Basic Mode and Professional Mode:</p>
                    <p><strong>For Basic Mode: </strong>Activity Name, Activity Description, Minimum Duration, Maximum Duration, Computed Duration, Pre-requisites, Priority Level, and Type.</p>
                    <p><strong>For CPM: </strong>Activity, Description, Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical.</p>
                    <p><strong>For PERT: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                    <p><strong>For Normal Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                    <p><strong>For Triangular Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                    <p><strong>For BETA-PERT Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Alpha, Beta, Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                </li>
            </ol>
        </div>
        <div class="explained">
            <h3>Example:</h3>
            <table class="use">
                <tr>
                    <th>
                        <h6>Act</h6>
                    </th>
                    <th>
                        <h6>Desc</h6>
                    </th>
                    <th>
                        <h6>Opt</h6>
                    </th>
                    <th>
                        <h6>ML</h6>
                    </th>
                    <th>
                        <h6>Pes</h6>
                    </th>
                    <th>
                        <h6>Pre-req</h6>
                    </th>
                </tr>
                <tr>
                    <td>
                        <p>1</p>
                    </td>
                    <td>
                        <p>First activity</p>
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
                        <p>Second activity</p>
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
                        <p>Third activity</p>
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
                    <p>Enter the Project Name, Project Description, and Number of Activities of your project.</p>
                </li>
                <li>
                    <p>Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                </li>
                <li>
                    <p>Choose your desired Computation Method: CPM, PERT, Normal Distribution, Triangular Distribution, or BETA-PERT Distribution.</p>
                </li>
            </ul>
            <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/1.png"></center>
            <ul>
                <li>
                    <p>Click 'Generate Table' to generate a table to input your project details.</p>
                </li>
            </ul>
            <ul>
                <li>
                <p><strong>For CPM: </strong>For each activity, enter the description, duration, and its
                        pre-requisite/s.</p>
                        <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/2.png"></center>
                        <p><strong>For PERT: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                        pre-requisite/s.</p>
                        <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/3.png"></center>
                        <p><strong>For Normal Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), its
                        pre-requisite/s, and Number Trials.</p>
                        <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/4.png"></center>
                        <p><strong>For Triangular Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), its
                        pre-requisite/s, and Number Trials.</p>
                        <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/5.png"></center>
                        <p><strong>For BETA-PERT Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), its
                        pre-requisite/s, and Number Trials.</p>
                        <center><img class="how4" alt="" src="<?= base_url() ?>/assets/images/howtouse/6.png"></center>
                    </li>
                <li>
                    <p>After completing the table, click 'Calculate' to schedule your project. </p>
                </li>
            </ul>
            <ul>
                <li>
                <p>A table will show the following information for your project. There is a toggle to show the Basic Mode and Professional Mode:</p>
                    <p><strong>For Basic Mode: </strong>Activity Name, Activity Description, Minimum Duration, Maximum Duration, Computed Duration, Pre-requisites, Priority Level, and Type.</p>
                    <p><strong>For CPM: </strong>Activity, Description, Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical.</p>
                    <p><strong>For PERT: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                    <p><strong>For Normal Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                    <p><strong>For Triangular Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                    <p><strong>For BETA-PERT Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Alpha, Beta, Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
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
            <ul>
                <li>
                    <p>Additionally, a gantt chart and PERT chart is provided for better visualization of the scheduled project activities.</p>
                </li>
            </ul>
        </div>
    </div>
</div>