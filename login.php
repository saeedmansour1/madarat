<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');

require_once 'db_connect.php';  // استيراد ملف الاتصال

// قائمة IPs المسموح بها
$allowed_ips = [
    '127.0.0.1',
    '64.137.192.252',
    '104.194.133.193'
];

// التحقق من عنوان IP الحالي
$client_ip = $_SERVER['REMOTE_ADDR'];
$ip_allowed = in_array($client_ip, $allowed_ips);

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$ip_allowed) {
        $error = "🚫 هذا الجهاز غير مصرح له بالدخول. عنوان IP الخاص بك هو: $client_ip";
    } else {
        $user = trim($_POST['username'] ?? '');
        $pass = trim($_POST['password'] ?? '');

        // استعلام لجلب بيانات المستخدم من القاعدة
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $user);
        $stmt->execute();
        $dbUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dbUser && password_verify($pass, $dbUser['password'])) {
            // حفظ بيانات الجلسة مع صلاحية الدور
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['role'] = $dbUser['role'];  // ← إضافة الدور في الجلسة

            header("Location: home");
            exit;
        } else {
            $error = "❌ اسم المستخدم أو كلمة المرور غير صحيحة.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>شركة مدارات للأنظمة المحدودة | تسجيل الدخول</title>
  <style>
    body {
      background: linear-gradient(135deg, #061A40, #144272);
      font-family: 'Cairo', sans-serif;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
    }

    .login-container {
      background: #1C1F2A;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.4);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .login-container h1 {
      margin-bottom: 10px;
      font-size: 26px;
      color: #00B2FF;
    }

    .login-container h2 {
      font-size: 16px;
      color: #ccc;
      margin-bottom: 25px;
    }

    .login-container input {
      width: 100%;
      padding: 14px;
      margin-bottom: 15px;
      border: none;
      border-radius: 8px;
      background: #2F3240;
      color: #fff;
      font-size: 15px;
    }

    .login-container button {
      width: 100%;
      padding: 14px;
      background: #00B2FF;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-container button:hover {
      background: #0088cc;
    }

    .error {
      background: #ff4d4d;
      color: white;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 6px;
      font-size: 14px;
    }

    .company-logo {
      margin-bottom: 20px;
    }

    .company-logo img {
      max-width: 100px;
    }

    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: #aaa;
    }
  </style>
</head>
<body>

<div class="login-container">
  <div class="company-logo">
    <img src="logo.png" alt="شعار الشركة">
  </div>

  <h1>شركة مدارات للأنظمة المحدودة</h1>
  <h2>أنظمة الأمن والمراقبة | حلول متقدمة لحمايتك</h2>

  <?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <?php if ($ip_allowed): ?>
    <form method="POST">
      <input type="text" name="username" placeholder="اسم المستخدم" required>
      <input type="password" name="password" placeholder="كلمة المرور" required>
      <button type="submit">🔐 دخول آمن</button>
    </form>
  <?php else: ?>
    <div class="error">
      🚫 جهازك غير مصرح به للدخول<br>
      عنوان IP: <?= htmlspecialchars($client_ip) ?>
    </div>
  <?php endif; ?>

  <div class="footer">
    &copy; <?= date('Y') ?> - جميع الحقوق محفوظة لشركة مدارات للأنظمة المحدودة
  </div>
</div>

</body>
</html>

<?php ob_end_flush(); ?>
