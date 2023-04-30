<div style="overflow-x: auto;">
  <table>
    <tr>
        <th><?php echo "space only"; ?></th>
        <?php
            for ($col = 1; $col <= 5; $col++) { ?>
                <th><?php echo "write $col"; ?></th>
            <?php } ?>
    </tr>
    <?php
        for ($row = 1; $row <= 3; $row++) { ?>
            <tr>
            <th><?php echo "Activity $row"; ?></th>
                <?php
                    for ($col = 1; $col <= 5; $col++) { ?>
                        <th><?php echo "shade"; ?></th>
                    <?php } ?>
            </tr>
    <?php } ?>
  </table>
</div>

<!-- FIRST VERSION FROM CPM -->

<div class="container" style="max-width: 100%; margin: 0 auto; padding: 50px;">
       <div class="chart" style="display: grid; border: 2px solid #000; position: relative; overflow: hidden;">

           <div class="chart-row chart-period">
               <div class="chart-row-item"></div>
               <!-- loop according to project completion time -->
               <?php
                for ($col = 1; $col <= $finish_time; $col++) { ?>
                   <span><?php echo $col; ?></span>
               <?php } ?>
           </div>

           <div class="chart-row chart-lines">
               <!-- loop according to project completion time -->
               <?php
               //$finish_time += 1;
                for ($col = 1; $col <= $finish_time; $col++) { ?>
                   <span></span>
               <?php } ?>
           </div>

           <?php
            $qty -= 1;
            foreach ($project as $task) { ?>
               <div class="chart-row">
                   <div class="chart-row-item"><?php echo "Activity " . $task['id']; ?></div>
                   <ul class="chart-row-bars">
                       <li class="" style="grid-column: <?php echo $task['es']+1; ?>/<?php echo $task['lf']+1; ?>; background-color: #588BAE;"><?php echo $task['desc']; ?></li>
                   </ul>
               </div>
           <?php } ?>
       </div>
   </div>

   <style>
    
    .chart {
           display: grid;
           border: 2px solid #000;
           position: relative;
           overflow: hidden;
       }

       .chart-row {
           display: grid;
           grid-template-columns: 80px 1fr;
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
           grid-template-columns: 80px repeat(12, 1fr);
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
           width: 80px;
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

       ul .chart-li-one {
        grid-column: 1/2;
        background-color: #588BAE;
    }
   </style>


<?php
                        for ($col = 1; $col <= $finish_time; $col++) {
                            if ($col > $task['es'] && $col <= $task['lf']) {
                                $cell = "yes"; ?>
                            <th style="border-bottom-style: ridge; background-color: #00B7D4;"></th>
                        <?php } else {
                                $cell = "no"; ?>
                            <th style="border-bottom-style: ridge; background-color: none;"></th>
                        <?php } ?>

                    <?php }
                        ?>