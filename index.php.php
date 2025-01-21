<?php
include "./conn/conn.php";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@600&family=Days+One&display=swap" rel="stylesheet">
</head>

<style>
    body{
    background: ;
    width: 100%;
    background-attachment: fixed;
    background-size: cover ;
}
.menu-button {
    background: white;
    padding: 30px;
    height: 320px; /* ปรับความสูงของปุ่ม */
    width: 250px; /* ปรับความกว้างของปุ่ม */
    text-decoration: none;
    color: black;
    transition: transform 0.3s ease;
    cursor: pointer;
    margin-top: 370px;
    border-radius: 0;
    margin-right: 30px;
    margin-left: 30px;
    display: flex; /* ใช้ Flexbox */
    flex-direction: column; /* จัดเรียงเนื้อหาในแนวตั้ง */
    align-items: center; /* จัดให้อยู่กึ่งกลางแนวนอน */
    padding: 0; /* ปิดการ padding */
    overflow: hidden; /* ตัดส่วนที่ล้น */
    border-radius: 20px;
}

.menu-button img {
    width: 100px ; /* รูปภาพกว้างเต็มปุ่ม */
    height: 100px;/* ให้ขนาดรูปภาพปรับตามสัดส่วน */
    margin-top: 50px; /* ลบ margin ออก */
    vertical-align: top; /* ชิดขอบบน */
}

.menu-button p {
    font-family: "Days One", sans-serif;
    font-weight: 400;
    font-size: 10px; /* ขนาดข้อความ */
    margin-top: 350px ;
    text-align: center;
    color:white;
    flex-shrink: 0; /* ป้องกันการบีบข้อความ */
}

    .menu-button:hover {
        transform: scale(1.05);
       
    }
    .music-room {
    background: url("./asset/new.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    box-shadow: 0px 10px 20px rgb(0, 0, 0,0.5);
}
.vdo-room {
    background:url("./asset/ear.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    box-shadow: 0px 10px 20px rgb(0, 0, 0,0.5);
}
.mini-room {
    background:url("./asset/thea.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    box-shadow: 0px 10px 20px rgb(0, 0, 0,0.5);
}
</style>

<body>
    <?php
    include "navbar_user.php";
    ?>
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
        <div class="menu-button music-room" >         
            <p>Music Relax Room</p>
        </div>
        <div class="menu-button vdo-room">      
            <p>Vdo On-demand Room</p>
        </div>
        <div class="menu-button mini-room">
            <p>Mini Theater Room</p>
        </div>
    </div>
</body>

</html>
<?php $conn->close(); ?>
