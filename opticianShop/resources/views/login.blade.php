@extends('form_layout')

@section('title', 'Oturum Aç')

@section('form')
    <form id="msform" action="{{route('login.post')}}" method="POST">
        <fieldset>
            @csrf
            <h2 class="fs-title">Eda Optik</h2>
            <h3 class="fs-subtitle">Oturum Aç</h3>
            <input type="text" name="email" placeholder="E-Posta"/>
            <input type="password" name="password" placeholder="Şifre"/><br><br>
            <p style="font-size: 12px;">Şifreni mi unuttun? <a href="{{route('forgot_my_password')}}">Yenile</a></p><br>
            <p style="font-size: 12px;">Hesabın yok mu? Hemen <a href="{{route('registration')}}">oluştur!</a></p><br>
            <input type="submit" name="next" class="next action-button" value="Oturum Aç"/>
        </fieldset>
    </form>
@endsection
