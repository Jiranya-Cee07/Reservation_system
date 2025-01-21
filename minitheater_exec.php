<?php
include "./conn/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>minitheater</title>
</head>

<body>
    <table width="300" align="center">
        <tr bgcolor="#66CCCC">
            <td>
                <?php
                if ($_POST['chk'] == "insert") {
                    $theater_id = $_POST['theater_id'];
                    $theater_name = $_POST['theater_name'];

                    // จัดการกับไฟล์รูปภาพ
                    $image_theater = $_FILES['image_theater']['name'];
                    $target_dir = "uploads/"; // โฟลเดอร์ที่ใช้เก็บไฟล์รูปภาพ
                    $target_file = $target_dir . basename($image_theater);

                    // อัปโหลดไฟล์รูปภาพไปยังโฟลเดอร์
                    if (move_uploaded_file($_FILES['image_theater']['tmp_name'], $target_file)) {
                        echo "อัปโหลดรูปภาพสำเร็จ.";
                    } else {
                        echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ.";
                    }

                    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล
                    $sql = "INSERT INTO minitheater (theater_id, image_theater, theater_name)";
                    $sql .= "VALUES ('$theater_id', '$target_file', '$theater_name')";

                    // ดำเนินการคำสั่ง SQL
                    if ($conn->query($sql) === TRUE) {
                        echo "บันทึกข้อมูลสำเร็จ!";
                        echo "<center>กรุณารอสักครู่...</center>";
                        echo "<meta http-equiv='refresh' content='2; url=minitheater.php'>";
                    } else {
                        echo "เกิดข้อผิดพลาด";
                        echo "<center>กรุณารอสักครู่...</center>";
                        echo "<meta http-equiv='refresh' content='2; url=minitheater.php'>";
                    }
                }

                ?>
            </td>
        </tr>
    </table>
</body>

</html>

<?php $conn->close(); ?>