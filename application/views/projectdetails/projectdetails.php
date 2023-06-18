<main id="main" class="main">

    <div class="pagetitle">
        <h1>Project Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item active">Calculator</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Project Details -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase pb-0 mb-0">Enter Project Details</h5>
                                <p class="text-muted small">Step 1 of 2</p>

                                <!-- Multi Columns Form -->
                                <form class="row g-3" action="<?= base_url('projectdetails/proj_info') ?>" method="post">
                                    <input type="text" name="ReferenceNo" id="ReferenceNo" value="<?php echo $_SESSION['ReferenceNo']; ?>" hidden>
                                    <div class="col-md-12">
                                        <label for="ProjectName" class="form-label">Project Name</label>
                                        <input type="text" class="form-control" name="ProjectName" id="ProjectName" aria-describedby="input" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="ProjectDesc" class="form-label">Project Description</label>
                                        <textarea type="text" class="form-control" name="ProjectDesc" id="ProjectDesc" aria-describedby="input"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="InputTask" class="form-label">Number of Tasks:</label>
                                        <input type="number" name="proj_len" class="form-control" id="InputTask" aria-describedby="input" placeholder="Min. 2 Max. 20" min="2" max="20" onchange="validity.valid||(value='');" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="InputTime" class="form-label">Unit of Time:</label>
                                        <select id="InputTime" name="unit" class="form-control" required>
                                            <option value="" style="color: gray;" disabled selected>Select Unit of Time</option>
                                            <option value="Days">Days</option>
                                            <option value="Weeks">Weeks</option>
                                            <option value="Months">Months</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="CompType" class="form-label">Computation Method</label><br>
                                        <select name="CompType" id="CompType" class="form-control" required>
                                            <option value="" style="color: gray;" disabled selected>Select Computation Type</option>
                                            <option value="CPM">CPM</option>
                                            <option value="PERT">PERT</option>
                                            <option value="NORMAL">Normal Distribution</option>
                                            <option value="TRIANGULAR">Triangular Distribution</option>
                                            <option value="BETAPERT">BETA-PERT Distribution</option>
                                        </select>
                                    </div>
                                    <div class="generate d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Next Step</button>
                                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                    </div>
                                </form>
                                <!-- End Multi Columns Form -->

                            </div>
                        </div>
                    </div>
                    <!-- Enter Project Details -->

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Steps -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">STEPS</h5>
                        <ol type="1">
                            <li>
                                <p class="text-muted small">Enter your project's name.</p>
                            </li>
                            <li>
                                <p class="text-muted small">Enter your project's description.</p>
                            </li>
                            <li>
                                <p class="text-muted small mb-0">Enter your project's number of tasks.</p>
                                <p class="text-muted small">Minimum of 2; Maximum of 20</p>
                            </li>
                            <li>
                                <p class="text-muted small">Select your unit of time: Days, Weeks, or Months.</p>
                            </li>
                            <li>
                                <p class="text-muted small">Select your preferred computation method: PERT, CPM, Normal Distribution, Triangular Distribution, or BETA-PERT Distribution.</p>
                            </li>
                            <li>
                                <p class="text-muted small">Click 'Next Step' to proceed.</p>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- End Steps -->

            </div>
            <!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->