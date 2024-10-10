@extends('layouts.dashboard-menu')

@section('content')
<div class="container">
    <h2>Randevu Düzenle</h2>

    <form id="editRandevuForm">
        @csrf
        <div class="form-group">
            <label for="baslik">Başlık:</label>
            <input type="text" name="baslik" id="baslik" class="form-control" value="{{ $randevu->baslik }}" required>
        </div>

        <div class="form-group">
            <label for="tarih">Tarih:</label>
            <input type="date" name="tarih" id="tarih" class="form-control" value="{{ $randevu->tarih }}" required>
        </div>

        <div class="form-group">
            <label for="aciklama">Açıklama:</label>
            <textarea name="aciklama" id="aciklama" class="form-control" rows="4">{{ $randevu->aciklama }}</textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success">Güncelle</button>
            <a href="{{ route('randevu', ['id' => $randevu->user_id]) }}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </form>
</div>

<!-- jQuery ekleyin (eğer henüz ekli değilse) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX ile form gönderme -->
<script>
    $(document).ready(function () {
        $('#editRandevuForm').on('submit', function (e) {
            e.preventDefault(); // Formun normal gönderilmesini engelle

            var formData = {
                baslik: $('#baslik').val(),
                tarih: $('#tarih').val(),
                aciklama: $('#aciklama').val(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: "{{ route('randevu.update', ['id' => $randevu->id]) }}", // Güncelleme rotası
                method: 'POST',
                data: formData,
                success: function (response) {
                    // Başarılı yanıt geldiğinde yapılacak işlemler
                    alert('Randevu başarıyla güncellendi!');
                    window.location.href = "{{ route('randevu', ['id' => $randevu->user_id]) }}"; // Dinamik olarak yönlendir
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