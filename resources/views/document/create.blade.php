<!-- resources/views/documents/create.blade.php -->

@extends('layouts.dashboard-menu')

@section('content')
<div class="form-container">
    <h2><i class="fas fa-file-upload"></i> Yeni Belge Oluştur</h2>

    <!-- Belge oluşturma formu -->
    <form id="documentForm" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF koruması için token ekleyin -->
        <input type="hidden" name="user_id" value="{{ $id }}">
        <div class="form-group">
            <label for="title">Başlık:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Belge başlığı girin" required>
        </div>

        <div class="form-group">
            <label for="file_path">Dosya Yolu:</label>
            <input type="file" name="file_path" id="file_path" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Açıklama:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Açıklama girin"
                rows="4"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Kaydet</button>
            <a href="#" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Geri Dön</a>
        </div>
    </form>
</div>

<!-- jQuery ekleyin (eğer yüklü değilse) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX ile form gönderme -->
<script>
$(document).ready(function () {
    $('#documentForm').on('submit', function (e) {
        e.preventDefault(); // Formun normal gönderilmesini engelle

        // Form verilerini al
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('document.store') }}", // Doğru rota tanımı
            method: 'POST',
            data: formData,
            processData: false, // FormData kullanıldığında false olmalı
            contentType: false, // FormData kullanıldığında false olmalı
            success: function (response) {
                // Başarılı yanıt geldiğinde yapılacak işlemler
                alert('Belge başarıyla oluşturuldu!');
                $('#documentForm')[0].reset(); // Formu sıfırla
            },
            error: function (xhr) {
                // Hata olduğunda yapılacak işlemler
                var errors = xhr.responseJSON.errors;
                console.log(errors)
                var errorMessage = 'Bir hata oluştu:\n';
                for (var key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessage += errors[key] + '\n';
                    }
                }
                alert(errors);
            }
        });
    });
});
</script>
@endsection
