<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/login.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<script type="text/javascript" src="script/jquery-3.6.0.min.js"></script>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giriş Yap</title>
</head>
<body>
<div class="contanier">
	<div class="loginPanel">
		<div class="h2">
			<h2>Live Chat<br>LOGİN</h2>
		</div>

		<form action="{{route('authenticate')}}" method="POST">
            @CSRF
            @if(Session::has('error'))
            <p style="color:green;text-align: center">
                Hata:{{session('error')}}
            </p>
            @endif
            @if(Session::has('logout'))
                <p style="color:green;text-align: center">
                    {{session('logout')}}
                </p>
            @endif
			<span>
				<p>E-posta</p><input class="input" type="email" value="{{old('email')}}" name="email">
			</span>
		<span>
			<p>Şifre</p><input class="input" type="password" name="password">
		</span>
		<div class="rememberme">
			<input  type="checkbox" name="remember_me" value="1">Beni Hatırla
		</div>
		<button name="kullanici_login" type="submit" class="btnLogin">Giriş Yap</button>

	</form>


	</div>
</div>
</body>
</html>
