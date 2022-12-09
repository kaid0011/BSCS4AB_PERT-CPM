<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangular Results</title>
</head>

<body>
    <h1>Triangular</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th>Optimistic</th>
            <th>Most Likely</th>
            <th>Pessimistic</th>
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
                <td><?php echo $task['opt']; ?></td>
                <td><?php echo $task['ml']; ?></td>
                <td><?php echo $task['pes']; ?></td>
                <td><?php echo $task['time']; ?></td>
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
                <td><?php echo $task['float']; ?></td>
                <td><?php echo $task['isCritical']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <h4>Critical Path:
        <?php
        $max = max(array_column($cp, 'id'));
        foreach ($cp as $cp) {
            if ($cp['id'] == $max) {
                echo $cp['id'];
            } else {
                echo $cp['id'] . "-";
            }
        }
        ?>
    </h4>
    <h4>Project Finish Time: <?php echo $finish_time; ?></h4>
</body>

</html>