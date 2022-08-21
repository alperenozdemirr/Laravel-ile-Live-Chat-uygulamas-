
function dataLive(){
    let veri = $('#veri');
    $.post(ajax_url, {_token: token}, function(response){
        $.each(response,function (key,sohbet){
            veri.append('<li>'+sohbet.mesaj_icerik+'</li>');
        });

    }, 'json');
}
$(document).ready(function(){





//setInterval(dataLive,1000);
});
