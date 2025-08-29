<?php
session_start();
// مسح جميع متغيرات الجلسة
$_SESSION = [];

// حذف الكوكيز الخاصة بالجلسة (اختياري لكن يُفضل)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// تدمير الجلسة
session_destroy();

// إعادة التوجيه لصفحة الدخول
header("Location: login.php");
exit;
