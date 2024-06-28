@extends('admin_panel_empty')

@section('title', 'Haber Ekle')

@section('form')
<div class="card-header">
    <h3 class="card-title">Haber İçeriği</h3>
</div>
<form action="{{ route('addUpdate.post') }}" method="post">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="tittle">Haber Başlığı:</label>
            <input name="tittle" id="tittle" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Açıklama (Opsiyonel):</label>
            <input name="description" id="description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Haber Metni:</label>
            <input name="content" id="content" class="form-control" required>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Haber Oluştur</button>
    </div>
</form>
@endsection
