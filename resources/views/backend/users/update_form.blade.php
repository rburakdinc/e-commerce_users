@extends('backend.shared.backend_theme')
@section("title","Kullanıcı Modülü")
@section("subtitle","Kullanıcı Güncelle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("content")
                <form action="{{url("/users/$user->user_id")}}" method="POST" novalidate>
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                    <div class="row">
                    <div class="col-lg-6">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad" value="{{old("name",$user->name)}}">
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-Posta" value="{{old("email",$user->email)}}">
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                        <div class="col-lg-6 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"  id="is_admin" name="is_admin" value="1" {{$user->is_admin == 1 ? "checked ": ""}}>
                                <label class="form-check-label" for="is_admin">
                                    Yetkili Kullanıcı
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox"  id="is_active" name="is_active" value="1" {{$user->is_active == 1 ? "checked ": ""}}>
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

