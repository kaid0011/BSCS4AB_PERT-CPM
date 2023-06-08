<div class="homepg">
    <div class="body-container">
        <div class="firstpg">
            <div>
                <form action="<?php echo base_url('project/getProject') ?>" method="post">
                    <div class="form-group">
                        <label for="UserEmail">Email: </label>
                        <input type="email" name="UserEmail" id="UserEmail" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Reference No.</label>
                        <input type="text" name="ReferenceNo" id="ReferenceNo">
                    </div>
                    <button class="btn" onclick="getProject()">Get Project</button>
                </form>
                <!-- error message if project does not exist -->
                <!-- <span style="color: red;">Project does not exist.</span> -->
                <?php
                    if ($this->session->flashdata('message')) {
                        echo '<div style="color: red;">' . $this->session->flashdata("message") . '</div>';
                    }
                ?>
            </div>
            <div class="title">
                <h1>WAPS with Simulation</h1>
                <h2>Web-based Automated PERT-CPM Scheduler with Simulations</h2>
            </div>
            <div class="paragone">
                <p class="paragone">WAPS offers a user-friendly interface that allows you to manage your project activities, durations, and dependencies with ease. By utilizing the power of <b>PERT (Program Evaluation and Review Technique) and CPM (Critical Path Method) algorithms</b>, WAPS helps you plan and schedule your project efficiently.
                    <br><br>
                    We are proud to offer a special feature that is not found in other web applications: the ability to schedule your project using <b>Normal, Triangular, and BETA-PERT Distributions</b>. These distributions are integrated with <b>Monte Carlo Simulations</b> that can create trials <b>up to 1000 times</b>, giving you an accurate estimate of your project completion time and potential risks. You can also download the result of the trials in CSV file.
                    <br><br>
                    With WAPS, you can enter all the necessary details about your project, including the activities required to complete the project, its description, the time required to complete each activity, and the dependencies between the activities. Based on this information, our algorithms calculate the critical path and provide you with an accurate estimate of the project's completion time. You can then use our scheduling feature to create a realistic timeline with a Gantt Chart and estimate the probability of completing the project on time.
                    <br><br>
                    WAPS is suitable for project managers, team leaders, or team members who need to manage their project activities and schedules. With our easy-to-use interface, you can plan ahead, track progress, and make adjustments as needed.
                    <br><br>
                    We have 5 different types of scheduling you can pick from based on your preference.
                </p>
            </div>
        </div>
        <div class="firstpg">
            <div class="title">
                <h3>Without Simulation</h3>
            </div>
            <div class="paragone">
                <p class="paragone">
                    Our scheduling calculators without simulations are fantastic tools that simplifies project management. It comes equipped with two powerful algorithms - <B>PERT and CPM</B> - that enable you to plan and schedule your project with ease. You only need to provide details about your project, and the calculator does the rest. It's simple to use and has a user-friendly interface, making it easy to track progress, identify issues, and make any necessary changes.
                </p>
            </div>
        </div>

        

        <div class="container">
            <div class="box">
                <div class="title">
                    <h4>PERT</h4>
                </div>
                <p>
                    PERT is appropriate technique which is used for the projects where the time required or needed to complete different
                    activities are not known. It provides the blueprint of project and is efficient technique for project evaluation.
                </p>
                <!-- <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('pert') ?>">USE PERT</a>
                    </div>
                </center> -->
            </div>

            <div class="box">
                <div class="title">
                    <h4>CPM</h4>
                </div>
                <p>
                    CPM is a technique which is used for the projects where the time needed for completion of project is already known.
                    It provides minimum time taken for completion of project.
                </p>
                <!-- <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('cpm') ?>">USE CPM</a>
                    </div>
                </center> -->
            </div>
        </div>

        <div class="secondparag">
            <div class="title">
                <h3>With Simulation</h3>
            </div>
            <div class="">
                <p class="secondpara">
                    Our calculators, now with the added benefit of simulation, are a game-changer for project management. These calculators use advanced computations based on <b>Normal, Triangular, and BETA-PERT Distributions</b>, which give you a more precise estimate of your project completion time and potential risks. Monte Carlo Simulation technology enables you to generate <b>up to 1000 trials</b>, providing greater accuracy and confidence in your project plan. This powerful tool can help you stay on track and achieve your goals more effectively.
                </p>
            </div>
        </div>
        <div class="container1">
            <div class="box1">
                <div class="title">
                    <h4>Normal Distribution</h4>
                </div>
                <p>
                    A probability distribution that is symmetric about the mean, indicating that data
                    nearer to the mean occur more frequently than data far from the mean.
                </p>
                <!-- <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('normal') ?>">USE NORMAL</a>
                    </div>
                </center> -->
            </div>
            <div class="box1">
                <div class="title">
                    <h4>Triangular Distribution</h4>
                </div>
                <p>
                    A continuous probability distribution with a triangle-shaped probability density function. It is defined by three values: a minimum value, a maximum value, and a peak value.
                </p>
                <!-- <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('triangular') ?>">USE TRIANGULAR</a>
                    </div>
                </center> -->
            </div>
            <div class="box1">
                <div class="title">
                    <h4>BETA-PERT Distribution</h3>
                </div>
                <p>
                    A special case of BETA Distribution that uses three parameters namely Optimistic, Most Likely, and Pessimistic to create a smooth curve that fits well to the normal or lognormal distribution.
                </p>
                <!-- <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('betapert') ?>">USE BETA-PERT</a>
                    </div>
                </center> -->
            </div>
        </div>
        <br>
    </div>
</div>