<main id="main" class="main">

    <div class="pagetitle">
        <h1>About WAPS</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item active">How To Use</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">

                <div class="card p-3">
                    <div class="card-body">
                        <h5 class="card-title pb-0">How to use WAPS with Simulation's Calculator?</h5>
                        <div class="summary">
                            <h6>To use WAPS with Simulation's Calculator, you must follow these steps:</h6>
                            <ol type="1">
                                <li>
                                    <p class="text-muted small ps-1">Enter the Project Name, Project Description, and Number of Activities of your project.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">Choose your desired Computation Method: CPM, PERT, Normal Distribution, Triangular Distribution, or BETA-PERT Distribution.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">Click 'Generate Table' to generate a table to input your project details.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1"><strong>For CPM: </strong>For each activity, enter the description, duration, and its
                                        pre-requisite/s.</p>
                                    <p class="text-muted small ps-1"><strong>For PERT: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                                        pre-requisite/s.</p>
                                    <p class="text-muted small ps-1"><strong>For Normal Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                                        pre-requisite/s.</p>
                                    <p class="text-muted small ps-1"><strong>For Triangular Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                                        pre-requisite/s.</p>
                                    <p class="text-muted small ps-1"><strong>For BETA-PERT Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                                        pre-requisite/s.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">After completing the table, click 'Calculate' to schedule your project. </p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">A table will show the following information for your project. There is a toggle to show the Basic Mode and Professional Mode:</p>
                                    <p class="text-muted small ps-1"><strong>For Basic Mode: </strong>Activity Name, Activity Description, Minimum Duration, Maximum Duration, Computed Duration, Pre-requisites, Priority Level, and Type.</p>
                                    <p class="text-muted small ps-1"><strong>For CPM: </strong>Activity, Description, Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical.</p>
                                    <p class="text-muted small ps-1"><strong>For PERT: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                    <p class="text-muted small ps-1"><strong>For Normal Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                    <p class="text-muted small ps-1"><strong>For Triangular Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                    <p class="text-muted small ps-1"><strong>For BETA-PERT Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Alpha, Beta, Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                </li>
                            </ol>
                        </div>
                        <div class="explained mt-5">
                            <h6 class="text-uppercase" style="font-weight: 600;">Example:</h6>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>
                                        <h6>Task</h6>
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
                                    <p class="text-muted small ps-1">Enter the Project Name, Project Description, and Number of Activities of your project.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">Choose your desired Unit of Time: Days, Weeks, or Months.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">Choose your desired Computation Method: CPM, PERT, Normal Distribution, Triangular Distribution, or BETA-PERT Distribution.</p>
                                </li>
                            </ul>
                            <img class="w-75" alt="" src="<?= base_url() ?>/assets/images/howtouse/1.png">
                            <ul>
                                <li>
                                    <p class="text-muted small ps-1">Click 'Generate Table' to generate a table to input your project details.</p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="text-muted small ps-1"><strong>For CPM: </strong>For each activity, enter the description, duration, and its
                                        pre-requisite/s.</p>
                                    <img class="w-75" alt="" src="<?= base_url() ?>/assets/images/howtouse/2.png">
                                    <p class="text-muted small ps-1"><strong>For PERT: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), and its
                                        pre-requisite/s.</p>
                                    <img class="w-75" alt="" src="<?= base_url() ?>/assets/images/howtouse/3.png">
                                    <p class="text-muted small ps-1"><strong>For Normal Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), its
                                        pre-requisite/s, and Number Trials.</p>
                                    <img class="w-75" alt="" src="<?= base_url() ?>/assets/images/howtouse/4.png">
                                    <p class="text-muted small ps-1"><strong>For Triangular Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), its
                                        pre-requisite/s, and Number Trials.</p>
                                    <img class="w-75" alt="" src="<?= base_url() ?>/assets/images/howtouse/5.png">
                                    <p class="text-muted small ps-1"><strong>For BETA-PERT Distribution: </strong>For each activity, enter the description, durations (optimistic, most likely, and pessimistic), its
                                        pre-requisite/s, and Number Trials.</p>
                                    <img class="w-75" alt="" src="<?= base_url() ?>/assets/images/howtouse/6.png">
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">After completing the table, click 'Calculate' to schedule your project. </p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="text-muted small ps-1">A table will show the following information for your project. There is a toggle to show the Basic Mode and Professional Mode:</p>
                                    <p class="text-muted small ps-1"><strong>For Basic Mode: </strong>Activity Name, Activity Description, Minimum Duration, Maximum Duration, Computed Duration, Pre-requisites, Priority Level, and Type.</p>
                                    <p class="text-muted small ps-1"><strong>For CPM: </strong>Activity, Description, Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical.</p>
                                    <p class="text-muted small ps-1"><strong>For PERT: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                    <p class="text-muted small ps-1"><strong>For Normal Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                    <p class="text-muted small ps-1"><strong>For Triangular Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                    <p class="text-muted small ps-1"><strong>For BETA-PERT Distribution: </strong>Activity, Description, Three Durations (Optimistic, Most Likely, and Pessismistic), Alpha, Beta, Mean, Standard Deviation, Computed Duration, Pre-Requisites, Earliest Start Time, Earliest Finish Time, Latest Start Time, Latest Finish Time, Slack, and Critical</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">The Critical Path and Project Completion time of the project is located below the table of results.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">You will have an option to download the table of results in Excel file by clicking the "Export Results" button.</p>
                                </li>
                                <li>
                                    <p class="text-muted small ps-1">You will have an option to download an Excel file containing the simulations by clicking the "Export Simulation Values" button.</p>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <p class="text-muted small ps-1">Additionally, a gantt chart and PERT chart is provided for better visualization of the scheduled project activities.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->