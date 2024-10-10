

@extends('layouts.dashboard-menu')

@section('content')
<div class="container">
    <h2><i class="fas fa-user"></i> {{ $user->name }}'in Profili</h2>
    <div class="profile-details">
        <p><strong>Ad Soyad:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Kayıt Tarihi:</strong> {{ $user->created_at->format('d M Y') }}</p>
       
    </div>
</div>
@endsection
