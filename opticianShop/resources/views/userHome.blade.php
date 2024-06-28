<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Diseño de tienda online</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="{{asset('home-style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<header class="main-header">
      <div class="container container--flex">
        <div class="main-header__container">
          <h1 class="main-header__title">Eda Optik</h1>
          <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
          <nav class="main-nav" id="main-nav">
            <ul class="menu">
              <li class="menu__item"><a href="{{route('home')}}" class="menu__link">Ana Sayfa</a></li>
              <li class="menu__item"><a class="menu__link">İletişim</a></li>
              <li class="menu__item"><a href="{{route('usershowAllUpdates')}}" class="menu__link">Duyurular</a></li>
              <li class="menu__item"><a href="{{route('logout')}}" class="menu__link">Çıkış Yap</a></li>
            </ul>
          </nav>
        </div>
        <div class="main-header__container">
        </div>
        <div class="main-header__container">
          <a href="" class="main-header__link"><i class="fas fa-user"></i></a>
        </div>
      </div>
    </header>
    <div class="container-slider">
      <div class="slider" id="slider">
        <div class="slider__section">
          <img src="https://images.pexels.com/photos/2097085/pexels-photo-2097085.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="slider__img">
          <div class="slider__content">
            <h2 class="slider__title">Tarzını Göster</h2>
            <p class="slider__txt">İlk alışverişe özel fırsatları yakala!</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
        </div>
        <div class="slider__section">
          <img src="https://images.pexels.com/photos/3414327/pexels-photo-3414327.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="slider__img">
          <div class="slider__content">
            <h2 class="slider__title">Kadın Gözlükleri</h2>
            <p class="slider__txt">Yaza özel filtre fırsatları</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
        </div>
        <div class="slider__section">
          <img src="https://images.pexels.com/photos/2846815/pexels-photo-2846815.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="slider__img">
          <div class="slider__content">
            <h2 class="slider__title">Dinlendirici Gözlükler</h2>
            <p class="slider__txt">Yazın da okumaya ara verme! %70'e varan indirimler</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
        </div>
        <div class="slider__section">
          <img src="https://snappygoat.com/b/e031d75f5c05484c31a2e3eb0dcc218b4268620a" alt="" class="slider__img">
          <div class="slider__content">
            <h2 class="slider__title">Erkek Gözlükleri</h2>
            <p class="slider__txt">Güneş gözlüklerinde %40'a varan indirimler</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
        </div>
      </div>
      <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
      <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
    </div>
    <main class="main">
      <div class="container">
        <h2 class="main-title">Son zamanda popüler modeller</h2>
        <section class="container-products">
          <div class="product">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Lentes_del_Ojo_de_cristal..jpg" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title">Farenheit (Gri)</h3>
              <span class="product__price">575.00₺</span>
            </div>
          </div>
          <div class="product">
            <img src="https://www.nunsarangoptical.com/blog/wp-content/uploads/2019/03/nunsarang-usar-lentes-de-sol-mas-seguido.jpg" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title">Opium (Siyah)</h3>
              <span class="product__price">550.00₺</span>
            </div>
          </div>
          <div class="product">
            <img src="https://c.pxhere.com/photos/91/35/glasses_accessoirs_fashion_sunglasses_sun_modern_backgrounds_elegance-1042997.jpg!d" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title">Kenneth Cole</h3>
              <span class="product__price">750.00₺</span>
            </div>
          </div>
          <div class="product">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b6/Gafas_de_sol_Rayban_Aviador.jpg" alt="" class="product__img">
            <div class="product__description">
              <h3 class="product__title">Farenheit Oval</h3>
              <span class="product__price">325.00₺</span>
            </div>
          </div>
        </section>
        <section class="container__testimonials">
          <h2 class="section__title">Kısaca</h2>
          <h3 class="testimonial__title">Hakkımızda</h3>
          <p class="testimonial__txt">1930'lu yılların başında, İstanbul'un tarihi semtlerinden biri olan Beyoğlu'nda küçük bir dükkân olarak açılan Eda Optik, şehrin en köklü ve saygın optikçilerinden biri olma yolunda adım adım ilerledi. Kurucusu Eda Hanım, genç yaşlarında babasından öğrendiği gözlük yapım ustalığını ve insanlara en iyi hizmeti sunma arzusunu birleştirerek bu mütevazı dükkânı kurdu. Eda Hanım'in titizliği ve müşteri memnuniyetine verdiği önem sayesinde, kısa sürede İstanbul'un dört bir yanından gelen müşteriler Eda Optik'in kapısını aşındırmaya başladı. II. Dünya Savaşı yıllarında, zorluklara rağmen, Eda Hanım ve ailesi, dükkânlarını ayakta tutmak için büyük fedakârlıklar yaptı. Bu dönemde, savaşın getirdiği malzeme sıkıntılarına rağmen, yaratıcı çözümlerle müşterilerine hizmet sunmayı başardılar. 1950'li yıllara gelindiğinde, Eda Optik sadece bir dükkân değil, bir aile işletmesi olarak, yeni nesil optisyenlerin yetiştiği bir okul haline geldi. Eda Hanım'in çocukları, modern optik tekniklerini öğrenerek babalarının mirasını sürdürdü. Teknolojinin ilerlemesiyle birlikte, Eda Optik de kendini sürekli yeniledi ve hem klasik hem de modern gözlük çerçeveleri, lensler ve güneş gözlükleri ile geniş bir ürün yelpazesi sunmaya başladı. 1980'lerde, İstanbul'un büyümesi ve yeni semtlerin ortaya çıkmasıyla birlikte, Eda Optik de yeni şubeler açarak daha fazla müşteriye ulaşmayı hedefledi. Günümüzde, Eda Hanım'in torunları tarafından yönetilen bu köklü işletme, geçmişten gelen tecrübe ve güvenle, modern gözlük teknolojilerini bir araya getirerek, İstanbul'un en prestijli optikçilerinden biri olarak varlığını sürdürüyor. Her bir müşterisine kişisel bir deneyim sunarak, sadece bir gözlük değil, aynı zamanda tarih ve kalite dolu bir miras sunuyor.</p>
        </section>

        <div class="container-editor">
          <div class="editor__item">
            <img src="{{asset('glass.png')}}" alt="" class="editor__img">
            <p class="editor__circle">Tarzını Öğren</p>
          </div>
          <div class="editor__item">
            <img src="https://images.pexels.com/photos/261856/pexels-photo-261856.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" class="editor__img">
            <p class="editor__circle">Kendini Öne Çıkar</p>
          </div>
        </div>
        <section class="container-tips">
          <div class="tip">
            <i class="far fa-hand-paper"></i>
            <h2 class="tip__title">2 Sene Garanti</h2>
            <p class="tip__txt">Çerçevelerimize güveniyoruz!</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
          <div class="tip">
           <i class="fas fa-rocket"></i>
            <h2 class="tip__title">Hızlı Teslim</h2>
            <p class="tip__txt">2 gün içinde gözlüğü hazırlayıp teslim ediyoruz, kargo ile teslim almak isterseniz bu yalnızca bir gün sürüyor!</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
          <div class="tip">
            <i class="fas fa-cog"></i>
            <h2 class="tip__title">Yenilikçi Filtreleme</h2>
            <p class="tip__txt">Son teknoloji ekipmanlarımız sayesinde uygun fiyata koruma seçenekleri.</p>
            <a class="btn-shop">İletişime Geç</a>
          </div>
        </section>
      </div>
    </main>
    <footer class="main-footer">
      <div class="footer__section">
        <h2 class="footer__title">Hakkımızda</h2>
        <p class="footer__txt">1930'larda Beyoğlu'nda küçük bir dükkân olarak kurulan Eda Optik, Eda Hanım'ın önderliğinde zorluklara rağmen büyüyerek İstanbul'un en saygın optikçilerinden biri haline geldi. Günümüzde Eda Hanım'ın torunları tarafından yönetilen bu köklü işletme, geçmişin tecrübesiyle modern teknolojiyi birleştirerek müşteri memnuniyetini en üst düzeyde tutuyor.</p>
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Konum:</h2>
        <p class="footer__txt">Gözde Optik, İstanbul Beyoğlu'nda, İstiklal Caddesi No: 34, 4. Blok Binası, Beyoğlu/İstanbul</p>
        <h2 class="footer__title">İletişim:</h2>
        <p class="footer__txt">Telefon: 262 262 262 262</p>
        <p class="footer__txt">E-posta: info@edaoptik.com</p>
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Hızlı Erişim</h2>
        <a href="{{route('login')}}" class="footer__link">Çıkış Yap</a>
        <a class="footer__link">İletişime Geç</a>
      </div>
      <div class="footer__section">
        <h2 class="footer__title">Detaylar ve İletişim için oturum aç!</h2>
        <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
            <div class="card col-md-6 direct-chat direct-chat-primary" style="height: 100%;">
                <div class="card-header">
                    <h3 class="card-title">Chat</h3>
                </div>
                <div class="card-footer">
                    <form action="{{ route('messageChat.post') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input name="message" placeholder="Mesaj yaz..." class="form-control">
                            <input name="sender_id" value="{{ Auth::user()->id }}" hidden>
                            <input name="receiver_id" value="{{ 3 }}" hidden>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Gönder</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      <p class="copy">© Eda Optik 2024</p>
    </footer>
<!-- partial -->
  <script  src="{{asset('home-script.js')}}"></script>

</body>
</html>
