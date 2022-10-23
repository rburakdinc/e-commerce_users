@extends('backend.shared.backend_theme')
@section("title","Kullanıcı Modülü")
    @section("subtitle","Kullanıcı Listesi")
    @section("btn_url",url("/users/create"))
    @section("btn_label","Yeni Ekle")
    @section("content")
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Kaydolma Sırası</th>
                <th scope="col">Ad Soyad</th>
                <th scope="col">E-Posta</th>
                <th scope="col">Durum</th>
                <th scope="col">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($users) > 0)
                @foreach($users as $user)
                    <tr id="{{$user->user_id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->is_active == 1)
                                <span class="badge text-bg-info text-black">Aktif</span>
                            @else
                                <span class="badge text-bg-secondary text-black">Pasif</span>
                            @endif
                        </td>
                        <td>
                            <ul class="nav float-start">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{url("/users/$user->user_id/edit")}}">
                                        <span data-feather="edit"></span>
                                        Güncelle
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link list-item-delete "
                                       href="{{url("/users/$user->user_id")}}">
                                        <span data-feather="trash-2"></span>
                                        Sil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link "
                                       href="{{url("/users/$user->user_id/change-password")}}">
                                        <span data-feather="lock"></span>
                                        Şifre Değiştir
                                    </a>
                                </li>

                                <a class="nav-link "
                                   href="{{url("/users/$user->user_id/addresses")}}">
                                    <span data-feather="home"></span>
                                    Adresleri Göster
                                </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <p class="text-center">Herhangi bir kullancı bulunamadı.</p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    @endsection
