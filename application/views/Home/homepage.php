    <!-- Body  -->

    <body>
        <div class="firstpg">
            <div class="title">
                <b> STANDARD </b>
            </div>
            <div class="paragone">
                Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
                feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
                exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
                <br><br>
                Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
                vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
                adversarium, dicam appetere necessitatibus sed ut.
            </div>
        </div>

        <div class="container">
            <div class="box">
                <h3>PERT</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
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
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
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
            <div class="paragone">
                Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
                feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
                exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
                <br><br>
                Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
                vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
                adversarium, dicam appetere necessitatibus sed ut.
            </div>
        </div>
        <div class="container1">
            <div class="box1">
                <h3>Normal</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
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
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
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
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem
                    nulla dolorum ducimus, tempora suscipit inventore obcaecati architecto
                    rem fuga possimus!
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
                font-size: 24px;
                font-style: normal;
                text-align: justify;
                margin: 2rem 5rem;
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