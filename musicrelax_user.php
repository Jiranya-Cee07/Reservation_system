<?php
// เปิดแสดงข้อผิดพลาด
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "./conn/conn.php"; // ตรวจสอบว่ามีไฟล์นี้อยู่

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music-Relax</title>
    <link href="./src/output.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jersey+15&family=Rubik+Vinyl&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: white;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            perspective: 1500px;
        }

        .music-button {
            background: linear-gradient(to right top, #73C088,  #78AAC3);
           padding: 2px; /* เพิ่มพื้นที่ภายใน */
            border-radius: 20px; /* ทำให้ขอบมน */
            display: inline-block;
            overflow: hidden; /* ทำให้ขอบมนครอบคลุมกรอบทั้งหมด */
            text-decoration: none;
            color: black;
            transition: transform 0.3s ease;
            cursor: pointer;
            margin: 25px;
            box-shadow: 0px 8px 20px rgb(0, 0, 0);
 

}

.music-button span {
    background: rgb(255, 255, 255);
    display: block;
    padding: 10px 20px;
    border-radius: 20px;
    height: 400px;
    width: 280px;
    box-sizing: border-box;

    
}

.music-button img {
    width: 100%;
    height: auto;
    border-radius: 20px;
}

.music-button p {
    font-family: "IBM Plex Sans Thai Looped", serif;
    font-weight: 400;
    font-style: normal;
    font-size: 26px;
    margin-top: 10px;
}
.music-button:hover {
    transform: scale(1.05); /* ขยายเล็กน้อยเมื่อ Hover */
    box-shadow: 0px 8px 20px rgb(0, 0, 0);
    
}

        h1 {
            background: linear-gradient(90deg, #397D54, #397D54, #0288d1, #0288d1, #397D54, #397D54);
            background-size: 400%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbow 3s linear infinite;
            background-blend-mode: soft-light;
            font-size: 110px;
            text-align: center;
            font-family: 'Jersey 15', 'Rubik Vinyl', sans-serif;
            z-index: 999;
            padding-top: 70px;
        }

        @keyframes rainbow {
            0% { background-position: 0% 50%; }     
            12.5% { background-position: 12.5% 50%; } 
            25% { background-position: 25% 50%; }   
            37.5% { background-position: 37.5% 50%; }
            50% { background-position: 50% 50%; }    
            62.5% { background-position: 62.5% 50%; } 
            75% { background-position: 75% 50%; }   
            87.5% { background-position: 87.5% 50%; } 
            100% { background-position: 100% 50%; }

           

        }
        /* สไตล์ Alert */
    #alertBox {
        background: white;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        padding: 30px;
        background-color: #fff;
        border: 2px solid rgb(6, 149, 63); /* ปรับความหนาและสีของขอบ */
        outline: 4px solid rgb(0, 0, 0); /* เพิ่มขอบอีกชั้นหนึ่ง */
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2); /* ลดความเบลอของเงา */
        display: none;
        z-index: 1000;
        border-radius: 20px;
        text-align: center;
        margin-top:110px;
    }

    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 129%;
        background-color: rgba(0, 0, 0, 0.3);
        display: none;
        z-index: 999;
    }

        .button-t{
            background-color: rgb(23, 196, 112);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 20px;
        }
        .button-f {
            background-color:  rgb(164, 2, 69) ;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 20px;    
        }
    </style>
</head>

<body>
    <?php include "navbar_user.php"; ?>
    <div class="content" id="content">
        <h1>Music Relax Room</h1>
    </div>

    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
        <?php
        $sql = "SELECT * FROM musicrelax";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($result_array = $result->fetch_assoc()) {
        ?>
                <div class="music-button" onclick="showAlert('<?php echo htmlspecialchars($result_array['music_id']); ?>', '<?php echo htmlspecialchars($result_array['music_name']); ?>')">
    <span>
        <img src="<?php echo htmlspecialchars($result_array['image_music']); ?>" alt="MusicRoom Image">
        <p><strong>ชื่อห้อง:</strong> <?php echo htmlspecialchars($result_array['music_name']); ?></p>
        <p><strong>สถานะ:</strong></p>
    </span>
</div>
        <?php
            }
        } else {
            echo "<p align='center'>ไม่มีข้อมูลในฐานข้อมูล</p>";
        }
        ?>
    </div>

    <div id="overlay" onclick="closeAlert()"></div>
    <div id="alertBox">
        <h3 style = "font-size: 40px;">กรอกข้อมูล</h3>
        <div style="display: flex; flex-direction: column; gap: 10px;">
        <div style="display: flex; align-items: center;">
    <label style="font-size: 25px; margin-right: 5px;" for="roomName">ห้อง:</label>
    <input style="font-size: 25px; width: 100px; padding: 5px;" type="text" id="roomName" readonly>
</div>
    <div style="display: flex; align-items: center;">
        <label style="font-size: 25px; margin-right: 5px;"  placeholder="กรอกเลขรหัส"
                maxlength="9" 
                pattern="\d{9}" 
                required for="studentID">รหัสนักศึกษา:</label>
        <input style="font-size: 25px; width: 200px;padding: 5px;" type="text" id="studentID" placeholder="กรอกเลขรหัส">
    </div>
    <div style="display: flex; align-items: center;">
        <label style="font-size: 25px; margin-right: 5px;" for="serviceCount">จำนวนผู้เข้าใช้บริการ:</label>
        <input style="font-size: 25px; width: 55px;padding: 5px;" min="4" 
        max="7" 
        required type="number" id="serviceCount" placeholder=" ">
        <label style="font-size: 25px; margin-right: 5px;padding: 5px;" for="serviceCount"> คน</label>
    </div>
    <div style="display: flex; align-items: center;">
            <label style="font-size: 25px; margin-right: 5px;" for="currentDate">วันที่:</label>
            <input style="font-size: 25px; padding: 5px; width: 150px;" type="text" id="currentDate" readonly>
        </div>
        <div>
            <label style="font-size: 25px; margin-right: 5px; padding: 5px;" for="startTime">Start Time</label>
            <select id="startTime" required>
        <option value="">-- Select Time --</option>
        <option value="09:00">09:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
        <option value="15:00">15:00</option>
    </select>
        </div>
        <div>
            <label style="font-size: 25px; margin-right: 5px; padding: 5px;" for="endTime">End Time</label>
            <input type="time" name="endTime" id="endTime" readonly>
        </div>
</div>
        <button class= "button-t" onclick="submitForm()">ยืนยัน</button>
        <button class= "button-f" onclick="closeAlert()">ปิด</button>
</div>

    </div>

    <script>
        // ฟังก์ชันเปิด Alert
        function showAlert(musicID, musicName) {
    document.getElementById('alertBox').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';

    document.getElementById('roomName').value = musicName;

    // เก็บ musicID ใน input hidden
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.id = 'musicID';
    hiddenInput.value = musicID;
    document.getElementById('alertBox').appendChild(hiddenInput);

    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    const day = currentDate.getDate().toString().padStart(2, '0');

    document.getElementById("currentDate").value = `${year}/${month}/${day}`;
}


        // ฟังก์ชันปิด Alert
        function closeAlert() {
            document.getElementById('alertBox').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        // ฟังก์ชันส่งข้อมูลไปยัง PHP ผ่าน AJAX
    function submitForm() {
        const roomName = document.getElementById('roomName').value;
        const studentID = document.getElementById('studentID').value;
        const serviceCount = document.getElementById('serviceCount').value;
        const currentDate = document.getElementById('currentDate').value;
        const musicID = document.getElementById('musicID').value;

        if (!studentID || !serviceCount) {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน!");
            return;
        }

        const formData = new FormData();
        formData.append('roomName', roomName);
        formData.append('studentID', studentID);
        formData.append('serviceCount', serviceCount);
        formData.append('currentDate', currentDate);
        formData.append('musicID', musicID);

        fetch('savedata_music.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                alert(data);
                closeAlert();
            })
            .catch(error => console.error('Error:', error));
    }

const studentInput = document.getElementById('studentID');

studentInput.addEventListener('input', function () {
    // ลบตัวอักษรที่ไม่ใช่ตัวเลข
    this.value = this.value.replace(/\D/g, '');

    // ตัดข้อมูลถ้ามากกว่า 9 หลัก
    if (this.value.length > 9) {
        this.value = this.value.slice(0, 9);
    }
});

  // ฟังก์ชันจัดการเวลาสิ้นสุด
  document.getElementById('startTime').addEventListener('change', function () {
            const startTime = this.value.split(':');
            if (startTime.length === 2) {
                const hours = parseInt(startTime[0]);
                const minutes = parseInt(startTime[1]);

                // คำนวณเวลา End Time
                const endDate = new Date();
                endDate.setHours(hours + 1, minutes);

                const endHours = endDate.getHours().toString().padStart(2, '0');
                const endMinutes = endDate.getMinutes().toString().padStart(2, '0');

                document.getElementById('endTime').value = `${endHours}:${endMinutes}`;
            }
        });
        
    </script>
</body>

</html>
