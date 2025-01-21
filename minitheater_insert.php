<?php
include "./conn/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music-Relax Insert</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <a href="./minitheater.php">
        <h1>home admin</h1>
    </a>
    <form action="minitheater_exec.php" method="POST" enctype="multipart/form-data">
        <table width="500" align="center">
            <tr>
                <td colspan="2">
                    <center>
                        <h1>เพิ่มสินค้า</h1>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <center>รหัสห้อง minitheater</center>
                </td>
                <td>
                    <input type="number" name="theater_id" id="theater_id">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image_theater">อัปโหลดรูปภาพ</label><br>
                </td>
                <td>
                    <input type="file" id="image_theater" name="image_theater" accept="image_theater/jpeg, image_theater/png" required><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <center>ชื่อห้อง minitheater</center>
                </td>
                <td>
                    <input type="text" id="theater_name" name="theater_name" required><br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="chk" id="chk" value="insert">
                    <center>
                        <input type="submit" name="save" id="save" value="บันทึก">
                        <input type="reset" name="reset" id="reset" value="ยกเลิก">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php $conn->close(); ?>