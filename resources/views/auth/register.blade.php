@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kayıt Ol') }}</div>

                <div class="card-body">
                    <!-- Başarı Mesajı -->
                    <div id="success-message" class="alert alert-success d-none"></div>

                    <!-- Hata Mesajları -->
                    <div id="error-message" class="alert alert-danger d-none"></div>

                    <!-- Kayıt Formu -->
                    <form id="register-form">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Ad Soyad') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-posta Adresi') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Şifre') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Şifreyi Onayla') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Kayıt Ol') }}
                            </button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JQuery ve AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#register-form').on('submit', function (e) {
            e.preventDefault(); // Sayfa yenilemeyi durdur

            // Form verilerini al
            let formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                password_confirmation: $('#password-confirm').val(),
                _token: $('input[name="_token"]').val()
            };

            // AJAX isteği gönder
            $.ajax({
                url: "{{ route('register') }}", // Route tanımlaması
                type: "POST",
                data: formData,
                success: function (response) {
                    // Başarı mesajı göster
                    $('#success-message').removeClass('d-none').text(response.message);
                    $('#error-message').addClass('d-none'); // Hata mesajını gizle

                    // Formu sıfırla
                    $('#register-form')[0].reset();
                },
                error: function (xhr) {
                    // Hataları al ve ekrana göster
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    $.each(errors, function (key, value) {
                        errorMessage += '<p>' + value[0] + '</p>';
                    });
                    $('#error-message').removeClass('d-none').html(errorMessage);
                    $('#success-message').addClass('d-none'); // Başarı mesajını gizle
                }
            });
        });
    });
</script>
@endsection
