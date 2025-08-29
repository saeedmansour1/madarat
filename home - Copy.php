<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم | شركة مدارات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            margin: 0;
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #0a0f2c, #001f3f);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(to left, #00bcd4, #004d79);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        header h1 {
            font-size: 32px;
            color: #fff;
            margin: 0;
            font-weight: bold;
        }

        .logout-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            background: #ff4d4d;
            border: none;
            padding: 12px 18px;
            color: white;
            font-size: 14px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 6px 15px rgba(255, 77, 77, 0.4);
            transition: 0.3s;
            z-index: 99;
        }

        .logout-btn:hover {
            background-color: #e63946;
        }

        nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            padding: 50px 40px;
            max-width: 1200px;
            margin: auto;
            width: 100%;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 18px;
            padding: 30px 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 40px rgba(0, 216, 255, 0.15);
            text-align: center;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 10px 50px rgba(0, 216, 255, 0.4);
            background: rgba(0, 216, 255, 0.1);
        }

        .card svg {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
            fill: #00e5ff;
        }

        .card h3 {
            font-size: 20px;
            margin: 0;
            color: #ffffff;
            font-weight: 700;
        }

        .popup {
            display: none;
            position: absolute;
            top: 100%;
            left: 10px;
            right: 10px;
            background: #01324d;
            border-radius: 12px;
            border: 1px solid #00d8ff;
            padding: 12px;
            margin-top: 10px;
            z-index: 20;
        }

        .popup a {
            display: block;
            color: #00ffff;
            padding: 8px 0;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .popup a:hover {
            color: #ffffff;
        }

        footer {
            background-color: #010e1a;
            text-align: center;
            padding: 20px;
            color: #888;
            margin-top: auto;
        }

        @media(max-width: 600px) {
            .logout-btn {
                padding: 10px 14px;
                font-size: 13px;
            }

            nav {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>شركة مدارات للأنظمة المحدودة</h1>
</header>

<button class="logout-btn" onclick="location.href='logout.php'">🔓 تسجيل الخروج</button>

<nav>
    <div class="card" onclick="location.href='cameras.php'">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21 7l-3 2v7a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-7L3 7v9a4 4 0 0 0 4 4h10a4 4 0 0 0 4-4V7z"/><circle cx="12" cy="12" r="3"/></svg>
        <h3>كاميرات المراقبة</h3>
    </div>

    <div class="card" onclick="togglePopup('firePopup')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 15v-2h-2v2zm0-4V7h-2v6z"/></svg>
        <h3>الإنذار</h3>
        <div class="popup" id="firePopup">
            <a href="fire_alerts/index.php">📋 عرض التنبيهات</a>
            <a href="fire_alerts/input.php">➕ إضافة تنبيه</a>
        </div>
    </div>

    <div class="card" onclick="alert('🚧 قسم المصاعد قيد التفعيل');">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 2h10v20H7z"/><path d="M11 5h2v3h-2z"/></svg>
        <h3>المصاعد</h3>
    </div>

    <div class="card" onclick="alert('🚧 قسم BMS قيد التفعيل');">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5 3h14v18H5z"/></svg>
        <h3>نظام BMS</h3>
    </div>

    <div class="card" onclick="togglePopup('safetyPopup')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5 4 8 9 8s9-3 9-8V6z"/></svg>
        <h3>قسم السلامة</h3>
        <div class="popup" id="safetyPopup">
            <a href="safety/status.php">🔍 الحالة العامة</a>
            <a href="safety/emergency_doors.php">🚪 أبواب الطوارئ</a>
            <a href="safety/emergency_plans.php">🗺️ خطط الطوارئ</a>
            <a href="safety/safety_data.php">📋 بيانات السلامة</a>
            <a href="safety/add_safety_data.php">➕ إضافة بيانات</a>
        </div>
    </div>
</nav>

<footer>
    &copy; <?= date('Y') ?> شركة مدارات للأنظمة المحدودة - جميع الحقوق محفوظة
</footer>

<script>
function togglePopup(id) {
    const current = document.getElementById(id);
    const allPopups = document.querySelectorAll('.popup');
    allPopups.forEach(p => {
        if (p !== current) p.style.display = 'none';
    });
    current.style.display = current.style.display === 'block' ? 'none' : 'block';
}

window.addEventListener('click', function(e) {
    if (!e.target.closest('.card')) {
        document.querySelectorAll('.popup').forEach(p => p.style.display = 'none');
    }
});
</script>

</body>
</html>
