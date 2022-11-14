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
            <th>Task ID</th>
            <th>Task Name</th>
            <th>Task Time</th>
        </tr>
        <tr>
            <td>1</td>
            <td><?php echo $task_1['1_task_name']; ?></td>
            <td><?php echo $task_1['1_task_time']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo $task_2['2_task_name']; ?></td>
            <td><?php echo $task_2['2_task_time']; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td><?php echo $task_3['3_task_name']; ?></td>
            <td><?php echo $task_3['3_task_time']; ?></td>
        </tr>
        <!-- <tr>
            <td>4</td>
            <td><?php //echo $task_4['4_task_name']; ?></td>
            <td><?php //echo $task_4['4_task_time']; ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td><?php //echo $task_5['5_task_name']; ?></td>
            <td><?php //echo $task_5['5_task_time']; ?></td>
        </tr> -->
    </table>
</body>
</html>