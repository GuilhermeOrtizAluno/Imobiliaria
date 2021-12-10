<?php

    session_start();

    require __DIR__ . "/vendor/autoload.php";

    use CoffeeCode\Router\Router;

    $router = new Router(ROOT);

    /*
    * APP
    * www
    */
    $router->namespace("Source\App\www");

    /*
    * WEB
    */
    $router->group("entrar");
    $router->get("/", "Web:login");
    $router->post("/", "Web:signIn");

    $router->group("registrar");
    $router->get("/", "Web:register");
    $router->post("/", "Web:postRegister");

    $router->group(null);
    $router->get("/sair", "Web:signOut");

    /*
    * APP
    * Admin
    */
    $router->namespace("Source\App\Admin");

    /*
    * home
    */
    $router->group(null);
    $router->get("/", "Admin:home");

    /*
    * immovable
    */
    $router->group("imovel");
    $router->get("/", "ImmovableController:list");
    $router->get("/criar", "ImmovableController:create");
    $router->post("/criar", "ImmovableController:post");
    $router->get("/editar", "ImmovableController:update");
    $router->put("/editar", "ImmovableController:put");
    $router->delete("/", "ImmovableController:delete");
    
    /*
    * type
    */
    $router->group("tipo");
    $router->get("/", "TypeController:list");
    $router->post("/", "TypeController:post");
    $router->delete("/", "TypeController:delete");

    /*
    * city
    */
    $router->group("cidade");
    $router->get("/", "CityController:list");
    $router->post("/", "CityController:post");
    $router->delete("/", "CityController:delete");

    /*
    * cidade
    */
    $router->group("bairro");
    $router->get("/", "DistrictController:list");
    $router->post("/", "DistrictController:post");
    $router->delete("/", "DistrictController:delete");

    /*
    * user
    */
    $router->group("usuario");
    $router->get("/", "UserController:list");
    $router->get("/criar", "UserController:create");
    $router->post("/criar", "UserController:post");
    $router->get("/editar", "UserController:update");
    $router->put("/editar", "UserController:put");
    $router->delete("/", "UserController:delete");

    /*
    * profile
    */
    $router->group("perfil");
    $router->get("/", "ProfileController:list");

    /*
    * settings
    */
    $router->group("configuracao");
    $router->get("/", "SettingsController:list");

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

