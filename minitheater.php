<?php
include "./conn/conn.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music-Relax</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <span>
        <a href="./minitheater_insert.php">
            <h1>insert minitheater room</h1>
        </a></span>
    <span>
        <a href="./admin.php">
            <h1>home</h1>
        </a>
    </span>
    <?php
    $sql = "SELECT * FROM minitheater";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <table width="90%" align="center" border="1 solid green" class="table">
            <tr bgcolor="#f5c74d">
                <td width="3%">
                    <center>รหัสห้อง minitheater</center>
                </td>
                <td width="10%">
                    <center>รูปภาพ</center>
                </td>
                <td width="15%">
                    <center>ชื่อห้อง minitheater</center>
                </td>
                <td width="3%">
                    <center>แก้ไข</center>
                </td>
                <td width="3%">
                    <center>ลบ</center>
                </td>
            </tr>
            <?php
            $i = 0;
            while ($result_array = $result->fetch_assoc()) {
                $i++;
                if (($i % 2) == 1) {
                    echo "<tr bgcolor='#FFFFFF'>";
                } else {
                    echo "<tr bgcolor='#FFFFFF'>";
                }
            ?>
                <td>
                    <center><?php echo $result_array['theater_id']; ?></center>
                </td>
                <td>
                    <center><img src="<?php echo $result_array['image_theater']; ?>" width="100" alt="theater Image"></center>
                </td>
                <td>
                    <center><?php echo $result_array['theater_name']; ?></center>
                </td>
                <td>
                    <center><a href="theater_update.php?abc=<?php echo md5($result_array['theater_id']); ?>">แก้ไข</a></center>
                </td>
                <td>
                    <center><a href="theater_exec.php?abc=<?php echo md5($result_array['theater_id']); ?>&chk=delete" onclick="return confirm('ยืนยันการลบข้อมูล')">ลบ</a></center>
                </td>

                </tr>
            <?php } ?>
        </table>
    <?php
    } else {
        echo "<center>ไม่พบข้อมูล</center>";
    }
    ?>
</body>

</html>