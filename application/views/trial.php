<div class="container">
    <div class="chart">
        <div class="chart-row chart-period">
            <div class="chart-row-item"></div>
            <?php
                for ($col = 1; $col <= 5; $col++) { ?>
                    <span><?php echo $col; ?></span>
            <?php } ?>
        </div>
        <div class="chart-row chart-lines">
            <?php
                for ($col = 1; $col <= 5; $col++) { ?>
                    <span></span>
            <?php } ?>
            <!-- <span></span><span></span><span></span>
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
            <span></span><span></span><span></span> -->
        </div>
        <?php
            for ($row = 1; $row <= 5; $row++) { ?>
                <div class="chart-row">
                    <div class="chart-row-item"><?php echo "Activity " . $row; ?></div>
                    <ul class="chart-row-bars">
                        <li class="chart-li-one">Name</li>
                    </ul>
                </div>
        <?php } ?>
        
    </div>

</div>




<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 1200px;
        min-width: 650px;
        margin: 0 auto;
        padding: 50px;
    }

    .chart {
        display: grid;
        border: 2px solid #000;
        position: relative;
        overflow: hidden;
    }

    .chart-row {
        display: grid;
        grid-template-columns: 50px 1fr;
        background-color: #DCDCDC;
    }

    .chart-row:nth-child(odd) {
        background-color: #C0C0C0;
    }

    .chart-period {
        color: #fff;
        background-color: #708090 !important;
        border-bottom: 2px solid #000;
        grid-template-columns: 50px repeat(12, 1fr);
    }

    .chart-lines {
        position: absolute;
        height: 100%;
        width: 100%;
        background-color: transparent;
        grid-template-columns: 50px repeat(12, 1fr);
    }

    .chart-period>span {
        text-align: center;
        font-size: 13px;
        align-self: center;
        font-weight: bold;
        padding: 15px 0;
    }

    .chart-lines>span {
        display: block;
        border-right: 1px solid rgba(0, 0, 0, 0.3);
    }

    .chart-row-item {
        background-color: #808080;
        border: 1px solid #000;
        border-top: 0;
        border-left: 0;
        padding: 20px 0;
        font-size: 15px;
        font-weight: bold;
        text-align: center;
    }

    .chart-row-bars {
        list-style: none;
        display: grid;
        padding: 15px 0;
        margin: 0;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 10px 0;
        border-bottom: 1px solid #000;
    }

    li {
        font-weight: 450;
        text-align: left;
        font-size: 15px;
        min-height: 15px;
        background-color: #708090;
        padding: 5px 15px;
        color: #fff;
        overflow: hidden;
        position: relative;
        cursor: pointer;
        border-radius: 15px;
    }

    ul .chart-li-one {
        grid-column: 1/2;
        background-color: #588BAE;
    }

    ul .chart-li-two-a {
        grid-column: 2/2;
        background-color: #0080FF;
    }

    ul .chart-li-two-b {
        grid-column: 2/4;
        background-color: #4682B4;
    }

    ul .chart-li-three {
        grid-column: 3/5;
        background-color: #57A0D3;
    }

    ul .chart-li-four {
        grid-column: 3/9;
        background-color: #0E4D92;
    }

    ul .chart-li-five {
        grid-column: 7/10;
        background-color: #4F97A3;
    }

    ul .chart-li-six {
        grid-column: 10/12;
        background-color: #73C2FB;
    }

    ul .chart-li-seven {
        grid-column: 12/12;
        background-color: #0080FF;
    }
</style>