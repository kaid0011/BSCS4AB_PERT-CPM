    <!-- Body  -->

    <body>
    <div class="firstpg">
        <div class="title">
                <b> WAPS with Simulation </b>
                <h3><i>Web-based Automated PERT-CPM Scheduler with Simulations</i></h3>
            </div>
            <div class="paragone">
            <p class="paragone">WAPS offers a user-friendly interface that allows you to manage your project activities, durations, and dependencies with ease. By utilizing the power of <b>PERT (Program Evaluation and Review Technique) and CPM (Critical Path Method) algorithms</b>, WAPS helps you plan and schedule your project efficiently.
            <br> <br>
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
                <b> WITHOUT SIMULATION </b>
            </div>
            <div class="paragone">
            <p class="paragone">
                Our scheduling calculators without simulations are fantastic tools that simplifies project management. It comes equipped with two powerful algorithms - <B>PERT and CPM</B> - that enable you to plan and schedule your project with ease. You only need to provide details about your project, and the calculator does the rest. It's simple to use and has a user-friendly interface, making it easy to track progress, identify issues, and make any necessary changes.
            </p>
            </div>
        </div>

        <div class="container">
            <div class="box">
                <h3>PERT</h3>
                <p>
                PERT is appropriate technique which is used for the projects where the time required or needed to complete different 
                activities are not known. It provides the blueprint of project and is efficient technique for project evaluation.
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="<?=base_url('pert')?>">USE PERT</a>
                    </div>
                </center>
            </div>

            <div class="box">
                <h3>CPM</h3>
                <p>
                CPM is a technique which is used for the projects where the time needed for completion of project is already known. 
                It provides minimum time taken for completion of project.
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('cpm') ?>">USE CPM</a>
                    </div>
                </center>
            </div>
        </div>

        <div class="secondparag">
            <div class="title">
                <b> WITH SIMULATION </b>
            </div>
            <div class="">
            <p class="secondpara">Our calculators, now with the added benefit of simulation, are a game-changer for project management. These calculators use advanced computations based on <b>Normal, Triangular, and BETA-PERT Distributions</b>, which give you a more precise estimate of your project completion time and potential risks. Monte Carlo Simulation technology enables you to generate <b>up to 1000 trials</b>, providing greater accuracy and confidence in your project plan. This powerful tool can help you stay on track and achieve your goals more effectively. 

            </p>
            </div>
        </div>
        <div class="container1">
            <div class="box1">
                <h3>Normal</h3>
                <p>
                A probability distribution that is symmetric about the mean, indicating that data
                nearer to the mean occur more frequently than data far from the mean.
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('normal') ?>">USE NORMAL</a>
                    </div>
                </center>
            </div>
            <div class="box1">
                <h3>Triangular</h3>
                <p>
                   A continuous probability distribution with a triangle-shaped probability density function. It is defined by three values: a minimum value, a maximum value, and a peak value.
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('triangular') ?>">USE TRIANGULAR</a>
                    </div>
                </center>
            </div>
            <div class="box1">
                <h3>BETA-PERT</h3>
                <p>
                    A special case of BETA Distribution that uses three parameters namely Optimistic, Most Likely, and Pessimistic to create a smooth curve that fits well to the normal or lognormal distribution.
                </p>
                <center>
                    <div class="learn">
                        <a class="btn" href="<?= base_url('betapert') ?>">USE BETA-PERT</a>
                    </div>
                </center>
            </div>
        </div>

        <style>
            .title {
                font-size: 2rem;
                text-align: center;
                margin: 1rem;
                color: #544141;
            }

            .paragone {
                font-size: normal;
                font-style: normal;
                color: #544141;
                text-align: justify;
                margin: 2rem 4rem;
            }

            .secondpara
            {
                font-size: 20px;
                font-style: normal;
                color: #544141;
                text-align: justify;
                margin: 2rem 10rem;
            }

            /* Cards */
            .container {
                justify-content: center;
                display: flex;
                width: auto;
                height: auto;
                margin-bottom: 3rem;
            }

            .box {
                width: 30%;
                height: auto;
                padding: 3px 2px 25px 2px;
                border: 1px solid #ccc;
                margin: 1vh;
                background: white;
                border-radius: 10px;
                transition: 0.9;
            }

            .box:hover {
                box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
                cursor: pointer;
            }

            .container1 {
                justify-content: center;
                display: flex;
                width: auto;
                height: auto;
                margin-bottom: 5rem;
            }

            .box1 {
                width: 32%;
                height: auto;
                padding: 3px 2px 25px 2px;
                border: 1px solid #ccc;
                margin: 1vh;
                background: white;
                border-radius: 10px;
                transition: 0.9;
            }

            .box1:hover {
                box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
                cursor: pointer;
            }

            h3,
            p {
                font-size: 20px;
                padding: 5px 5px;
                text-align: center;
                color: rgb(104, 92, 92);
            }

            p {
                font-size: 15px;
                padding: 5px 5px;
                text-align: center;
                color: rgb(104, 92, 92);
            }


            @media (max-width: 800px) {

                .container,
                .container1 {
                    width: 85%;
                    display: block;
                }

                .box,
                .box1 {
                    width: 100%;
                    margin-bottom: 4%;
                }
            }

            /* .without
{
    flex-direction: column;
    background-color: #eeee;
    
    width: 25%;
    margin: 2rem 1rem;
    padding: 20px 20px;
    border-radius: 10px;
    align-items: center;
}
.withouts
{
    flex-direction: column;
    background-color: #eeee;
    width: 25%;
    margin: 2rem 1rem;
    padding: 20px 20px;
    border-radius: 10px;
    align-items: center;
} */
            .btn {
                text-decoration: none;
                text-align: center;
                font-size: 1rem;
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

            /* Navigation Hamburger */
        </style>