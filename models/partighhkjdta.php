<?php

namespace app\models;

use phpDocumentor\Reflection\Types\This;
use app\models\Squadra;
use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\data\ArrayDataProvider;


class Partita extends Model
{
    public $Sq_A;
    public $Sq_B;
    public $Squadra_A;
    public $Squadra_B;
    public $Id;
    public $Punti_A;
    public $Punti_B;
    public $Campo;
    public $Ora;
    public $UrlVideo;
    public $Idgirone;
    public $isQuarti;

    public function rules()
    {
        return [
            [['Sq_A','Sq_B','Id','Ora','Campo','UrlVideo','isQuarti'],'string'],
            [['Sq_A', 'Sq_B', 'Id'], 'required'],
            [['Punti_A','Punti_B'],'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'Sq_A' => 'Prima Squadra',
            'Sq_B' => 'Seconda Squadra',
        ];
    }
    public static function getAll()
    {
        $queryResult = Partita::getQueryAll();
        $list=Array();
        foreach ($queryResult as $k) {
            $t=new Partita();
            foreach ($k as $key => $value) {
                $t[$key] = $value;
            }
            array_push($list,$t);
        }        
        return $list;
    }
    public static function getQueryAll()
    {
        $query = new Query();
        $query->select('*')->from('Partite');
        $command = $query->createCommand();
        $records = $command->queryAll();
        return $records;// Yii::$app->db->createCommand("Select * from Gironi");
    }


    public static function getbyId($id){

        $query = new Query();
        $query->select('*')->from('Partite')->where(['Id'=>$id]);
        $command = $query->createCommand();
        $partita = $command->queryOne();
        $model= new Partita();
        $model->Id=-1;
        foreach ($partita as $key => $value) {
            $model[$key]=$value;
        }

        $model->Squadra_A = Squadra::getbyId($model->Sq_A);
        $model->Squadra_B = Squadra::getbyId($model->Sq_B);
        return $model;
    }
    public static function getMaschili(){
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile'=>1]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        $gironi=[];
        foreach ($QRgironi as $gironeKey => $girone) 
        {
            $query = new Query();
            $query->select('sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id')->from('Partite, Squadre as sA, Squadre as sB')->where(["sA.Id"=> "Partite.Sq_A","sB.Id" => "Partite.Sq_B", "sA.Idgirone" => $girone["Id"]]);
            $command = $query->createCommand();
            $partite=$command->queryAll();
            //die();
            if($girone['Id']<10) {
                $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.Idgirone  =" . $girone["Id"])->queryAll();
                $dataProvider = new ArrayDataProvider ([
                    'allModels' => $partite
                ]);
            }
            else{
                $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id FROM Partite, Squadre as sA, Squadre as sB where sA.Id = Partite.Sq_A and sB.Id = Partite.Sq_B AND sA.IdgironeQ  =" . $girone["Id"])->queryAll();
                $dataProvider = new ArrayDataProvider ([
                    'allModels' => $partite
                ]);
            }
            $gironi[$girone['Descrizione']]=$dataProvider;
        }
        return $gironi;
    }
    public static function getFemminili(){
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile'=>0]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        $gironi=[];
        foreach ($QRgironi as $gironeKey => $girone) 
        {
            $query = new Query();
            $query->select('sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id')->from('Partite, Squadre as sA, Squadre as sB')->where(["sA.Id"=> "Partite.Sq_A","sB.Id" => "Partite.Sq_B", "sA.Idgirone" => $girone["Id"]]);
            $command = $query->createCommand();
            $partite=$command->queryAll();
            $partite=Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.Idgirone =".$girone["Id"])->queryAll();
            $dataProvider = new ArrayDataProvider ([
                'allModels' => $partite
                ]);
            $gironi[$girone['Descrizione']]=$dataProvider;
        }
        return $gironi;
    }
    public static function getSemifinali(){
        $gironi=[];
        $gironi['M'][1]["Sq_A"] = Yii::$app->db->createCommand("SELECT * FROM Squadre WHERE Idgirone = 1  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc")->queryOne();
        $gironi['M'][1]["Sq_B"] = Yii::$app->db->createCommand("SELECT * FROM Squadre WHERE Idgirone = 2  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc")->queryOne();

        return $gironi;
    }



    public function salva(){
        if($this->validate()){
            //Esistente
            //var_dump($this->isQuarti);die();
            if($this->isQuarti=="1"){
                if($this->Id==-1){
                    //Nuova Partita
                    //Prendo TUtto
                    $squadra_A=Squadra::getbyId($this->Sq_A);
                    $squadra_B=Squadra::getbyId($this->Sq_B);
                    //Aggiorno I PuntiFatti
                    $squadra_A->PuntifattiQ += $this->Punti_A;
                    $squadra_B->PuntifattiQ += $this->Punti_B;
                    //Aggiorno I PuntiSubiti
                    $squadra_A->PuntisubitiQ += $this->Punti_B;
                    $squadra_B->PuntisubitiQ += $this->Punti_A;
                    //Aggiorno IL Punteggio della classifica
                    $squadra_A->PuntiQ += $this->Punti_A > $this->Punti_B ? 3 : $this->Punti_A == $this->Punti_B ? 1 : 0;
                    $squadra_B->PuntiQ += $this->Punti_A > $this->Punti_B ? 0 : $this->Punti_A == $this->Punti_B ? 1 : 3;
                    //Salvo Il Tutto
                    $squadra_A->Salva();
                    $squadra_B->Salva();
                    //Salvo La Partita

                    //echo"<pre>";var_dump($model);die();
                    Yii::$app->db->createCommand("INSERT INTO Partite (Sq_A,Sq_B,Ora,Campo,UrlVideo,Punti_A,Punti_B) VALUES (:Sq_A,:Sq_B,:Ora,:Campo,:UrlVideo,:Punti_A,:Punti_B)")
                        //->bindValue(':Id', $model->Id)
                        ->bindValue(':Punti_A', $this->Punti_A)
                        ->bindValue(':Punti_B', $this->Punti_B)
                        ->bindValue(':Sq_A', $this->Sq_A)
                        ->bindValue(':Sq_B', $this->Sq_B)
                        ->bindValue(':Ora', $this->Ora)
                        ->bindValue(':Campo', $this->Campo)
                        ->bindValue(':UrlVideo', $this->UrlVideo)
                        ->query();
                  //  echo"<pre>";var_dump($squadra_A);die();

                }else {
                    //Prendo TUtto
                    $partita=self::getbyId($this->Id);
                    $squadra_A=Squadra::getbyId($partita->Sq_A);
                    $squadra_B=Squadra::getbyId($partita->Sq_B);

                    //Aggiorno I PuntiFatti
                    $squadra_A->PuntifattiQ -= $partita->Punti_A;
                    $squadra_B->PuntifattiQ -= $partita->Punti_B;
                    $squadra_A->PuntifattiQ += $this->Punti_A;
                    $squadra_B->PuntifattiQ += $this->Punti_B;

                    //Aggiorno I PuntiSubiti
                    $squadra_A->PuntisubitiQ -= $partita->Punti_B;
                    $squadra_B->PuntisubitiQ -= $partita->Punti_A;
                    $squadra_A->PuntisubitiQ += $this->Punti_B;
                    $squadra_B->PuntisubitiQ += $this->Punti_A;

                    //Aggiorno IL Punteggio della classifica


                    $squadra_A->PuntiQ -= $partita->Punti_A==$partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 3 : 0);
                    $squadra_A->PuntiQ += $this->Punti_A==$this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 3 : 0);

                    $squadra_B->PuntiQ -= $partita->Punti_A==$partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 0 : 3);
                    $squadra_B->PuntiQ += $this->Punti_A==$this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 0 : 3);





                    //Salvo Il Tutto
                    $squadra_A->Salva();
                    $squadra_B->Salva();

                    //Salvo La Partita
                    Yii::$app->db->createCommand("UPDATE Partite SET Punti_A= :column1, Punti_B= :column2 WHERE Id=:Id")
                        ->bindValue(':Id', $this->Id)
                        ->bindValue(':column1', $this->Punti_A)
                        ->bindValue(':column2', $this->Punti_B)
                        ->query();
                }
            }
            else{
                if($this->Id==-1){

                    //Nuova Partita
                    //Prendo TUtto
                    $squadra_A=Squadra::getbyId($this->Sq_A);
                    $squadra_B=Squadra::getbyId($this->Sq_B);
                    //Aggiorno I PuntiFatti
                    $squadra_A->Puntifatti += $this->Punti_A;
                    $squadra_B->Puntifatti += $this->Punti_B;
                    //Aggiorno I PuntiSubiti
                    $squadra_A->Puntisubiti += $this->Punti_B;
                    $squadra_B->Puntisubiti += $this->Punti_A;
                    //Aggiorno IL Punteggio della classifica
                    $squadra_A->Punti += $this->Punti_A > $this->Punti_B ? 3 : $this->Punti_A == $this->Punti_B ? 1 : 0;
                    $squadra_B->Punti += $this->Punti_A > $this->Punti_B ? 0 : $this->Punti_A == $this->Punti_B ? 1 : 3;
                    //Salvo Il Tutto
                    $squadra_A->Salva();
                    $squadra_B->Salva();
                    //Salvo La Partita

                    //echo"<pre>";var_dump($model);die();
                    Yii::$app->db->createCommand("INSERT INTO Partite (Sq_A,Sq_B,Ora,Campo,UrlVideo,Punti_A,Punti_B) VALUES (:Sq_A,:Sq_B,:Ora,:Campo,:UrlVideo,:Punti_A,:Punti_B)")
                        //->bindValue(':Id', $model->Id)
                        ->bindValue(':Punti_A', $this->Punti_A)
                        ->bindValue(':Punti_B', $this->Punti_B)
                        ->bindValue(':Sq_A', $this->Sq_A)
                        ->bindValue(':Sq_B', $this->Sq_B)
                        ->bindValue(':Ora', $this->Ora)
                        ->bindValue(':Campo', $this->Campo)
                        ->bindValue(':UrlVideo', $this->UrlVideo)
                        ->query();


                }else {
                    //Prendo TUtto
                    $partita=self::getbyId($this->Id);
                    $squadra_A=Squadra::getbyId($partita->Sq_A);
                    $squadra_B=Squadra::getbyId($partita->Sq_B);

                    //Aggiorno I PuntiFatti
                    $squadra_A->Puntifatti -= $partita->Punti_A;
                    $squadra_B->Puntifatti -= $partita->Punti_B;
                    $squadra_A->Puntifatti += $this->Punti_A;
                    $squadra_B->Puntifatti += $this->Punti_B;

                    //Aggiorno I PuntiSubiti
                    $squadra_A->Puntisubiti -= $partita->Punti_B;
                    $squadra_B->Puntisubiti -= $partita->Punti_A;
                    $squadra_A->Puntisubiti += $this->Punti_B;
                    $squadra_B->Puntisubiti += $this->Punti_A;

                    //Aggiorno IL Punteggio della classifica


                    $squadra_A->Punti -= $partita->Punti_A==$partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 3 : 0);
                    $squadra_A->Punti += $this->Punti_A==$this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 3 : 0);

                    $squadra_B->Punti -= $partita->Punti_A==$partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 0 : 3);
                    $squadra_B->Punti += $this->Punti_A==$this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 0 : 3);





                    //Salvo Il Tutto
                    $squadra_A->Salva();
                    $squadra_B->Salva();

                    //Salvo La Partita
                    Yii::$app->db->createCommand("UPDATE Partite SET Punti_A= :column1, Punti_B= :column2 WHERE Id=:Id")
                        ->bindValue(':Id', $this->Id)
                        ->bindValue(':column1', $this->Punti_A)
                        ->bindValue(':column2', $this->Punti_B)
                        ->query();
                }
            }
        }
              //  var_dump($model);die();
    }

    
}