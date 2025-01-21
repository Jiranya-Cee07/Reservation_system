<?php
include './conn/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomName = $_POST['roomName'] ?? '';
    $studentID = $_POST['studentID'] ?? '';
    $serviceCount = $_POST['serviceCount'] ?? '';
    $currentDate = $_POST['currentDate'] ?? '';
 

    if ($roomName && $studentID && $serviceCount && $currentDate) {
        $sql = "INSERT INTO history_music (music_name, history_music_user, history_music_usercount, history_music_date) 
                VALUES ('$roomName', '$studentID', '$serviceCount', '$currentDate')";
        if ($conn->query($sql) === TRUE) {
            echo "บันทึกข้อมูลสำเร็จ!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "ข้อมูลไม่ครบถ้วน!";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
