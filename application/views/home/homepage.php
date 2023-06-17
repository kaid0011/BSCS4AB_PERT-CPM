<main id="main" class="main">

    <div class="pagetitle">
        <h1>Home</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">WAPS</a></li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row" style="">


                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title text-uppercase">What is WAPS?</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h5>Web-based Automated PERT-CPM Scheduler with Simulation</h5>
                                        <p class="text-muted small pt-2 ps-1">WAPS offers a user-friendly interface that allows you to manage your project activities, durations, and dependencies with ease. By utilizing the power of PERT (Program Evaluation and Review Technique) and CPM (Critical Path Method) algorithms, WAPS helps you plan and schedule your project efficiently.</p>
                                        <p class="text-muted small pt-2 ps-1">We are proud to offer a special feature that is not found in other web applications: the ability to schedule your project using Normal, Triangular, and BETA-PERT Distributions. These distributions are integrated with Monte Carlo Simulations that can create trials up to 1000 times, giving you an accurate estimate of your project completion time and potential risks. You can also download the result of the trials in CSV file.</p>
                                        <p class="text-muted small pt-2 ps-1">With WAPS, you can enter all the necessary details about your project, including the activities required to complete the project, its description, the time required to complete each activity, and the dependencies between the activities. Based on this information, our algorithms calculate the critical path and provide you with an accurate estimate of the project's completion time. You can then use our scheduling feature to create a realistic timeline with a Gantt Chart and estimate the probability of completing the project on time.</p>
                                        <p class="text-muted small pt-2 ps-1">WAPS is suitable for project managers, team leaders, or team members who need to manage their project activities and schedules. With our easy-to-use interface, you can plan ahead, track progress, and make adjustments as needed.</p>
                                    </div>
                                </div>

                                <div id="firstpg"></div>

                            </div>
                        </div>

                    </div>
                    <!-- End Customers Card -->


                    <!-- Without Simulation Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Calculation Without Simulation</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <!-- <h5>Without Simulation</h5> -->
                                        <p class="text-muted small ps-1">Our scheduling calculators without simulations are fantastic tools that simplifies project management. It comes equipped with two powerful algorithms - PERT and CPM - that enable you to plan and schedule your project with ease. You only need to provide details about your project, and the calculator does the rest. It's simple to use and has a user-friendly interface, making it easy to track progress, identify issues, and make any necessary changes.</p>
                                    </div>


                                </div>

                                <!-- Bordered Tabs Justified -->
                                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100 active" id="pert-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-pert" type="button" role="tab" aria-controls="pert" aria-selected="true">PERT</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="cpm-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-cpm" type="button" role="tab" aria-controls="cpm" aria-selected="false">CPM</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                    <div class="tab-pane fade show active" id="bordered-justified-pert" role="tabpanel" aria-labelledby="pert-tab">
                                        <p class="text-muted small ps-1">
                                            PERT is appropriate technique which is used for the projects where the time required or needed to complete different activities are not known. It provides the blueprint of project and is efficient technique for project evaluation.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="bordered-justified-cpm" role="tabpanel" aria-labelledby="cpm-tab">
                                        <p class="text-muted small ps-1">
                                            CPM is a technique which is used for the projects where the time needed for completion of project is already known. It provides minimum time taken for completion of project.
                                        </p>
                                    </div>
                                </div><!-- End Bordered Tabs Justified -->

                            </div>
                        </div>

                    </div>
                    <!-- End Without Simulation Card -->

                    <!-- With Simulation Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title text-uppercase">Calculation With Simulation</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <!-- <h5>Without Simulation</h5> -->
                                        <p class="text-muted small ps-1">Our calculators, now with the added benefit of simulation, are a game-changer for project management. These calculators use advanced computations based on Normal, Triangular, and BETA-PERT Distributions, which give you a more precise estimate of your project completion time and potential risks. Monte Carlo Simulation technology enables you to generate up to 1000 trials, providing greater accuracy and confidence in your project plan. This powerful tool can help you stay on track and achieve your goals more effectively.</p>
                                    </div>
                                </div>

                                <!-- Bordered Tabs Justified -->
                                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100 active" id="normal-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-normal" type="button" role="tab" aria-controls="normal" aria-selected="true">Normal Distribution</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="triangular-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-triangular" type="button" role="tab" aria-controls="triangular" aria-selected="false">Triangular Distribution</button>
                                    </li>
                                    <li class="nav-item flex-fill" role="presentation">
                                        <button class="nav-link w-100" id="betapert-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-betapert" type="button" role="tab" aria-controls="betapert" aria-selected="false">BETA-PERT Distribution</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                                    <div class="tab-pane fade show active" id="bordered-justified-normal" role="tabpanel" aria-labelledby="normal-tab">
                                        <p class="text-muted small ps-1">
                                            A probability distribution that is symmetric about the mean, indicating that data nearer to the mean occur more frequently than data far from the mean.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="bordered-justified-triangular" role="tabpanel" aria-labelledby="triangular-tab">
                                        <p class="text-muted small ps-1">
                                            A continuous probability distribution with a triangle-shaped probability density function. It is defined by three values: a minimum value, a maximum value, and a peak value.
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="bordered-justified-betapert" role="tabpanel" aria-labelledby="betapert-tab">
                                        <p class="text-muted small ps-1">
                                            A special case of BETA Distribution that uses three parameters namely Optimistic, Most Likely, and Pessimistic to create a smooth curve that fits well to the normal or lognormal distribution.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Bordered Tabs Justified -->

                            </div>
                        </div>

                    </div>
                    <!-- End With Simulation Card -->
                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">


                <!-- No Project Yet -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">No Project Yet?</h5>
                        <div class="align-items-center">
                            <div class="row ps-3">
                                <div class="col-10">
                                    <p class="text-muted small">Don't know which algorithm to choose? Know more about the different methods available!</p>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex justify-content-end">
                                        <a href="#firstpg">
                                            <button type="button" class="btn btn-primary btn-small">
                                                <i class="bi bi-arrow-right"></i>
                                            </button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row ps-3">
                                <div class="col-10">
                                    <p class="text-muted small">Ready to calculate project timeline?</p>
                                </div>
                                <div class="col-2">
                                    <div class="d-flex justify-content-end">
                                        <a href="<?= base_url('projectdetails') ?>">
                                            <button type="button" class="btn btn-primary btn-small">
                                                <i class="bi bi-arrow-right"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End No Project Yet -->
                <!-- Access Project Again -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase pb-0">Access a Project Again</h5>
                        <p class="text-muted small">Enter you E-mail and Project Reference No. to access a project calculation again.</p>
                        <div class="d-flex align-items-center">
                            <div class="px-3 w-100">
                                <form action="<?php echo base_url('project/getProject') ?>" method="post">
                                    <div class="form-group">
                                        <label for="UserEmail">
                                            <h6>Email Address:</h6>
                                        </label>
                                        <input class="form-control" type="email" name="UserEmail" id="UserEmail" autocomplete="off" placeholder="Enter a valid email address">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>
                                            <h6>Project's Reference Number:</h6>
                                        </label>
                                        <input class="form-control" type="text" name="ReferenceNo" id="ReferenceNo" placeholder="ex. 12345678">
                                    </div>
                                    <div class="generate d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary" onclick="getProject()">Access Project</button>
                                    </div>
                                </form>
                                <!-- error message if project does not exist -->
                                <!-- <span style="color: red;">Project does not exist.</span> -->
                                <?php
                                if ($this->session->flashdata('message')) {
                                    echo '<div style="color: red;">' . $this->session->flashdata("message") . '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Access Project Again -->

                <!-- Computation Methods Usage -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title text-uppercase">Computation Methods Usage</h5>

                        <div id="trafficChart" style="min-height: 400px; padding-bottom: 0;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '0%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Usage Percentage',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: 1048,
                                                name: 'PERT'
                                            },
                                            {
                                                value: 735,
                                                name: 'CPM'
                                            },
                                            {
                                                value: 580,
                                                name: 'Normal Distribution'
                                            },
                                            {
                                                value: 484,
                                                name: 'Triangular Distribution'
                                            },
                                            {
                                                value: 300,
                                                name: 'BETA-PERT Distribution'
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>

                    </div>

                </div>
                <!-- End Computation Methods Usage -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->