@extends('form_layout')

@section('title', 'Şifremi Unuttum')

@section('form')
    <form id="msform" action="{{route('forgot_my_password.post')}}" method="POST">
        @csrf
        <fieldset>
            <h2 class="fs-title">Eda Optik</h2>
            <h3 class="fs-subtitle">Şifre Yenileme</h3>
            <input type="text" name="email" placeholder="E-Posta" />
            <input type="password" name="password" placeholder="Şifre"/>
            <input type="password" name="password2" placeholder="Şifreyi Doğrula"/><br><br>
            <p style="font-size: 12px;">Zaten kayıtlı mısın? <a href="{{route('login')}}">Oturum Aç</a></p><br>
            <input type="submit" class="next action-button" value="Şifremi Yenile"/>
        </fieldset>
    </form>
@endsection
