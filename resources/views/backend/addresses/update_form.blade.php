@extends('backend.shared.backend_theme')
@section("title","Kullanıcı Modülü")
@section("subtitle","Kullanıcı Güncelle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("content")
                <form action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" method="POST" novalidate>
                    @csrf
                    @method("PUT")
                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                    <input type="hidden" name="user_id" value="{{$addr->address_id}}">
                    <div class="row">
                    <div class="col-lg-6">
                            <label for="city" class="form-label">Şehir</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Şehir" value="{{old("city",$addr->city)}}">
                        @error("city")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="col-lg-6">
                            <label for="district" class="form-label">İlçe</label>
                            <input type="text" class="form-control" id="district" name="district" placeholder="İlçe" value="{{old("district",$addr->district)}}">
                            @error("district")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="zipcode" class="form-label">Posta Kodu</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Posta Kodu" value="{{old("zipcode",$addr->zipcode)}}">
                        @error("zipcode")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-check mt-lg-4">
                            <input class="form-check-input" type="checkbox"  id="is_default" name="is_default" value="1" {{$addr->is_default == 1 ? "checked" : " "}}>
                            <label class="form-check-label" for="is_default">
                                Varsayılan
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-2">
                        <div class="mt-4">
                            <label for="address" class="form-label">Açık Adres</label>
                            <textarea name="address" id="address" class="form-control"  cols="20" rows="5" >{{$addr->address}}</textarea>
                            @error("address")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success mt-3">Kaydet</button>
                        </div>
                    </div>
                </form>
@endsection

