<div class="howitworks">
    <div class="body-container">
        <div class="content">
            <div class="triangular">
                <h1>How WAPS with Simulation's Triangular Distribution Works?</h1><br>
                <p><strong>Step 1: </strong> Identifies all the activities involved in the project and arranges them in a logical sequence using their Activity IDs.</p>
                <p><strong>Step 2: </strong> Determines the 3 durations: optimistic (a), most likely (m), and pessimistic (b), which are the estimated times
                    provided by the user for each activity that are required to complete the activities.</p>
                <p><strong>Step 3: </strong> Assigns a random value to a variable r using the random()function that randomly selects a value which was set from 0.0 to 1.0. This value undergoes the Monte Carlo Simulation to achieve a more accurate result. The number of trials is based on the user's input.</p>
                <center>
                    <p><i>r = random()</i></p>
                </center>
                <p><strong>Step 4: </strong> Determines what formula should be used based on a conditional statement:</p>
                <div class="where1">
                    <p>If r < (m-a) / (b-a), <i>assign the following to their own variables:</i></p>
                    <div class="func-desc">
                        <p>x = 1;</p>
                        <p>y = -2a;</p>
                        <p>z = a<sup>2</sup> - r (m - a) (b - a);</p>
                        <p>Then, compute the duration (T) using the formula:</p>
                    </div>
                    <img src="<?= base_url('assets/images/tria_1.png') ?>">
                    <p>Else:</p>
                    <div class="func-desc">
                        <p>x = 1;</p>
                        <p>y = -2b;</p>
                        <p>z = b<sup>2</sup> - (1 - r) (b - a) (b - m);</p>
                        <p>Then, compute the duration (T) using the formula:</p>
                    </div>
                    <img src="<?= base_url('assets/images/tria_2.png') ?>">
                </div>
                <p><strong>Step 5: </strong> Identifies the pre-requisites of each activity, which must be completed before another activity starts.</p>
                <p><strong>Step 6: </strong> Performs a Forward Pass.</p>
                <ol type="a">
                    <li>
                        <p>Forward Pass starts with the first activity, to determine the Early Start Time (ES) and Early Finish Time (EF) for each activity.</p>
                    </li>
                    <li>
                        <p>For each activity, WAPS calculates the ES by adding the duration of the preceding activity to its ES. If an activity has more than one predecessor, the predecessor to be added is the highest one. For the first activity, the ES is equal to 0.</p>
                    </li>
                    <li>
                        <p>Then, calculates the EF by adding the duration of the activity to its ES.</p>
                    </li>
                    <center>
                        <p><i>EF = ES + T</i></p>
                    </center>
                    <li>
                        <p>This process continues until the ES and EF have been calculated for all activities.</p>
                    </li>
                    <li>
                        <p>Identifies the slack of each activity to know the critical path, which is the sequence of activities that has the longest duration and has slack equals to 0.</p>
                    </li>
                </ol>
                <p><strong>Step 7: </strong> Performs a Backward Pass.</p>
                <ol type="a">
                    <li>
                        <p>Backward Pass starts with the last activity, to determine the Latest Start Time (LS) and Latest Finish Time (LF) for each activity.</p>
                    </li>
                    <li>
                        <p>For each activity, WAPS calculates the LF by subtracting the duration of the following activity from its LS. If an activity has more than one successor, the successor to be added is the lowest one. If just starting with the Backward Pass, the duration should be subtracted to the Project Completion Time (PCT).</p>
                    </li>
                    <li>
                        <p>Then, calculates the LS by subtracting the duration of the activity from its LF. This process continues until the LS and LF have been calculated for all activities in the network.</p>
                    </li>
                    <center>
                        <p><i>LS = LF - T</i></p>
                    </center>
                    <li>
                        <p>Calculates the slack (S) for each activity by subtracting the activity's EF from its LF or ES from its LS. If S isequal to zero, the activity is a critical value and completes the critical path.</p>
                    </li>
                    <li>
                        <p>Uses the ES, EF, LS, LF, and S values to identify the project's Critical Path and determine the shortest possible time required to complete the project.</p>
                    </li>
                </ol>
                <p><strong>Step 8: </strong> Uses the Earliest Start Time (ES) and Latest Finish Time (LF) of each activity to create a Gantt Chart. The darker colored bars represent the critical values which complete the Critical Path.</p>
            </div>
        </div>
    </div>
</div>