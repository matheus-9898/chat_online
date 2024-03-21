$(function(){
    var idReceptor = null;

    //abrir modal perfil
    $('#btProfile').click(function(){
        $('.contProfile').fadeIn(200).css('display','flex');
    })
    //fechar modal perfil
    $('.contProfile').click(function(e){
        if(e.target === this)
            $('.contProfile').fadeOut(200);
    })
    $('#btCancEditUser').click(function(e){
        e.preventDefault();
        $('.contProfile').fadeOut(200);
    })
    //pegando dados do chat para serem exibidos
    $('.contUsers').on('click','.user',function(){
        idReceptor = parseInt($(this).attr('idUser'));
        $.ajax({
            type: "get",
            url: "index.php/?ajax=loadChat",
            data: {idReceptor : idReceptor},
            dataType: "json"
        }).done(function(data){
            data = Object.entries(data.dadosChat);
            var dadosChat = data[0][1];
            $('.contAvisoChat').fadeOut(100);
            setTimeout(() => {
                $('.contPerfil').fadeIn(100).css('display','flex');
                $('.contMsgs').fadeIn(100).css('display','flex');
                $('.contEnviar').fadeIn(100).css('display','flex');
            }, 100);
            $('.contPerfil > span').html(dadosChat['nome']+' '+dadosChat['sobrenome']);
            $('.contPerfil > img').attr('src','views/images/perfil/'+dadosChat['foto']);
        });
    })
    //enviando mensagens
    $('#enviarMsg').submit(function (e) { 
        e.preventDefault();

        if(idReceptor != null){
            $.ajax({
                type: "post",
                url: "index.php/?ajax=enviarMsg",
                data: $(this).serialize()+'&'+$.param({ idReceptor : idReceptor }),
                dataType: "json"
            }).done(function(data){
                
            });

            $('#enviarMsg > textarea').val('');
        }
    });
})