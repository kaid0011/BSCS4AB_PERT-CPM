<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPM:Results</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Prereq</th>
            <th>ES</th>
            <th>EF</th>
            <th>LS</th>
            <th>LF</th>
            <th>Float</th>
            <th>isCritical</th>
        </tr>
        <?php
        foreach ($project as $task) {
        ?>
            <tr>
                <td><?php echo $task['id']; ?></td>
                <td><?php echo $task['desc']; ?></td>
                <td><?php echo $task['time']; ?></td>
                <td><?php
                    foreach($task['prereq'] as $pre) {
                        if($pre == '-1') {
                            echo '-';
                        }
                        else {
                            if(count($task['prereq']) == 1) {                           
                                echo $pre;
                            }
                            else {
                                echo $pre." ";
                            }
                        }
                    }                   
                    ?></td>
                <td><?php echo $task['es']; ?></td>
                <td><?php echo $task['ef']; ?></td>
                <td><?php echo $task['ls']; ?></td>
                <td><?php echo $task['lf']; ?></td>
                <td><?php echo $task['float']; ?></td>
                <td><?php echo $task['isCritical']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>