<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    function deneme(){
        alert("deneme");
    }
    </script>
    <title>AJAX</title>
</head>
<body>
        <ul id="veri">

        </ul>
    <script>
        $(function ready(){
           $.ajaxSetup({
               headers:{
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
            $("#form").on('submit',function(e) {
            $.ajax({
                type: "POST",
                url: "{{route('MessageInsert')}}",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                success: function (data){
                    if(data){
                        alert("ok");
                    }else{
                        alert("now");
                    }

                }

        });
                e.preventDefault();
            });
            /*function veriCek() {
           $.ajax({
               type: "GET",
               url: "{{route('ajaxdata')}}",
               success: function (response){

                                let veri = $('#veri');
                                veri.html('');
                                $.each(response, function (key, sohbet) {
                                    veri.html('');
                                    $.each(response, function (item, sohbet) {
                                        veri.append('<li>' + sohbet.user.name + '</li>');
                                    });
                                    veri.append('<br>');

                                });
                                console.log(response);
               }
           });
        }*/
            //setTimeout(veriCek,1000);
        });
    </script>

    <form id="form" method="POST" action="javascript:void(0);" enctype="multipart/form-data">
        <input type="text" name="kullanici_name" value="alperen">
        <input type="number" name="kullanici_id" value="5">
        <input type="text" name="mesaj">
        <input type="file" name="message_image">
        <button type="submit" >Gönder</button>
    </form>
</body>
</html>
