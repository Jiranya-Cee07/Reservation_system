<?php
include "./conn/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VDO on-demand</title>
</head>

<body>
    <table width="300" align="center">
        <tr bgcolor="#66CCCC">
            <td>
                <?php
                if ($_POST['chk'] == "insert") {
                    $vdo_id = $_POST['vdo_id'];
                    $vdo_name = $_POST['vdo_name'];

                    // จัดการกับไฟล์รูปภาพ
                    $image_vdo = $_FILES['image_vdo']['name'];
                    $target_dir = "uploads/"; // โฟลเดอร์ที่ใช้เก็บไฟล์รูปภาพ
                    $target_file = $target_dir . basename($image_vdo);

                    // อัปโหลดไฟล์รูปภาพไปยังโฟลเดอร์
                    if (move_uploaded_file($_FILES['image_vdo']['tmp_name'], $target_file)) {
                        echo "อัปโหลดรูปภาพสำเร็จ.";
                    } else {
                        echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ.";
                    }

                    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล
                    $sql = "INSERT INTO vdo (vdo_id, image_vdo, vdo_name)";
                    $sql .= "VALUES ('$vdo_id', '$target_file', '$vdo_name')";

                    // ดำเนินการคำสั่ง SQL
                    if ($conn->query($sql) === TRUE) {
                        echo "บันทึกข้อมูลสำเร็จ!";
                        echo "<center>กรุณารอสักครู่...</center>";
                        echo "<meta http-equiv='refresh' content='2; url=vdo.php'>";
                    } else {
                        echo "เกิดข้อผิดพลาด";
                        echo "<center>กรุณารอสักครู่...</center>";
                        echo "<meta http-equiv='refresh' content='2; url=vdo.php'>";
                    }
                }

                ?>
            </td>
        </tr>
    </table>
</body>

</html>

<?php $conn->close(); ?>