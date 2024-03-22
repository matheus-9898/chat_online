<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Online</title>
    <link rel="stylesheet" href="views/css/chat.css">
</head>
<body>
    <div class="contProfile">
        <form action="<?= ROOT_PATH ?>" method="post" enctype="multipart/form-data" class="centerProfile">
            <h2>Editar perfil</h2>
            <div class="fotoArea">
                <img src="views/images/perfil/<?= $_SESSION['foto'] ?>" alt="Perfil">
                <label for="foto">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(68, 134, 255)" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                </label>
                <input type="file" id="foto" name="foto">
            </div>
            <div class="inputArea">
                <input type="text" value="<?= $_SESSION['nome'] ?>" name="nome">
                <input type="text" value="<?= $_SESSION['sobrenome'] ?>" name="sobrenome">
                <input type="text" value="<?= $_SESSION['usuario'] ?>" name="usuario">
                <input type="password" placeholder="Nova senha" name="senha">
            </div>
            <div class="btArea">
                <input type="submit" value="Editar" name="editUser">
                <button id="btCancEditUser">Cancelar</button>
            </div>
        </form>
    </div>
    <header>
        <div class="centerHeader">
            <div class="btsHeader" id="btProfile">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="21" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(68, 134, 255)" d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
            </div>
            <a href="<?= ROOT_PATH ?>?logout" class="btsHeader">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="rgb(68, 134, 255)" d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
            </a>
        </div>
    </header>
    <main>
        <div class="centerMain">
            <div class="contUsers">
                <?php foreach($users as $value) {
                    if($value['id'] != $_SESSION['id']){ ?>
                    <div class="user" iduser="<?= $value['id'] ?>">
                        <img src="views/images/perfil/<?= $value['foto'] ?>" alt="Perfil" class="fotoPerfil">
                        <span><?= $value['nome'].' '. $value['sobrenome']?></span>
                    </div>
                <?php } } ?>
            </div>
            <div class="contChat">
                <div class="contAvisoChat">
                    <span>Selecione um usuário para iniciar um chat.</span>
                </div>
                <div class="contPerfil">
                    <img src="" alt="Perfil" class="fotoPerfil">
                    <span></span>
                </div>
                <div class="contMsgs">

                </div>
                <form action="<?= ROOT_PATH ?>" method="post" class="contEnviar" id="enviarMsg">
                    <textarea placeholder="Escreva sua mensagem..." name="mensagem" rows="1"></textarea>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </main>
    <script src="views/js/jquery.js"></script>
    <script src="views/js/script.js"></script>
</body>
</html>