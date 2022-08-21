
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/index.css">

	<title>Live Chat</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <script>


      $(document).ready(function() {
        $("#messageİnput").click();
        //console.log($('#messageScreen').scrollTop().height());
          let loader= $('#loaderContanier');
          loader.hide();
            function scrollBottom(){
                var height = $(".messageScreen").scroll().height();
                $(".messageScreen").scrollTop(height+10000);
            }

           //ajax işlemi
          $.ajaxSetup({
              headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          /*$("#InvitationSendAction").on('submit',function(e) {
              loader.show();
              $.ajax({
                  type: "POST",
                  url: "{{route('invitation')}}",
                  data: $("#InvitationSendAction").serialize(),
                  success: function (data){
                      if(data){
                          setTimeout(scrollBottom,800);
                          loader.hide();
                      }else{
                          alert("now");
                          loader.hide();
                      }

                  }

              });
              e.preventDefault();
          });*/

          $("#messageInsert").on('submit',function(e) {
              loader.show();
              $.ajax({
                  type: "POST",
                  url: "{{route('MessageInsert')}}",
                  data: new FormData(this),
                  contentType: false,
                  cache:false,
                  processData: false,
                  success: function (data){
                      if(data){
                          alertify.success("İletildi");
                          setTimeout(scrollBottom,800);

                          loader.hide();
                          $("#messageInsert").find('input:text,input:file').val('');
                      }else{
                          alert("now");
                          loader.hide();
                      }

                  }

              });
              e.preventDefault();
          });



          function chatData() {

              $.ajax({
                  type: "GET",
                  url: "{{route('indexChatData')}}",
                  success: function (response){

                      //let veri = $('#veri');
                      let messageScreen =$('.messageScreen');
                      let messageContent = $('.messageContent');
                      let imgMessageContent = $('imgMessageContent');

                      messageScreen.html('');
                      $.each(response, function (key, chat) {
                          messageScreen.html('');
                          $.each(response, function (item, chat) {

                              messageScreen.append('<p class="messageContent">'+ chat.name+'=>'+chat.mesaj_icerik+'</p>');
                              if(chat.image != null){
                                    messageScreen.append('<p class="messageContent">'+'<br>'+
                                        '<img id="imageSelect"   class="image-scrool" width="150px" src="{{asset('chatMessageİmg')}}/'+chat.image+'"></p>');
                              }
                          });
                          //messageScreen.append('<br>');

                      });

                  }
              });
          }
          setInterval(chatData,1000);
          setInterval(scrollBottom,20000);
          setTimeout(scrollBottom,1500);
       });

    </script>

    <style>
        .image-scrool{
            transition: 1s;
            cursor:zoom-in;
        }
        .image-scrool:hover{


        }
        .image-scrool:active{
            z-index: 999;
            transform: scale(2);
            position: absolute;
        }
    </style>
</head>
<body>
<div id="loaderContanier">
    <div class="loader"></div>
</div>

	<div class="contanier">
<div class="header" id="header">

	<h1>Live Chat</h1>
	<p style="font-size: 15px;"><b><a style="color:black;text-decoration: none;" href="{{route('logout')}}">Oturumu Kapat</a></b></p>
</div>
	<div class="messageScreen" id="messageScreen">

	</div>
	<div class="users">
        <a href="{{route('user/settings')}}"> <div style="background-color:white" class="userContent">
            <div class="userİmage"><img src="{{asset('frontend')}}/image/profil-settings.png">
                <div style="color:brown;" class="userStatu"></div>
            </div>
            <span class="userName">
				<h1 style="color:#1b4b72">Profil Ayar</h1>
			</span>

            </div></a>
        @foreach($data['kullanicilar'] as $kullanici)

		<div class="userContent">
            @if($kullanici->image==null)
			<div class="userİmage"><img src="{{asset('frontend')}}/image/user.png">
                @else
                    <div class="userİmage"><img src="{{asset('images')}}/{{$kullanici->image}}">
                        @endif
                        @if($kullanici->user_status==0)
				<div style="background-color:brown;" class="userStatu"></div>
                        @elseif($kullanici->user_status==1)
                  <div style="background-color:green;" class="userStatu"></div>
                        @endif
			</div>
			<span class="userName">
                <a style="color:black" href="user/profil/{{$kullanici->id}}">
				<h1>{{$kullanici->name}}</h1>
                    </a>
			</span>
                @if($kullanici->user_status==0)
            <span class="invitation">
                <form id="InvitationSendAction" action="{{route('invitation')}}"  method="POST" >
                    @CSRF

                        <input type="hidden" name="name" value="{{$kullanici->name}}">
                    <input type="hidden" name="email" value="{{$kullanici->email}}">
                   <button type="submit"><img src="{{asset('frontend')}}/image/invitation.png"> </button>
                </form>

            </span>
                    @endif

		</div>

        @endforeach
	</div>
</div>
<div class="messageContanier" id="messageContanier">
	<form id="messageInsert" enctype="multipart/form-data" method="POST">
        @CSRF
		<input type="hidden" name="kullanici_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="kullanici_name" value="{{Auth::user()->name}}">
	<input type="text" name="mesaj" placeholder="Bir mesaj gönder" id="messageİnput">
        <label class="custom-file-upload">
            <input name="message_image" class="file-upload" type="file"/>
            <img src="{{asset('frontend')}}/image/add-image.png">
        </label>


        <div id="messageSend"><button  name="btn_send" type="submit" class="btnSend" id="btnSend"><img src="{{asset('frontend')}}/image/send.png"></button></div>
</form>
</div>
        <div id="imageContanier">
        <div id="imageContent">
            <img id="imageContentİmg" src="">
            <img id="close"  src="{{asset('frontend')}}/image/close.png">
        </div>
        </div>
        <script src="{{asset('frontend')}}/app/app.js"></script>
</body>
</html>
