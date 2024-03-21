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
})