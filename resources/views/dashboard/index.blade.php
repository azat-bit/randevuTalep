@extends('layouts.dashboard-menu')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
    <h2>{{ strtoupper($name) }}</h2>
        <p>Bu, randevu yönetiminiz için tasarlanmış basit bir dashboard sayfasıdır.</p>

        <div class="card-container">
            <div class="card">
                <h3>Bugünkü Randevular</h3>
                <p>Toplam: {{$countRandevu}}</p>
            </div>
            <div class="card">
                <h3>Yaklaşan Randevular</h3>
                <p>Toplam: 12</p>
            </div>
            <div class="card">
                <h3>İptal Edilen Randevular</h3>
                <p>Toplam: 2</p>
            </div>
        </div>

        <div class="calendar">
            <h2>Takvim Görünümü</h2>
            <p>Burada takvim entegrasyonu yapılacak.</p>
        </div>
    </div>
@endsection
