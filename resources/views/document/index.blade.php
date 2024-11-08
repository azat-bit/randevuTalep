<!-- resources/views/documents/mainPage.blade.php -->

@extends('layouts.dashboard-menu')

@section('content')
<div class="container">
    <h2>Dökümantasyon Yönetimi</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($documents->isEmpty())
        <p>Henüz herhangi bir dökümantasyon bulunmuyor.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->description }}</td>
                        <td>
                            <!-- Düzenle Butonu -->
                            <a href="" class="btn btn-primary" title="Düzenle">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Sil Butonu -->
                            <a href="" class="btn btn-danger" title="Sil"
                                onclick="return confirm('Bu dökümantasyonu silmek istediğinize emin misiniz?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{route('document.create',['id' => $user->id])}}" class="btn btn-primary">Yeni Dökümantasyon Ekle</a>
</div>
@endsection
