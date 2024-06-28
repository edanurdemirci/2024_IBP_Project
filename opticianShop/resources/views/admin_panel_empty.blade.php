<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed dark-mode" data-panel-auto-height-mode="height">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Ana Sayfa</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout')}}" class="nav-link">Çıkış Yap</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->email}}</a>
        </div>
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Kullanıcı İşlemleri</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>Kullanıcı İşlemleri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addUser')}}" class="nav-link">
                  <p>Kullanıcı Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('UpdateUser')}}" class="nav-link">
                  <p>Kullanıcı Güncelle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('deleteUser')}}" class="nav-link">
                  <p>Kullanıcı Sil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showAllUsers')}}" class="nav-link">
                  <p>Tüm Kullanıcılar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Yönetim</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>Dükkan Kayıt İşlemleri
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addShop')}}" class="nav-link">
                  <p>Dükkan Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('UpdateShop')}}" class="nav-link">
                  <p>Dükkan Güncelle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('deleteShop')}}" class="nav-link">
                  <p>Dükkan Kaldır</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showAllShops')}}" class="nav-link">
                  <p>Tüm Dükkanlar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>Haberler
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addUpdate')}}" class="nav-link">
                  <p>Haber Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('editLastUpdate')}}" class="nav-link">
                  <p>Son Haberi Düzenle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showAllUpdates')}}" class="nav-link">
                  <p>Tüm Haberler</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('messageChat')}}" class="nav-link">
              <p>İletişim</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper bg-dark" data-auto-dark-mode="true">
    <div class="tab-content">
        @yield('form')
    </div>
  </div>
  <footer class="main-footer dark-mode">
    <strong>Telif Hakları &copy; 2024 Eda Optik</strong>
    Hakları saklıdır.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versiyon</b> 1.0.0
    </div>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>
