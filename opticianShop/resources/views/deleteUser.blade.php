@extends('admin_panel_empty')

@section('title', 'Kullanıcı Sil')

@section('form')
<div class="card-header bg-dark text-white text-center">
    <h3 class="card-title m-0">Silinecek Kullanıcının E-Posta Adresi</h3>
</div>
<form action="{{ route('deleteUser.post') }}" method="post">
    @csrf
    <div class="card-body p-4">
        <div class="form-group mb-3">
            <label for="email" class="form-label">E-posta:</label>
            <input style="color: black" type="email" name="email" id="email" class="form-control" placeholder="Email adresi giriniz" required>
        </div>
    </div>
    <div class="card-footer bg-light text-end">
        <button type="submit" class="btn btn-danger">Üyeyi Sil</button>
    </div>
</form>
@endsection
