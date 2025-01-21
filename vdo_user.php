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
    <title>vdo</title>
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

        .vdo-button {
            background: linear-gradient(to right top, #73C088,  #78AAC3);
            padding: 5px;
            border-radius: 20px;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
            color: black;
            transition: transform 0.3s ease;
            cursor: pointer;
            margin: 25px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0);
        }

        .vdo-button span {
            background: rgb(255, 255, 255);
            display: block;
            padding: 10px 20px;
            border-radius: 20px;
            height: 400px;
            width: 280px;
            box-sizing: border-box;
        }

        .vdo-button img {
            width: 100%;
            height: auto;
            border-radius: 20px;
        }

        .vdo-button p {
            font-family: "IBM Plex Sans Thai Looped", serif;
            font-weight: 400;
            font-style: normal;
            font-size: 26px;
            margin-top: 10px;
        }

        .vdo-button:hover {
            transform: scale(1.05);
            box-shadow: 0px 8px 20px rgba(0, 0, 0);
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

        #alertBox {
    background: linear-gradient(to right top, rgba(214, 93, 178, 0.2), rgba(154, 154, 225, 0.2), rgba(55, 214, 214, 0.2));
    position: fixed;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 600px;
    height: 600px;
    padding: 30px;
    background-color: #fff;
    border: 2px solid rgb(0, 0, 0); /* ปรับความหนาและสีของขอบ */
    outline: 4px solid rgb(255, 87, 199); /* เพิ่มขอบอีกชั้นหนึ่ง */
    box-shadow: 0 0 70px 70px rgba(255, 255, 255, 0.49); /* ลดความเบลอของเงา */
    display: none;
    z-index: 1000;
    border-radius: 20px;
}

        #overlay {
            position:flex;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 999;
        }
        .button-t {
            background-color: rgb(23, 196, 112);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 20px;
        }

        .button-f {
            background-color: rgb(164, 2, 69);
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
        <h1>VDO on-demand room</h1>
    </div>

    <?php
    $sql = "SELECT * FROM vdo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div style="display: flex; flex-wrap: wrap; justify-content: center;">
            <?php
            while ($result_array = $result->fetch_assoc()) {
            ?>
                <a class="vdo-button" data-vdoname="<?php echo $result_array['vdo_name']; ?>">
                    <span>
                        <img src="<?php echo htmlspecialchars($result_array['image_vdo']); ?>" alt="VDO Image">
                       
                        <p><strong>ชื่อห้อง :</strong> <?php echo htmlspecialchars($result_array['vdo_name']); ?></p>
                        <p><strong>สถานะ : </strong></p>
                    </span>
                </a>
            <?php } ?>
        </div>
    <?php
    }
    ?>

    <div id="overlay" onclick="closeAlert()"></div>
    <div id="alertBox">
        <h3 style="font-size: 40px;">กรอกข้อมูล</h3>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            <div style="display: flex; align-items: center;">
                <label style="font-size: 25px; margin-right: 5px;" for="room2ID">ห้อง:</label>
                <input style="font-size: 25px; width: 50px; padding: 5px;" type="text" id="room2ID" placeholder="">
            </div>
            <div style="display: flex; align-items: center;">
                <label style="font-size: 25px; margin-right: 5px;" for="student2ID">รหัสนักศึกษา:</label>
                <input style="font-size: 25px; width: 200px;padding: 5px;" type="text" id="student2ID" placeholder="กรอกเลขรหัส">
            </div>
            <div style="display: flex; align-items: center;">
                <label style="font-size: 25px; margin-right: 5px;" for="serviceCount">จำนวนผู้เข้าใช้บริการ:</label>
                <input style="font-size: 25px; width: 55px;padding: 5px;" type="number" id="serviceCount2" placeholder=" ">
                <label style="font-size: 25px; margin-right: 5px;padding: 5px;" for="serviceCount2"> คน</label>
            </div>
        </div>
        <button class="button-t" onclick="submitForm()">ยืนยัน</button>
        <button class="button-f" onclick="closeAlert()">ปิด</button>
    </div>

    <script>
        // ฟังก์ชันเปิด Alert
        function showAlert(vdoID, vdoName) {
            console.log("showAlert called with vdoID:", vdoID, "vdoName:", vdoName);  // เพิ่มการดีบัก

            document.getElementById('alertBox').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';

            document.getElementById('room2ID').value = vdoID;
            document.getElementById('student2ID').placeholder = `กรุณากรอกรหัสนักศึกษาสำหรับ ${vdoName}`;
        }

        // ฟังก์ชันปิด Alert
        function closeAlert() {
            document.getElementById('alertBox').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        // เพิ่ม event listener ให้กับแต่ละ vdo-button
        document.querySelectorAll('.vdo-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var vdoID = this.getAttribute('data-vdoid');
                var vdoName = this.getAttribute('data-vdoname');
                showAlert(vdoID, vdoName);
            });
        });
    </script>

</body>

</html>

