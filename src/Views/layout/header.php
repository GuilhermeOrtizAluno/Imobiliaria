<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#303030">
    <meta name="msapplication-navbutton-color" content="#303030">
    <meta name="apple-mobile-web-app-status-bar-style" content="#303030">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url("assets/_css/style.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/bootstrap.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/colors.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/sm.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/md.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/lg.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/xl.css")?>">
    <link rel="stylesheet" href="<?= url("assets/_css/font.css")?>">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-home fa-2x text-center"></i>
                    <a href="<?= url() ?>" class="col-9 d-flex align-items-center">Inicial</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-hotel fa-2x text-center"></i>
                    <a href="<?= url("imovel") ?>" class="col-9 d-flex align-items-center">Imovel</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-clipboard-list fa-2x text-center"></i>
                    <a href="<?= url("tipo") ?>" class="col-9 d-flex align-items-center">Tipo</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-city fa-2x text-center"></i>
                    <a href="<?= url("cidade") ?>" class="col-9 d-flex align-items-center">Cidade</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-expand fa-2x text-center"></i>
                    <a href="<?= url("bairro") ?>" class="col-9 d-flex align-items-center">Bairro</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-users fa-2x text-center"></i>
                    <a href="<?= url("usuario") ?>" class="col-9 d-flex align-items-center">Usuario</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-user fa-2x text-center"></i>
                    <a href="<?= url("perfil") ?>" class="col-9 d-flex align-items-center">Perfil</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-cog fa-2x text-center"></i>
                    <a href="<?= url("configuracao") ?>" class="col-9 d-flex align-items-center">Configuração</a>
                </li>
                <li class="row text-white p-2 m-0">
                    <i class="col-3 fas fa-sign-out-alt fa-2x text-center"></i>
                    <a href="<?= url("sair") ?>" class="col-9 d-flex align-items-center">Sair</a>
                </li>
            </ul>
        </nav> 
        <footer class="d-flex justify-content-center align-items-center">
            <p class="m-0 text-white">Copyright ©️ 2021</p>
        </footer>
    </header>