<?php

    namespace Source\App;

    use League\Plates\Engine;
    use Source\Models\Immovable;
    use Source\Models\User;
    use Source\Models\Type;
    use Source\Models\City;
    use Source\Models\District;
    use Source\Models\Address;

    use CoffeeCode\DataLayer\Connect;

    class Admin
    {
        private $view;

        public function __construct()
        {
            $this->view = Engine::create( __DIR__ . "/../../src/views", "php" );

            if(!isset($_SESSION["user"]))
                header('Location: ' . url("entrar"));
            
        }

        public function home() : void
        {
            echo $this->view->render("home", [
                "title" => "Home - " . SITE,
            ]);
        }

        public function immovable() : void
        {
            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT i.id, i.referencia, t.descricao as tipo , i.venda, c.descricao as cidade, b.descricao as bairro
                FROM imoveis i
                INNER JOIN tipos t ON t.id = i.id_Tipo
                INNER JOIN enderecos e ON e.id = i.id_endereco
                INNER JOIN cidades c ON c.id = e.id_cidade
                INNER JOIN bairros b ON b.id = e.id_bairro"
            );

            $immovables = $query->fetchAll(); 

            //$imoveis = (new Immovable())->find()->fetch(true);

            echo $this->view->render("immovable/index", [
                "title" => "Imoveis - " . SITE,
                "immovables" => $immovables
            ]);
        }

        public function immovableCreate() : void
        {
            $types = (new Type())->find()->fetch(true);
            $citys = (new City())->find()->fetch(true);
            $districts = (new District())->find()->fetch(true);

            echo $this->view->render("immovable/create", [
                "title" => "Novo Imovel - " . SITE,
                "types" => $types,
                "citys" => $citys,
                "districts" => $districts
            ]);
        }

        public function immovablePost($data) : void
        {
            $address = new Address();
            $address->cep = $data['cep'];
            $address->rua = $data['rua'];
            $address->numero = $data['numero'];
            $address->id_cidade = $data['cidade'];
            $address->id_bairro = $data['bairro'];
            $address->save();

            $immovable = new Immovable();
            $immovable->referencia = $data['ref'];
            $immovable->descricao = $data['descricao'];
            $immovable->venda = $data['venda'];
            $immovable->id_tipo = $data['tipo'];
            $immovable->id_endereco = $address->id;
            $immovable->save();

            header('Location: ' . url("imovel"));
        }

        public function immovableUpdate() : void
        {
            $types = (new Type())->find()->fetch(true);
            $citys = (new City())->find()->fetch(true);
            $districts = (new District())->find()->fetch(true);
            $id = $_GET['id'];

            $bd = Connect::getInstance();
            $query = $bd->query(
                "SELECT i.referencia, t.descricao as tipo , i.venda, i.descricao, 
                        c.descricao as cidade, b.descricao as bairro, e.id as endereco , e.cep, e.rua, e.numero
                FROM imoveis i
                INNER JOIN tipos t ON t.id = i.id_Tipo
                INNER JOIN enderecos e ON e.id = i.id_endereco
                INNER JOIN cidades c ON c.id = e.id_cidade
                INNER JOIN bairros b ON b.id = e.id_bairro
                WHERE i.id = $id"
            );

            $immovable = $query->fetchAll(); 
            $immovable =  $immovable[0];

            echo $this->view->render("immovable/update", [
                "title" => "Novo Imovel - " . SITE,
                "types" => $types,
                "citys" => $citys,
                "districts" => $districts,
                "immovable" => $immovable
            ]);
        }

        public function immovablePut($data) : void
        {
            $address = (new Address())->findById($data['endereco']);
            $address->cep = $data['cep'];
            $address->rua = $data['rua'];
            $address->numero = $data['numero'];
            $address->id_cidade = $data['cidade'];
            $address->id_bairro = $data['bairro'];
            $address->save();

            $immovable = (new immovable())->findById($data['id']);
            $immovable->referencia = $data['ref'];
            $immovable->descricao = $data['descricao'];
            $immovable->venda = $data['venda'];
            $immovable->id_tipo = $data['tipo'];
            $immovable->id_endereco = $address->id;
            $immovable->save();

            header('Location: ' . url("imovel"));
        }

        public function immovableDelete($data) : void 
        {
            $immovable = (new immovable())->findById($data['id']);
            $immovable->destroy();
            header('Location: ' . url("imovel"));
        }

        public function type() : void
        {
            echo $this->view->render("type", [
                "title" => "Tipo - " . SITE,
            ]);
        }

        public function city() : void
        {
            echo $this->view->render("city", [
                "title" => "Cidade - " . SITE,
            ]);
        }

        public function district() : void
        {
            echo $this->view->render("district", [
                "title" => "Bairro - " . SITE,
            ]);
        }

        public function user() : void
        {
            $users = (new User())->find()->fetch(true);

            echo $this->view->render("user/index", [
                "title" => "Usuario - " . SITE,
                "users" => $users
            ]);
        }

        public function userCreate() : void
        {
            echo $this->view->render("user/create", [
                "title" => "Novo Usuario - " . SITE,
            ]);
        }

        public function userPost($data) : void
        {
            $user = new User();
            $user->nome = $data['name'];
            $user->sobrenome = $data['last'];
            $user->usuario = $data['user'];
            $user->email = $data['email'];
            $user->senha = password_hash($data['senha'], PASSWORD_DEFAULT);
            $user->save();

            header('Location: ' . url("usuario"));
        }

        public function userUpdate() : void
        {
            $user = (new User())->findById($_GET['id']);

            echo $this->view->render("user/update", [
                "title" => "Editar Usuario - " . SITE,
                "user" => $user
            ]);
        }

        public function userPut($data) : void
        {

            $user = (new User())->findById($data['id']);
            $user->nome = $data['name'];
            $user->sobrenome = $data['last'];
            $user->usuario = $data['user'];
            $user->email = $data['email'];
            $user->senha = password_hash($data['senha'], PASSWORD_DEFAULT);
            $user->save();

            header('Location: ' . url("usuario"));
        }

        public function userDelete($data) : void 
        {
            $immovable = (new user())->findById($data['id']);
            $immovable->destroy();
            header('Location: ' . url("usuario"));
        }

        public function profile() : void
        {
            echo $this->view->render("profile", [
                "title" => "Perfil - " . SITE,
            ]);
        }

        public function settings() : void
        {
            echo $this->view->render("settings", [
                "title" => "Configuração - " . SITE,
            ]);
        }

        public function error(array $data)  : void
        {
            echo $this->view->render("404", [
                "title" => "Error {$data['errcode']} - " . SITE,
                "error" => $data["errcode"]
            ]);
        }

    }