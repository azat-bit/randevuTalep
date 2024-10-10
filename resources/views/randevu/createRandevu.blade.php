<!-- resources/views/randevu/create.blade.php -->

@extends('layouts.dashboard-menu')

@section('content')
<div class="form-container">
    <h2><i class="fas fa-calendar-plus"></i> Yeni Randevu Oluştur</h2>

    <!-- Randevu oluşturma formu -->
    <form id="randevuForm" method="POST">
        @csrf <!-- CSRF koruması için token ekleyin -->
        <input type="hidden" name="user_id" value="{{ $id }}">
        <div class="form-group">
            <label for="baslik">Başlık:</label>
            <input type="text" name="baslik" id="baslik" class="form-control" placeholder="Randevu başlığı girin"
                required>
        </div>

        <div class="form-group">
            <label for="tarih">Tarih:</label>
            <input type="date" name="tarih" id="tarih" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="aciklama">Açıklama:</label>
            <textarea name="aciklama" id="aciklama" class="form-control" placeholder="Açıklama girin"
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
        $('#randevuForm').on('submit', function (e) {
            e.preventDefault(); // Formun normal gönderilmesini engelle

            $.ajax({
                url: "{{ route('randevu.store') }}", // Randevuyu kaydetmek için rota
                method: 'POST',
                data: $(this).serialize(), // Form verilerini al
                success: function (response) {
                    // Başarılı yanıt geldiğinde yapılacak işlemler
                    alert('Randevu başarıyla oluşturuldu!');
                    $('#randevuForm')[0].reset(); // Formu sıfırla
                },
                error: function (xhr) {

                    // Hata olduğunda yapılacak işlemler
                    var errorMessage = 'Bir hata oluştu: ' + xhr.responseText;
                    alert(errorMessage);
                }
            });
        });
    });
</script>
@endsection