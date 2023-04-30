    <!-- Body  -->

    <body>
        <div class="firstpg">
            <div class="title">
                <b> STANDARD </b>
            </div>
            <div class="paragone">
            <p class="paragone"><b>PERT (Project Evaluation and Review Technique)</b> and <b>CPM (Critical Path Method)</b> are two
            project management techniques used to plan, schedule, and control projects. They are used to determine the minimum time 
            required to complete a project and identify the critical activities that can cause delays in the project timeline.
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
                <b> SIMULATIONS </b>
            </div>
            <div class="">
            <p class="secondpara">A PERT-created estimation has only 50 percent reliability. By using these different probability distributions in a scheduler calculator, project managers can perform simulations to model the potential impact of different scenarios and uncertainties 
            on the project timeline. This allows project managers to make more informed decisions about how to allocate resources and manage risks to ensure the project is completed on time and within budget.
            <br><br>
            Normal, triangular, and BETA-PERT simulations are types of probability distributions that can be used in a scheduler calculator to perform simulations and generate project schedules.
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
            }

            .paragone {
                font-size: 20px;
                font-style: normal;
                color: black;
                text-align: justify;
                margin: 2rem 6rem;
            }

            .secondpara
            {
                font-size: 20px;
                font-style: normal;
                color: black;
                text-align: justify;
                margin: 2rem 10rem;
            }

            /* Cards */
            .container {
                justify-content: space-evenly;
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
                margin: 5vh;
                background: white;
                border-radius: 10px;
                transition: 0.9;
            }

            .box:hover {
                box-shadow: 0 0 11px rgba(33, 33, 33, 0.5);
                cursor: pointer;
            }

            .container1 {
                justify-content: space-evenly;
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
                margin: 5vh;
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