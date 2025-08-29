<?php
session_start();
require_once 'db_connect.php';  // تأكد ان ملف الاتصال مضبوط

// تأكد أن المستخدم مشرف (admin) قبل السماح بالوصول لهذه الصفحة
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('Location: home.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = ($_POST['role'] === 'admin') ? 'admin' : 'user';

    // التحقق من صحة البيانات
    if (!$username || !$email || !$password || !$confirm_password) {
        $error = "❌ الرجاء ملء جميع الحقول.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ البريد الإلكتروني غير صالح.";
    } elseif ($password !== $confirm_password) {
        $error = "❌ كلمة المرور وتأكيدها غير متطابقين.";
    } else {
        // تحقق من وجود المستخدم مسبقاً بنفس اسم المستخدم أو البريد الإلكتروني
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            $error = "❌ اسم المستخدم أو البريد الإلكتروني موجود مسبقاً.";
        } else {
            // تشفير كلمة المرور
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // إدخال المستخدم الجديد
            $insert = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
            if ($insert->execute([$username, $email, $hashed_password, $role])) {
                $success = "✅ تم إضافة المستخدم بنجاح.";
                // تفريغ الحقول بعد الإدخال الناجح
                $_POST = [];
            } else {
                $error = "❌ حدث خطأ أثناء إضافة المستخدم.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8" />
<title>إضافة مستخدم جديد | لوحة التحكم</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo&display=swap');
    body {
        background: #0a122a;
        color: #eee;
        font-family: 'Cairo', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }
    .container {
        background: #1b2340;
        padding: 30px 40px;
        border-radius: 12px;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 0 15px #00bfff88;
    }
    h1 {
        margin-bottom: 20px;
        color: #00bfff;
        text-align: center;
        font-weight: 700;
    }
    input[type=text],
    input[type=email],
    input[type=password],
    select {
        width: 100%;
        padding: 12px 15px;
        margin: 8px 0 20px 0;
        border: none;
        border-radius: 8px;
        background: #16203b;
        color: #eee;
        font-size: 15px;
        box-sizing: border-box;
        transition: background 0.3s;
    }
    input[type=text]:focus,
    input[type=email]:focus,
    input[type=password]:focus,
    select:focus {
        background: #223158;
        outline: none;
    }
    button {
        width: 100%;
        padding: 14px;
        background: #00bfff;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.3s;
    }
    button:hover {
        background: #0099cc;
    }
    .message {
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-weight: 600;
        text-align: center;
    }
    .error {
        background: #ff4c4c;
        color: #fff;
    }
    .success {
        background: #4caf50;
        color: #fff;
    }
    label {
        font-weight: 600;
    }
</style>
</head>
<body>

<div class="container">
    <h1>➕ إضافة مستخدم جديد</h1>

    <?php if ($error): ?>
        <div class="message error"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
        <div class="message success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST" autocomplete="off">
        <label for="username">اسم المستخدم</label>
        <input type="text" id="username" name="username" placeholder="أدخل اسم المستخدم" required
               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

        <label for="email">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" placeholder="أدخل البريد الإلكتروني" required
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

        <label for="password">كلمة المرور</label>
        <input type="password" id="password" name="password" placeholder="أدخل كلمة المرور" required>

        <label for="confirm_password">تأكيد كلمة المرور</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="أعد إدخال كلمة المرور" required>

        <label for="role">الصلاحية</label>
        <select id="role" name="role" required>
            <option value="user" <?= (($_POST['role'] ?? '') === 'user') ? 'selected' : '' ?>>مستخدم عادي</option>
            <option value="admin" <?= (($_POST['role'] ?? '') === 'admin') ? 'selected' : '' ?>>مشرف (Admin)</option>
        </select>

        <button type="submit">إضافة المستخدم</button>
    </form>
</div>

</body>
</html>
