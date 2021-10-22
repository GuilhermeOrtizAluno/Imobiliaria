<?php

    session_start();

    require __DIR__ . "/vendor/autoload.php";

    use CoffeeCode\Router\Router;

    $router = new Router(ROOT);

    /*
    * APP
    */
    $router->namespace("Source\App");

    /*
    * WEB
    */
    $router->group("entrar");
    $router->get("/", "Web:login");
    $router->post("/", "Web:signIn");

    /*
    * ADMIN
    */

    /*
    * home
    */
    $router->group(null);
    $router->get("/", "Admin:home");
    $router->get("/sair", "Web:signOut");

    /*
    * immovable
    */
    $router->group("imovel");
    $router->get("/", "Admin:immovable");
    $router->get("/criar", "Admin:immovableCreate");
    $router->post("/criar", "Admin:immovablePost");
    $router->get("/editar", "Admin:immovableUpdate");
    $router->put("/editar", "Admin:immovablePut");
    $router->delete("/", "Admin:immovableDelete");
    
    /*
    * type
    */
    $router->group("tipo");
    $router->get("/", "Admin:type");

    /*
    * city
    */
    $router->group("cidade");
    $router->get("/", "Admin:city");

    /*
    * cidade
    */
    $router->group("bairro");
    $router->get("/", "Admin:district");

    /*
    * user
    */
    $router->group("usuario");
    $router->get("/", "Admin:user");
    $router->get("/criar", "Admin:userCreate");
    $router->post("/criar", "Admin:userPost");
    $router->get("/editar", "Admin:userUpdate");
    $router->put("/editar", "Admin:userPut");
    $router->delete("/", "Admin:userDelete");

    /*
    * profile
    */
    $router->group("perfil");
    $router->get("/", "Admin:profile");

    /*
    * settings
    */
    $router->group("configuracao");
    $router->get("/", "Admin:settings");

    /*
    * ERROR
    */
    $router->group("ops");
    $router->get("/{errcode}", "Admin:error");

    /*
    * PROCESS
    */
    $router->dispatch();

    if($router->error()){
        $router->redirect("/ops/{$router->error()}");
    }

