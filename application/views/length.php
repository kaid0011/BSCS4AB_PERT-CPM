<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPM:Project Length</title>
</head>
<body>
    <h3>Enter task quantity</h3>
    <form action="<?php echo base_url('home/choose') ?>" method="post">
        <input type="number" name="proj_len">
        <h4>Without Simulation</h4>
        <input type="submit" name="choice" value="CPM">
        <input type="submit" name="choice" value="PERT">
        <h4>With Simulation</h4>
        <!-- <input type="submit" name="choice" value="Uniform Distribution"> -->
        <input type="submit" name="choice" value="BETA-PERT">
        <input type="submit" name="choice" value="Normal">
        <input type="submit" name="choice" value="Triangular">
    </form>
</body>
</html>