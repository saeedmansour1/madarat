<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مدارات للأنظمة المحدودة</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #0077b6;
      --secondary-color: #00b4d8;
      --bg-light: #f6fafd;
      --text-dark: #222;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      scroll-behavior: smooth;
    }

    body {
      background: var(--bg-light);
      color: var(--text-dark);
    }

    header {
      position: relative;
      background: url('security-bg.webp') center/cover no-repeat;
      height: 100vh;
      min-height: 600px;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 15px;
    }

    header::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
    }

    header h1, header p {
      position: relative;
      z-index: 1;
    }

    header h1 {
      font-size: 2.5rem;
      margin-bottom: 15px;
      text-shadow: 2px 2px 5px #000;
    }

    header p {
      font-size: 1.1rem;
      max-width: 700px;
      text-shadow: 1px 1px 3px #000;
    }

    .auth {
      position: absolute;
      left: 15px;
      top: 15px;
      z-index: 10;
      display: flex;
      gap: 10px;
    }

    .auth a {
      background: var(--secondary-color);
      color: white;
      padding: 8px 15px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s ease;
      font-size: 0.9rem;
    }

    .auth a:hover {
      background: #023e8a;
    }

    nav {
      background: #ffffffcc;
      backdrop-filter: blur(10px);
      padding: 12px 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      text-align: center;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    nav a {
      margin: 5px 10px;
      color: var(--primary-color);
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s;
      font-size: 0.95rem;
    }

    nav a:hover {
      color: var(--secondary-color);
    }

    .section {
      padding: 50px 15px;
      text-align: center;
      max-width: 1200px;
      margin: auto;
    }

    .section h2 {
      font-size: 1.8rem;
      color: var(--primary-color);
      margin-bottom: 20px;
    }

    .section p {
      font-size: 1rem;
      max-width: 800px;
      margin: auto;
      color: #555;
      line-height: 1.6;
    }

    .services {
      margin-top: 30px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .service {
      background: white;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s;
    }

    .service:hover {
      transform: translateY(-5px);
    }

    .service img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .service h4 {
      font-size: 1.1rem;
      color: var(--primary-color);
      margin: 15px 0 10px;
    }

    .service p {
      padding: 0 15px 20px;
      font-size: 0.9rem;
      color: #555;
    }

    .contact {
      background: #eaf3f9;
      padding: 40px 15px;
    }

    footer {
      background: #cde1ef;
      text-align: center;
      padding: 15px;
      font-size: 0.9rem;
      color: #444;
    }

    @media (max-width: 768px) {
      header {
        height: 90vh;
        min-height: 500px;
      }
      
      header h1 {
        font-size: 2rem;
      }
      
      header p {
        font-size: 1rem;
      }
      
      .auth {
        flex-direction: column;
        left: 10px;
        top: 10px;
      }
      
      .services {
        grid-template-columns: 1fr;
        gap: 15px;
      }
      
      .section {
        padding: 40px 15px;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1.8rem;
      }
      
      nav a {
        margin: 5px 8px;
        font-size: 0.85rem;
      }
      
      .section h2 {
        font-size: 1.5rem;
      }
      
      .service img {
        height: 140px;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="auth">
    <a href="login">تسجيل الدخول</a>
    <a href="register">إنشاء حساب</a>
  </div>
  <h1>مدارات للأنظمة المحدودة</h1>
  <p>نقدّم أنظمة أمن ذكية، شبكات احترافية، ودعم فني عالي الجودة باستخدام أحدث تقنيات الذكاء الاصطناعي.</p>
</header>

<nav>
  <a href="#about">عن الشركة</a>
  <a href="#services">الخدمات</a>
  <a href="#contact">اتصل بنا</a>
</nav>

<section id="about" class="section">
  <h2>من نحن</h2>
  <p>شركة سعودية بخبرة أكثر من 10 سنوات في مجال الحلول الأمنية الذكية، الشبكات، السنترالات، والدعم الفني، نقدم خدماتنا بجودة عالية واحترافية تعتمد على أحدث التقنيات.</p>
</section>

<section id="services" class="section">
  <h2>خدماتنا</h2>
  <div class="services">
    <div class="service">
      <img src="camera.jpg" alt="أنظمة المراقبة">
      <h4>📹 أنظمة المراقبة الذكية</h4>
      <p>تركيب كاميرات بدقة عالية وتحليلات فيديو فورية للتعرف على الوجوه والحركة.</p>
    </div>
    <div class="service">
      <img src="network.webp" alt="الشبكات">
      <h4>🌐 الشبكات المتقدمة</h4>
      <p>تصميم وتنفيذ شبكات آمنة وفعالة للمنازل والشركات مع حماية بيانات قوية.</p>
    </div>
    <div class="service">
      <img src="pbx.jpg" alt="السنترالات">
      <h4>☎️ أنظمة السنترالات</h4>
      <p>سنترالات ذكية باستخدام VoIP، مع إمكانية ربطها بالأنظمة الإدارية (ERP/CRM).</p>
    </div>
    <div class="service">
      <img src="support.jpg" alt="الدعم الفني">
      <h4>🛠️ دعم فني شامل</h4>
      <p>مهندسون وفنيون محترفون على مدار الساعة لصيانة الأنظمة والتدخل السريع.</p>
    </div>
  </div>
</section>

<section id="contact" class="contact">
  <h2>📞 اتصل بنا</h2>
  <p>📧 info@madaratsys.com</p>
  <p>📱 +966500904343</p>
  <p>📍 مكة المكرمة، المملكة العربية السعودية</p>
</section>

<footer>
  &copy; <?= date('Y') ?> جميع الحقوق محفوظة - شركة مدارات للأنظمة المحدودة
</footer>

</body>
</html>