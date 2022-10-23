@extends('backend.shared.backend_theme')
@section("title","Kullanıcı Modülü")
@section("subtitle","Şifre Değiştir")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("content")
                <form action="{{url("/users/$user->user_id/change-password")}}" method="POST">
                    @csrf
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
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-3">Kaydet</button>
                        </div>
                    </div>
                </form>
@endsection

