<?php
include "./conn/conn.php";
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
        background-size: cover; /* ปรับให้ภาพเต็มจอ */
        background-repeat: no-repeat; /* ไม่ให้ภาพซ้ำ */
        background-position: center; /* จัดภาพให้อยู่ตรงกลาง */
        background-attachment: fixed;
        perspective: 1500px; /* เพิ่มมุมมอง 3D */

        cursor: url("./asset/pf.png"), auto;
    }
        

        .theater-button {
           /*background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);*/
           background: linear-gradient(to right top, #73C088,  #78AAC3);
           padding: 5px; /* เพิ่มพื้นที่ภายใน */
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
        .theater-button span{
            background: rgb(255, 255, 255);
            display: block;
            padding: 10px 20px;
            border-radius: 20px; /* ขอบมนภายใน */
            height: 400px;
            width: 280px;
            box-sizing: border-box; 
        }
        .theater-button img {
            width: 100%;
            height: auto;
            border-radius: 20px;
        }

        .theater-button p {
            font-family: "IBM Plex Sans Thai Looped", serif;
            font-weight: 400;
            font-style: normal;
            font-size: 26px;
            margin-top: 10px;
        }
        
        .theater-button:hover {
            transform: scale(1.05); /* ขยายเล็กน้อยเมื่อ Hover */
            box-shadow: 0px 8px 20px rgb(0, 0, 0);
        }

        h1{
        background: linear-gradient(90deg, #397D54, #397D54, #0288d1, #0288d1, #397D54, #397D54);
            background-size: 400%; /* ขยายขนาด Gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: rainbow 3s linear infinite; /* เพิ่มอนิเมชัน */
            background-blend-mode: soft-light;
            font-size: 110px;
            text-align: center;
            padding-top: 70px;
            font-family: 'Jersey 15', 'Rubik Vinyl', sans-serif;
            z-index: 999;
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



    </style>
</head>

<body>
    <?php include "navbar_user.php"; ?>

   
     <div class = "content">
            <h1>mini-theater room</h1>
    </div>
       
    

    <?php
    $sql = "SELECT * FROM minitheater";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
        <div style="display: flex; flex-wrap: wrap; justify-content: center;" >
            <?php
            while ($result_array = $result->fetch_assoc()) {
            ?>
            
                <a href="minitheater_reserve_user.php?theater_id=<?php echo $result_array['theater_id']; ?>" class="theater-button">
                <span>
                        <img src="<?php echo htmlspecialchars($result_array['image_theater']); ?>" alt="theater Image">
                    
                    <p><strong>รหัสห้อง :</strong> <?php echo htmlspecialchars($result_array['theater_id']); ?></p>
                   
                    <p><strong>ชื่อห้อง :</strong> <?php echo htmlspecialchars($result_array['theater_name']); ?></p>

                    <p><strong>สถานะ : </strong> </p>
            </span>
                </a>
            </span>
            <?php } ?>
        </div>
    <?php
    }
    ?>

</body>

</html>
