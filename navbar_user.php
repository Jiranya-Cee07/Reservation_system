<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Active Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Days+One&display=swap" rel="stylesheet">

    <style>
        body{
        }
        .navbar-container {
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            width: 100%;
            height: 50px;
            left: 0;
            right: 0;
            /*background: rgba(117, 51, 239, 0.84);*/
            z-index: 1000;
           
            box-shadow: 0px 8px 10px rgb(0, 0, 0,0.25);
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
        }

        .navbar-logo a {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-logo img {
            height: 30px;
            margin-right: 8px;
        }

        .navbar-links {
            display: flex;
            justify-content: center;
            height: 50px;
            background:;
            border-radius:0 0 20px 20px;
        }

        .navbar-links a {
            display: flex;
            align-items: center;
            margin: 0 1rem;
            padding: 0.5rem 1rem;
            font-family: "Days One", serif;
            text-decoration: none;
            color:rgb(0, 102, 255);
            transition: color 0.5s ease;
            font-weight: 500;
            position: relative;
            font-size: 14px;
        }

        .navbar-links a img {
            margin-right: 8px;
        }

        .navbar-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 4px;
            border-radius: 10px;
            background-color:rgb(0, 0, 0);
            transition: width 0.6s ease;
        }

        .navbar-links a:hover::after,
        .navbar-links a.active::after {
            width: 100%;
        }

        .navbar-links a:hover {
            color:rgb(0, 0, 0);
        }

        .navbar-links a.active {
            color:rgb(0, 0, 0);

        }


        .mobile-menu {
            display: none;
        }

        @media (max-width: 640px) {
            .mobile-menu {
                display: block;
            }

            .navbar-links {
                display: none;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-content">
            <div class="navbar-logo">
                <a href="#">
                    <img src="./asset/logolib.png" alt="library"> lib
                </a>
            </div>

            <div class="navbar-links">
                <a href="dashboard_user.php">
                    <img src="./asset/home.png" alt="Icon" width="20" height="20"> Home
                </a>
                <a href="musicrelax_user.php">
                    <img src="./asset/mi.png" alt="Icon" width="20" height="20"> Music-Relax
                </a>
                <a href="vdo_user.php">
                    <img src="./asset/vdo.png" alt="Icon" width="20" height="20"> VDO on-demand
                </a>
                <a href="minitheater_user.php">
                    <img src="./asset/minina.png" alt="Icon" width="20" height="20"> Mini-Theater
                </a>
            </div>

            <div class="navbar-logo">
                <a href="#">
                    <img src="./asset/pf.png" alt="Profile">
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    // ดึงชื่อไฟล์ของหน้าเว็บปัจจุบัน
    const currentPage = window.location.pathname.split('/').pop() || 'dashboard_user.php'; // Default เป็น Home

    // เลือกทุกลิงก์ใน navbar
    const navbarLinks = document.querySelectorAll('.navbar-links a');

    // ตรวจสอบและเพิ่มคลาส active ให้กับลิงก์ที่ตรงกับหน้าเว็บปัจจุบัน
    navbarLinks.forEach(link => {
        const linkHref = link.getAttribute('href').split('/').pop();
        if (linkHref === currentPage) {
            link.classList.add('active');
        }
    });
</script>

</body>

</html>
