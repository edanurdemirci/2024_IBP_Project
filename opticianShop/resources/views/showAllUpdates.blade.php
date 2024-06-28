@extends('admin_panel_empty')

@section('title', 'Tüm Haberler')

@section('form')
            <div class="card-header">
                <h3 class="card-title">Haberler Listesi</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Açıklama</th>
                            <th>İçerik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Updates->sortBy('role') as $update)
                            <tr>
                                <td>{{ $update->tittle }}</td>
                                <td>{{ $update->description }}</td>
                                <td>{{ Str::substr($update->content, 0, 150) }}...</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection
