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
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($randevular as $randevu)
                    <tr>
                        <td>{{ $randevu->aciklama }}</td>
                        <td>{{ $randevu->tarih }}</td>
                        <td>
                            <!-- Düzenle Butonu -->
                            <a href="{{ route('randevu.edit', ['id' => $randevu->id]) }}" class="btn btn-primary"
                                title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Sil Butonu -->
                            <a href="{{ route('randevu.delete', ['id' => $randevu->id]) }}" class="btn btn-danger" title="Sil"
                                onclick="return confirm('Bu randevuyu silmek istediğinize emin misiniz?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('create', ['id' => $user->id]) }}" class="btn btn-primary">Yeni Randevu Ekle</a>
</div>
@endsection