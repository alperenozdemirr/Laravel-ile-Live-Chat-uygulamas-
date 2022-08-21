<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/profil.css">
    <title>Profilim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">

                <div class="card card-style1 border-0">
                    <div class="text-right mt-3">
                        <a href="{{route('index')}}" type="button" class="btn btn-primary">Geriye Git</a>&nbsp;

                    </div>
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">

                            <div class="col-lg-6 mb-4 mb-lg-0">
                                @if($data['profil']->image == null)
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="...">
                                @else
                                    <img src="{{asset('images')}}/{{$data['profil']->image}}" alt="" >
                                @endif
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">{{$data['profil']->name}}</h3>
                                    <span class="text-primary">Kullanıcı</span>
                                </div>
                                <ul class="list-unstyled mb-1-9">

                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> {{$data['profil']->email}}</li>

                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> {{$data['profil']->phone}}</li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">Hakkımda</span>
                    <p>{{$data['profil']->info}}</p>

                </div>
            </div>

        </div>
    </div>
</section>
</body>
</html>
