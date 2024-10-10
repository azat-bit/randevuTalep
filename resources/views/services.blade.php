@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Randevu Sistemi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Randevular</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">İletişim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary text-white" href="{{ route('login') }}">Hemen Randevu Al</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section text-center py-5 bg-primary text-white">
    <div class="container">
        <h1 class="display-4 font-weight-bold">Randevularınızı Kolayca Yönetin</h1>
        <p class="lead">Hızlı, güvenli ve kullanıcı dostu randevu sistemi ile işletmenizin verimliliğini artırın.</p>
        <a href="#" class="btn btn-light btn-lg mt-3">Hemen Başlayın</a>
    </div>
</section>

<!-- Özellikler Bölümü -->
<section class="features-section py-5">
    <div class="container text-center">
        <h2 class="mb-5">Neden Bizim Randevu Sistemimiz?</h2>
        <div class="row">
            <!-- Özellik 1 -->
            <div class="col-md-4">
                <div class="feature-card p-4 shadow-sm">
                    <i class="fas fa-calendar-check fa-3x text-primary mb-3"></i>
                    <h4>Kolay Randevu Takibi</h4>
                    <p>Randevularınızı hızlı bir şekilde takip edin ve zamanınızı en iyi şekilde yönetin.</p>
                </div>
            </div>

            <!-- Özellik 2 -->
            <div class="col-md-4">
                <div class="feature-card p-4 shadow-sm">
                    <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                    <h4>Güvenlik ve Gizlilik</h4>
                    <p>Kullanıcı bilgileriniz güvende ve gizli tutulur. Yüksek güvenlik standartları ile çalışıyoruz.
                    </p>
                </div>
            </div>

            <!-- Özellik 3 -->
            <div class="col-md-4">
                <div class="feature-card p-4 shadow-sm">
                    <i class="fas fa-clock fa-3x text-primary mb-3"></i>
                    <h4>Hızlı ve Kullanıcı Dostu</h4>
                    <p>Hızlı bir kullanıcı arayüzü ile, işlemlerinizi kolayca gerçekleştirin ve vakit kaybetmeyin.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action (CTA) -->
<section class="cta-section text-center py-5 bg-primary text-white">
    <div class="container">
        <h2 class="font-weight-bold">Randevu Almak İçin Hazır mısınız?</h2>
        <p class="lead">Zamanınızı verimli kullanmak ve randevularınızı profesyonelce yönetmek için hemen başlayın!</p>
        <a href="#" class="btn btn-light btn-lg mt-3">Randevu Al</a>
    </div>
</section>
@endsection