<?php

    namespace Source\App\Admin;

    use League\Plates\Engine;
    use Source\Models\Immovable;
    use Source\Models\User;
    use Source\Models\Type;
    use Source\Models\City;
    use Source\Models\District;
    use Source\Models\Address;

    use CoffeeCode\DataLayer\Connect;

    require_once("Admin.php");

    class ImmovableController extends Admin
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function list() : void
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

            echo $this->view->render("immovable/list", [
                "title" => "Imoveis - " . SITE,
                "immovables" => $immovables
            ]);
        }

        public function create() : void
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

        public function read() : void
        {
            
        }

        public function update() : void
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

        public function delete($data) : void
        {
            $immovable = (new Immovable())->findById($data['id']);
            $immovable->destroy();
            header('Location: ' . url("imovel"));
        }

        public function post($data) : void
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

        public function put($data) : void
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
    }