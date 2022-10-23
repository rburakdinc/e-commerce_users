@extends('backend.shared.backend_theme')
@section("title","Kullanıcı Modülü")
@section("subtitle","Yeni Kullanıcı Ekle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("content")
                <form action="{{url("/users")}}" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-lg-6">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" placeholder="Ad Soyad">
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old("email")}}" placeholder="E-Posta">
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Şifre">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="password_confirmation" class="form-label">Şifre Tekrarı</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifre Tekrarı">
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="is_admin" name="is_admin" value="1">
                                <label class="form-check-label" for="is_admin">
                                    Yetkili Kullanıcı
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox"  id="is_active" name="is_active" value="1">
                                <label class="form-check-label" for="is_active">
                                    Aktif Kullanıcı
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-3">Kaydet</button>
                        </div>
                    </div>
                </form>
@endsection

