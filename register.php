<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>طلب تسجيل - مدارات للأنظمة</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
    }

    body {
      background: linear-gradient(to right, #e0f7fa, #f1fafe);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #333;
    }

    .card {
      background: #ffffff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0,0,0,0.08);
      max-width: 500px;
      width: 90%;
      text-align: center;
      animation: fadeIn 1.2s ease-in-out;
    }

    .card h1 {
      color: #0077b6;
      margin-bottom: 20px;
      font-size: 28px;
    }

    .card p {
      font-size: 18px;
      line-height: 1.7;
      color: #555;
      margin-bottom: 30px;
    }

    .card .note {
      background: #f1f8fb;
      padding: 15px;
      border-right: 5px solid #00aaff;
      border-radius: 8px;
      font-size: 16px;
      color: #0077b6;
    }

    .back-btn {
      display: inline-block;
      margin-top: 25px;
      text-decoration: none;
      background: #00aaff;
      color: #fff;
      padding: 12px 24px;
      border-radius: 30px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .back-btn:hover {
      background: #0077cc;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<div class="card">
  <h1>طلب تسجيل حساب</h1>
  <p>شكرًا لاختيارك <strong>مدارات للأنظمة المحدودة</strong>.</p>
  <div class="note">
    ⚠️ عذرًا، لا يمكن التسجيل إلا من خلال الإدارة. يرجى التواصل معنا لإتمام عملية التسجيل.
  </div>
  <a href="index" class="back-btn">العودة إلى الصفحة الرئيسية</a>
</div>

</body>
</html>
