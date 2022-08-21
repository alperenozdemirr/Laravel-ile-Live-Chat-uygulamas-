<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil ayar</title>
    <link rel="stylesheet" href="{{asset('frontend')}}/css/settings.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<body>
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        Profil Ayarları
    </h4>

    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Genel Ayar</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Şifre Ayarları</a>

                </div>
            </div>
            <div class="col-md-9">
                <form action="{{route('userSettingsUpdate')}}" enctype="multipart/form-data" method="POST">
                    @CSRF
                <div class="tab-content">

                    <div class="tab-pane fade active show" id="account-general">

                        <div class="card-body media align-items-center">
                            @if(Auth::user()->image == null)
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                            @else
                                <img src="{{asset('images')}}/{{Auth::user()->image}}" alt="" class="d-block ui-w-80">
                            @endif
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-primary">
                                    Fotorafı Değiştir
                                    <input type="file" name="image" class="account-settings-fileinput">
                                </label> &nbsp;


                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                            <div class="text-right mt-3">
                                <a href="{{route('index')}}" type="button" class="btn btn-primary">Geriye Git</a>&nbsp;

                            </div>
                        </div>
                        <hr class="border-light m-0">

                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Adınız Soyadınız</label>
                                <input type="text" name="name" class="form-control mb-1" value="{{Auth::user()->name}}">
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kendini Tanıt</label>
                                <textarea rows="5" name="info" class="form-control mb-1">{{Auth::user()->info}}</textarea>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Telefon Numarası</label>
                                <input type="number" name="phone"  class="form-control mb-1" value="{{Auth::user()->phone}}">

                            </div>
                            <div class="form-group">
                                <label class="form-label">E-mail</label>
                                <input type="text" disabled class="form-control mb-1" value="{{Auth::user()->email}}">

                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Kaydet</button>&nbsp;
                                <button type="button" class="btn btn-default">İptal</button>
                            </div>
                        </div>

                    </div>
                </form>

                    <div class="tab-pane fade" id="account-change-password">

                        <div class="card-body pb-2">
                            <form action="{{route('changePassword')}}" method="POST">
                                @CSRF


                            <div class="form-group">
                                <label class="form-label">Yeni Şifre</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tekrar Yeni Şifre</label>
                                <input type="password" name="confirm_password" class="form-control">

                            </div>
                                <div class="text-left mt-3">
                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                    <label style="color:brown" class="form-label">{{$error}}</label>
                                        @endforeach
                                    @endif
                                </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn btn-primary">Kaydet</button>&nbsp;
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </form>
        </div>
    </div>



</div>
@if(Session::has('passwordOk'))
    <script>alertify.success("Şifreniz Başarıyla Güncellendi");</script>
@endif
@if(Session::has('passwordNo'))
    <script>alertify.error("Şifreniz Güncellenemedi");</script>
@endif

@if(Session::has('profilOk'))
    <script>alertify.success("Profiliniz Başarıyla Güncellendi");</script>
@endif
@if(Session::has('profilNo'))
    <script>alertify.error("Profiliniz Güncellenemedi");</script>
@endif
</body>
</html>
