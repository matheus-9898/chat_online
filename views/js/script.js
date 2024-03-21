$(function(){
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
    //pegando dados para exibir no chat
    $('.contUsers').on('click','.user',function(){
        var idUser = parseInt($(this).attr('iduser'));
        $.ajax({
            type: "post",
            url: "index.php/?ajax=loadChat",
            data: {idUser : idUser},
            dataType: "json"
        }).done(function(data){
            data = Object.entries(data.dadosUser);
            var dadosUser = data[0][1];
            $('.contPerfil > span').html(dadosUser['nome']+' '+dadosUser['sobrenome']);
            $('.contPerfil > img').attr('src','views/images/perfil/'+dadosUser['foto']);
        });
    })
})