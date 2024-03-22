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
    function loadChat(){
        $.ajax({
            type: "post",
            url: "index.php/?ajax=loadChat",
            data: {idReceptor : idReceptor},
            dataType: "json"
        }).done(function(data){
            var dadosPerfilChat = Object.entries(data.dadosPerfilChat);
            dadosPerfilChat = dadosPerfilChat[0][1];

            var dadosMsgChat = Object.entries(data.dadosMsgChat);

            $('.contAvisoChat').fadeOut(100);
            setTimeout(() => {
                $('.contPerfil').fadeIn(100).css('display','flex');
                $('.contMsgs').fadeIn(100).css('display','flex');
                $('.contEnviar').fadeIn(100).css('display','flex');
    
                $('.contPerfil > span').html(dadosPerfilChat['nome']+' '+dadosPerfilChat['sobrenome']);
                $('.contPerfil > img').attr('src','views/images/perfil/'+dadosPerfilChat['foto']);
    
                $('.contMsgs').html('');
                $.each(dadosMsgChat, function (index, value) { 
                    var horario = value[1]['dia_horario'].split(' ');
                    horario = horario[1].slice(0,5);
                    var content = '<div class="msg '+value[1]['controle']+'"><div><span>'+value[1]['mensagem']+'</span><span>'+horario+'</span></div></div>';
                    $(content).prependTo('.contMsgs');
                });
                
                //mover scroll para o final do chat
                $('.contMsgs').scrollTop($('.contMsgs').prop('scrollHeight'));
            }, 100);
        });
    }
    $('.contUsers').on('click','.user',function(){
        idReceptor = parseInt($(this).attr('idUser'));
        loadChat();
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
                loadChat();
            });

            $('#enviarMsg > textarea').val('');
        }
    });
})