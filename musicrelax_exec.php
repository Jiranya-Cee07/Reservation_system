<?php
include "./conn/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
</head>

<body>
    <table width="300" align="center">
        <tr bgcolor="#66CCCC">
            <td>
                <?php
                if ($_POST['chk'] == "insert") {
                    $music_id = $_POST['music_id'];
                    $music_name = $_POST['music_name'];

                    // จัดการกับไฟล์รูปภาพ
                    $image_music = $_FILES['image_music']['name'];
                    $target_dir = "uploads/"; // โฟลเดอร์ที่ใช้เก็บไฟล์รูปภาพ
                    $target_file = $target_dir . basename($image_music);

                    // อัปโหลดไฟล์รูปภาพไปยังโฟลเดอร์
                    if (move_uploaded_file($_FILES['image_music']['tmp_name'], $target_file)) {
                        echo "อัปโหลดรูปภาพสำเร็จ.";
                    } else {
                        echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ.";
                    }

                    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล
                    $sql = "INSERT INTO musicrelax (music_id, image_music, music_name)";
                    $sql .= "VALUES ('$music_id', '$target_file', '$music_name')";

                    // ดำเนินการคำสั่ง SQL
                    if ($conn->query($sql) === TRUE) {
                        echo "บันทึกข้อมูลสำเร็จ!";
                        echo "<center>กรุณารอสักครู่...</center>";
                        echo "<meta http-equiv='refresh' content='2; url=musicrelax.php'>";
                    } else {
                        echo "เกิดข้อผิดพลาด";
                        echo "<center>กรุณารอสักครู่...</center>";
                        echo "<meta http-equiv='refresh' content='2; url=musicrelax.php'>";
                    }
                }

                ?>
            </td>
        </tr>
    </table>
</body>

</html>

<?php $conn->close(); ?>