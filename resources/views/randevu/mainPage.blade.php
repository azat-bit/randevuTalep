<!-- resources/views/randevu/mainPage.blade.php -->

@extends('layouts.dashboard-menu')

@section('content')
<div class="container">
    <h2>Randevular</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($randevular->isEmpty())
        <p>Henüz herhangi bir randevu bulunmuyor.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Açıklama</th>
                    <th>Tarih</th>
                    <th>Başlık</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($randevular as $randevu)
                    <tr>
                        <td>{{ $randevu->aciklama }}</td>
                        <td>{{ $randevu->tarih }}</td>

                        <td>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('create', ['id' => $user->id]) }}" class="btn btn-primary">Yeni Randevu Ekle</a>
</div>
@endsection