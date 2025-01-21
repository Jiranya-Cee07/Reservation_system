<?php
include "./conn/conn.php"
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <a href="musicrelax.php">
        <h4>Music-Relax</h4>
    </a>
    <a href="vdo.php">
        <h4>VDO On-Demand</h4>
    </a>
    <a href="theater.php">
        <h4>Mini-Theater</h4>
    </a>
    <button class="bg-green-500 active:bg-green-700">
        Click me
    </button>
</body>

</html>
<?php $conn->close(); ?>