@extends('admin_panel_empty')

@section('title', 'Dükkan Ekle')

@section('form')
<div class="card border-secondary shadow-lg">
    <form action="{{ route('addShop.post') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="name" class="form-label">Dükkan İsmi:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="city" class="form-label">Şehir:</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone" class="form-label">Telefon Numarası:</label>
                <input type="tel" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">E-Posta Adresi:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Detaylar:</label>
                <textarea name="description" id="description" class="form-control" rows="2" required></textarea>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-plus-circle me-2"></i>&nbsp; &nbsp; Dükkanı Ekle
            </button>
        </div>
    </form>
</div>
@endsection
