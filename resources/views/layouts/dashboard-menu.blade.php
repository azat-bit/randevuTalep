<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('menu.css') }}">
    <link rel="stylesheet" href="{{ asset('table.css') }}">
    <link rel="stylesheet" href="{{ asset('form.css') }}">


</head>

<body>
    <!-- Sidebar Menü -->
    <div class="sidebar">
        <a href="{{ route('dashboard', ['id' => $user->id]) }}"><i class="fas fa-home"></i> Anasayfa</a>
        <a href="{{ route('user.profil', ['id' => $user->id]) }}"><i class="fas fa-user"></i> Profil</a>
        <a href="{{ route('randevu', ['id' => $user->id]) }}"><i class="fas fa-calendar-alt"></i> Randevular</a>
        <a href="{{ route('document.index', ['id' => $user->id]) }}"><i class="fas fa-file-alt"></i> Dökümantasyon Yönetimi</a>

        <a href="#"><i class="fas fa-calendar-alt"></i> Takvim</a>
        <a href="#"><i class="fas fa-cog"></i> Ayarlar</a>
        <a href="#"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a>
    </div>

    <!-- İçerik Alanı -->
    <div class="content">
        <!-- Dinamik Sayfa Başlığı -->
        <h1>@yield('header')</h1>

        <!-- Sayfa İçeriği -->
        @yield('content')
    </div>
</body>

</html>