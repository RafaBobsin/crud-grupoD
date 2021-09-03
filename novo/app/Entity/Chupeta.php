<?php

    namespace App\Entity;

    use \App\Db\Database;
    use \PDO;

    class Chupeta{

        /** @var integer */
        public $id;

        /** @var string */
        public $marca;

        /** @var string */
        public $tamanho;

        /** @var string */
        public $cor;

        /** @var string */
        public $estampa;

        /** @var string */
        public $material;

        /** @var double */
        public $valor;

        /** @return boolean */
        public function cadastrar(){
            $obDatabase = new Database('produto');
            $this->id = $obDatabase->insert([
                'marca'    => $this->marca,
                'tamanho'  => $this->tamanho,
                'cor'      => $this->cor,
                'estampa'  => $this->estampa,
                'material' => $this->material,
                'valor'    => $this->valor
            ]);

            return true;
        }

        /** @return boolean */
        public function atualizar(){
            return (new Database('produto'))->update('id_produto = '.$this->id,[
                'marca'    => $this->marca,
                'tamanho'  => $this->tamanho,
                'cor'      => $this->cor,
                'estampa'  => $this->estampa,
                'material' => $this->material,
                'valor'    => $this->valor
            ]);
        }

        /** @return boolean */
        public function excluir(){
            return (new Database('produto'))->delete('id_produto = '.$this->id);
        }

        /**
         * @param  string $where
         * @param  string $order
         * @param  string $limit
         * @return array
         */
        public static function getChupetas($where = null, $order = null, $limit = null){
            return (new Database('produto'))->select($where,$order,$limit)
                ->fetchAll(PDO::FETCH_CLASS,self::class);
        }

        /**
         * @param  integer $id
         * @return Vaga
         */
        public static function getChupeta($id){
            return (new Database('produto'))->select('id_produto = '.$id)
                ->fetchObject(self::class);
        }

    }