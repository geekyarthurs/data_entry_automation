<?php

include_once('database.php');

$db = new Database();
$db->connect();
$data = $db->getAll();


if ($_POST['name']) {
    $username = $_POST['name'];
    $job = $_POST['job'];
    $db->pushData($username, $job);
}
// print_r($data);
?>

<form action="index.php" method="POST">

    <input type="text" name="name" placeholder="Name.." required>

    <input type="text" name="job" placeholder="Job.." required>


    <input type="submit" value="Add" name="add">

</form>

<table border="1px" width="100%">
    <tr>
        <th>Name</th>
        <th>Job</th>
    </tr>
    <?php
    foreach ($data as $info) {
        echo "<tr>";
        echo "<td>" . $info['name'] . "</td>";
        echo "<td>" . $info['job'] . "</td>";
    }
    ?>
</table>