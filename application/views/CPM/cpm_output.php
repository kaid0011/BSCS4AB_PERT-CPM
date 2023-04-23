   <!-- Body  -->
   <div class="firstpg">
       <div class="title">
           <b> CPM Output</b>
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
   <div class="grid-container">
       <div class="grid-item">
           <table class="responsive-table highlight centered">
               <thead>
                   <tr>
                       <th>Activity</th>
                       <th>Description</th>
                       <th>Duration</th>
                       <th>Pre-Requisites</th>
                       <th>ES</th>
                       <th>EF</th>
                       <th>LS</th>
                       <th>LF</th>
                       <th>Slack</th>
                       <th>Critical</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                    foreach ($project as $task) {
                    ?>
                       <tr>
                           <td><?php echo $task['id']; ?></td>
                           <td><?php echo $task['desc']; ?></td>
                           <td><?php echo $task['time'] . " " . $task['unit']; ?></td>
                           <td><?php
                                $pre = implode(",", $task['prereq']);
                                if ($pre == '-1') {
                                    $pre = '-';
                                }
                                echo $pre;
                                ?></td>
                           <td><?php echo $task['es']; ?></td>
                           <td><?php echo $task['ef']; ?></td>
                           <td><?php echo $task['ls']; ?></td>
                           <td><?php echo $task['lf']; ?></td>
                           <td><?php echo $task['slack']; ?></td>
                           <td><?php echo $task['isCritical']; ?></td>
                       </tr>
                   <?php
                    }
                    ?>
               </tbody>
           </table>
       </div>
   </div>
   <!-- <div class="export">
        <a class="btn" href="#">Export to CV</a>
    </div> -->
   <div class="paragone">
       Lorem ipsum dolor sit amet, no clita veritus maiestatis vim, est illum consetetur no. Agam modus an vel. Nibh
       feugiat pericula id eam. Sit aliquam platonem omittantur ut, eum meliore offendit at. Suas alienum at per, ad sit
       exerci vocent docendi, te sea summo feugait. At vim cibo accumsan mnesarchum.
       <br><br>
       Usu nominavi atomorum maluisset ne. Sed ex pertinacia repudiandae, ferri lorem aeque et per. Duo exerci munere an,
       vix malorum diceret fabulas an, nam ei mutat phaedrum. Sed ea timeam suscipiantur, ad eos partem audiam
       adversarium, dicam appetere necessitatibus sed ut.
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

       .calculate {
           display: flex;
           justify-content: center;
           align-items: center;
           margin-bottom: 2rem;
       }

       .grid-container {
           display: grid;
           width: 80rem;
           max-width: 100%;
           margin-left: auto;
           margin-right: auto;
           text-align: center;
       }

       .export {
           text-align: center;
       }

       .btn {
           text-decoration: none;
           text-align: center;
           font-size: 1.2rem;
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

       /* TABLE */
       .responsive-table {
           margin-top: 3rem;
           margin-bottom: 2rem;
           margin-left: auto;
           margin-right: auto;
           align-items: center;
       }

       tbody,
       thead,
       tr,
       td,
       .responsive-table,
       table {}

       /* RESPONSIVE */
       @media screen {
           .form {
               background-color: #f0f0f0;
               margin: 3rem 10rem 2rem;
               border-radius: 1.2rem;
               padding: 0.25rem;
           }
       }
   </style>