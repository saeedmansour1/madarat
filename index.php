<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مدارات للأنظمة المحدودة</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #005f73;
      --secondary-color: #0a9396;
      --accent-color: #94d2bd;
      --bg-light: #f6fafd;
      --text-dark: #222;
      --text-light: #fff;
      --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
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
      overflow-x: hidden;
    }

    /* Header Styles */
    header {
      position: relative;
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                  url('security-bg.webp') center/cover no-repeat;
      height: 100vh;
      min-height: 600px;
      color: var(--text-light);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 15px;
      overflow: hidden;
    }

    header::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100px;
      background: linear-gradient(to top, var(--bg-light), transparent);
      z-index: 1;
    }

    header h1, header p {
      position: relative;
      z-index: 2;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 1s forwards 0.3s;
    }

    header h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      font-weight: 900;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
      line-height: 1.3;
    }

    header p {
      font-size: 1.3rem;
      max-width: 800px;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
      margin-bottom: 30px;
      animation-delay: 0.6s;
    }

    .header-btn {
      display: inline-block;
      background: var(--secondary-color);
      color: white;
      padding: 12px 30px;
      border-radius: 50px;
      text-decoration: none;
      font-weight: bold;
      font-size: 1.1rem;
      margin: 10px;
      transition: var(--transition);
      box-shadow: 0 5px 15px rgba(0, 180, 216, 0.3);
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 1s forwards 0.9s;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .header-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 100%;
      background: var(--primary-color);
      transition: var(--transition);
      z-index: -1;
    }

    .header-btn:hover::before {
      width: 100%;
    }

    .header-btn:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 180, 216, 0.4);
    }

    .auth {
      position: absolute;
      left: 25px;
      top: 25px;
      z-index: 10;
      display: flex;
      gap: 15px;
    }

    .auth a {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      color: white;
      padding: 10px 20px;
      border-radius: 50px;
      text-decoration: none;
      font-weight: bold;
      transition: var(--transition);
      font-size: 0.9rem;
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .auth a:hover {
      background: var(--secondary-color);
      transform: translateY(-3px);
    }

    /* Navigation */
    nav {
      position: sticky;
      top: 0;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      padding: 15px 0;
      box-shadow: var(--box-shadow);
      text-align: center;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      z-index: 1000;
      transition: var(--transition);
    }

    nav.scrolled {
      padding: 10px 0;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    nav a {
      margin: 5px 15px;
      color: var(--primary-color);
      font-weight: bold;
      text-decoration: none;
      transition: var(--transition);
      font-size: 1rem;
      position: relative;
      padding: 5px 0;
    }

    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      right: 0;
      width: 0;
      height: 2px;
      background: var(--secondary-color);
      transition: var(--transition);
    }

    nav a:hover::after {
      width: 100%;
      left: 0;
    }

    nav a:hover {
      color: var(--secondary-color);
    }

    /* Sections */
    .section {
      padding: 80px 15px;
      text-align: center;
      max-width: 1200px;
      margin: auto;
    }

    .section h2 {
      font-size: 2.2rem;
      color: var(--primary-color);
      margin-bottom: 30px;
      position: relative;
      display: inline-block;
    }

    .section h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      right: 0;
      width: 70px;
      height: 3px;
      background: var(--secondary-color);
      border-radius: 3px;
    }

    .section p {
      font-size: 1.1rem;
      max-width: 800px;
      margin: auto;
      color: #555;
      line-height: 1.8;
    }

    /* Services */
    .services {
      margin-top: 50px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
    }

    .service {
      background: white;
      border-radius: 16px;
      box-shadow: var(--box-shadow);
      overflow: hidden;
      transition: var(--transition);
      position: relative;
      z-index: 1;
    }

    .service::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, transparent, rgba(0, 95, 115, 0.1));
      z-index: -1;
      opacity: 0;
      transition: var(--transition);
    }

    .service:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .service:hover::before {
      opacity: 1;
    }

    .service img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: var(--transition);
    }

    .service:hover img {
      transform: scale(1.05);
    }

    .service-content {
      padding: 25px;
    }

    .service h4 {
      font-size: 1.3rem;
      color: var(--primary-color);
      margin-bottom: 15px;
      transition: var(--transition);
    }

    .service:hover h4 {
      color: var(--secondary-color);
    }

    .service p {
      padding: 0;
      font-size: 1rem;
      color: #666;
      margin-bottom: 15px;
    }

    .service-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: var(--secondary-color);
      display: inline-block;
      transition: var(--transition);
    }

    .service:hover .service-icon {
      transform: rotate(10deg) scale(1.1);
    }

    /* Contact Section */
    .contact {
      background: linear-gradient(135deg, #eaf3f9 0%, #d4e6f5 100%);
      padding: 80px 15px;
      position: relative;
      overflow: hidden;
    }

    .contact::before {
      content: '';
      position: absolute;
      top: -50px;
      left: -50px;
      width: 200px;
      height: 200px;
      background: rgba(10, 147, 150, 0.1);
      border-radius: 50%;
    }

    .contact::after {
      content: '';
      position: absolute;
      bottom: -100px;
      right: -100px;
      width: 300px;
      height: 300px;
      background: rgba(10, 147, 150, 0.1);
      border-radius: 50%;
    }

    .contact-info {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      margin-top: 40px;
    }

    .contact-item {
      background: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: var(--box-shadow);
      transition: var(--transition);
      flex: 1 1 300px;
      max-width: 350px;
    }

    .contact-item:hover {
      transform: translateY(-10px);
    }

    .contact-icon {
      font-size: 2.5rem;
      color: var(--secondary-color);
      margin-bottom: 20px;
    }

    /* Footer */
    footer {
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      text-align: center;
      padding: 30px 15px;
      color: white;
      font-size: 1rem;
      position: relative;
    }

    .social-links {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-bottom: 20px;
    }

    .social-links a {
      color: white;
      font-size: 1.5rem;
      transition: var(--transition);
    }

    .social-links a:hover {
      color: var(--accent-color);
      transform: translateY(-5px);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    .floating {
      animation: float 6s ease-in-out infinite;
    }

    /* Responsive */
    @media (max-width: 992px) {
      header h1 {
        font-size: 2.5rem;
      }
      
      header p {
        font-size: 1.1rem;
      }
      
      .services {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      }
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
        left: 15px;
        top: 15px;
        gap: 10px;
      }
      
      .section {
        padding: 60px 15px;
      }
      
      .section h2 {
        font-size: 1.8rem;
      }
    }

    @media (max-width: 576px) {
      header h1 {
        font-size: 1.8rem;
      }
      
      nav a {
        margin: 5px 10px;
        font-size: 0.9rem;
      }
      
      .service {
        max-width: 350px;
        margin: 0 auto;
      }
      
      .contact-item {
        padding: 20px;
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
  <a href="#contact" class="header-btn">تواصل معنا</a>
</header>

<nav id="navbar">
  <a href="#about">عن الشركة</a>
  <a href="#services">الخدمات</a>
  <a href="#contact">اتصل بنا</a>
</nav>

<section id="about" class="section">
  <h2>من نحن</h2>
  <p>شركة سعودية بخبرة أكثر من 10 سنوات في مجال الحلول الأمنية الذكية، الشبكات، السنترالات، والدعم الفني، نقدم خدماتنا بجودة عالية واحترافية تعتمد على أحدث التقنيات والذكاء الاصطناعي لضمان أعلى معايير الأمان والكفاءة.</p>
</section>

<section id="services" class="section">
  <h2>خدماتنا</h2>
  <p>نقدم مجموعة متكاملة من الحلول التقنية المصممة خصيصًا لتلبية احتياجات عملائنا</p>
  <div class="services">
    <div class="service">
      <img src="camera.jpg" alt="أنظمة المراقبة" class="floating" style="animation-delay: 0.2s;">
      <div class="service-content">
        <div class="service-icon"><i class="fas fa-camera"></i></div>
        <h4>أنظمة المراقبة الذكية</h4>
        <p>تركيب كاميرات بدقة 4K مع تحليلات فيديو فورية للتعرف على الوجوه والحركة والسلوك المشبوه باستخدام الذكاء الاصطناعي.</p>
      </div>
    </div>
    <div class="service">
      <img src="network.webp" alt="الشبكات" class="floating" style="animation-delay: 0.4s;">
      <div class="service-content">
        <div class="service-icon"><i class="fas fa-network-wired"></i></div>
        <h4>الشبكات المتقدمة</h4>
        <p>تصميم وتنفيذ شبكات آمنة وفعالة للمنازل والشركات مع أنظمة حماية متكاملة ضد الاختراق وفقدان البيانات.</p>
      </div>
    </div>
    <div class="service">
      <img src="pbx.jpg" alt="السنترالات" class="floating" style="animation-delay: 0.6s;">
      <div class="service-content">
        <div class="service-icon"><i class="fas fa-phone-alt"></i></div>
        <h4>أنظمة السنترالات</h4>
        <p>سنترالات ذكية باستخدام تقنية VoIP مع إمكانية ربطها بالأنظمة الإدارية (ERP/CRM) وتقارير تفصيلية.</p>
      </div>
    </div>
    <div class="service">
      <img src="tv.jpg" alt="شبكات الستلايت" class="floating" style="animation-delay: 0.6s;">
      <div class="service-content">
        <div class="service-icon"><i class="fas fa-phone-alt"></i></div>
        <h4>أنظمة الستلايت وشبكات القنوات</h4>
        <p>نصمم ونركب شبكات القنوات المركزية باحترافية تامة لضمان توزيع دقيق ومتوازن للإشارة في جميع أرجاء المبنى .</p>
      </div>
    </div>
    <div class="service">
      <img src="sound.jpg" alt="أنظمة الصوت" class="floating" style="animation-delay: 0.6s;">
      <div class="service-content">
        <div class="service-icon"><i class="fas fa-phone-alt"></i></div>
        <h4> sound system</h4>
        <p>نقدم أنظمة صوت متكاملة بتقنيات رقمية عالية الجودة لتغطية مثالية في جميع المساحات .</p>
      </div>
    </div>
    <div class="service">
      <img src="support.jpg" alt="الدعم الفني" class="floating" style="animation-delay: 0.8s;">
      <div class="service-content">
        <div class="service-icon"><i class="fas fa-headset"></i></div>
        <h4>دعم فني شامل</h4>
        <p>مهندسون وفنيون محترفون على مدار الساعة لصيانة الأنظمة والتدخل السريع مع تقارير دورية عن أداء النظام.</p>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="contact section">
  <h2>تواصل معنا</h2>
  <p>نحن هنا لمساعدتك في أي استفسار أو طلب خدمة</p>
  <div class="contact-info">
    <div class="contact-item">
      <div class="contact-icon"><i class="fas fa-envelope"></i></div>
      <h4>البريد الإلكتروني</h4>
      <p>info@madaratsys.com</p>
    </div>
    <div class="contact-item">
      <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
      <h4>الهاتف</h4>
      <p>+966500904343</p>
    </div>
    <div class="contact-item">
      <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
      <h4>المقر الرئيسي</h4>
      <p>مكة المكرمة، المملكة العربية السعودية</p>
    </div>
  </div>
</section>

<footer>
  <div class="social-links">
  </div>
  <p>جميع الحقوق محفوظة &copy; <span id="year"><?= date('Y') ?></span> - شركة مدارات للأنظمة المحدودة</p>
</footer>

<script>
  // Navbar scroll effect
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      document.getElementById('navbar').classList.add('scrolled');
    } else {
      document.getElementById('navbar').classList.remove('scrolled');
    }
  });

  // Animate elements when they come into view
  const animateOnScroll = function() {
    const elements = document.querySelectorAll('.service, .contact-item');
    
    elements.forEach(element => {
      const elementPosition = element.getBoundingClientRect().top;
      const screenPosition = window.innerHeight / 1.3;
      
      if (elementPosition < screenPosition) {
        element.style.opacity = '1';
        element.style.transform = 'translateY(0)';
      }
    });
  };

  // Set initial state for animation
  document.addEventListener('DOMContentLoaded', function() {
    const services = document.querySelectorAll('.service');
    const contacts = document.querySelectorAll('.contact-item');
    
    services.forEach((service, index) => {
      service.style.opacity = '0';
      service.style.transform = 'translateY(30px)';
      service.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) ' + (index * 0.1) + 's';
    });
    
    contacts.forEach((contact, index) => {
      contact.style.opacity = '0';
      contact.style.transform = 'translateY(30px)';
      contact.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) ' + (index * 0.1) + 's';
    });
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on load
  });
</script>

</body>
</html>