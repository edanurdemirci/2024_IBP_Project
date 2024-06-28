@extends('admin_panel_empty')

@section('title', 'Tüm Salonlar')

@section('form')
<div class="card-header">
    <h3 class="card-title">Dükkanlar Listesi</h3>
</div>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>İsim</th>
                <th>Şehir</th>
                <th>Telefon</th>
                <th>E-posta</th>
                <th>Detay Bilgi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Shops->sortBy('name') as $shop)
                <tr>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->city }}</td>
                    <td>{{ $shop->phone }}</td>
                    <td>{{ $shop->email }}</td>
                    <td>{{ $shop->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
