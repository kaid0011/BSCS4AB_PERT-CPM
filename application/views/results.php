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
        <th>Name</th>
        <th>Time</th>
        <th>Prereq</th>
        <th>ES</th>
        <th>EF</th>
        <th>LS</th>
        <th>LF</th>
        <th>Float</th>
        <th>isCritical</th>
        </tr>
        <?php
        for ($i = 1; $i < $qty; $i++) {
        ?>
            <tr>
                <td><?php echo ${"task_id_" . $i}['id']; ?></td>
                <td><?php echo ${"task_id_" . $i}['name']; ?></td>
                <td><?php echo ${"task_id_" . $i}['time']; ?></td>
                <td><?php echo ${"task_id_" . $i}['prereq']; ?></td>
                <td><?php echo ${"task_id_" . $i}['es']; ?></td>
                <td><?php echo ${"task_id_" . $i}['ef']; ?></td>
                <td><?php echo ${"task_id_" . $i}['ls']; ?></td>
                <td><?php echo ${"task_id_" . $i}['lf']; ?></td>
                <td><?php echo ${"task_id_" . $i}['float']; ?></td>
                <td><?php echo ${"task_id_" . $i}['isCritical']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>