<?php

namespace app\models;

use phpDocumentor\Reflection\Types\This;
use app\models\Squadra;

use phpDocumentor\Reflection\DocBlock\Tags\Return_;
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
    public $isCosa;

    public function rules()
    {
        return [
            [['Sq_A', 'Sq_B', 'Id', 'Ora', 'Campo', 'UrlVideo', 'isCosa'], 'string'],
            ['Sq_B', 'compare', 'operator' => '!==', 'compareAttribute' => 'Sq_A'],
            [['Sq_A', 'Sq_B', 'Id'], 'required'],
            [['Punti_A', 'Punti_B', 'Id'], 'integer'],
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
        $list = Array();
        foreach ($queryResult as $k) {
            $t = new Partita();
            foreach ($k as $key => $value) {
                $t[$key] = $value;
            }
            array_push($list, $t);
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


    public static function getbyId($id)
    {

        $query = new Query();
        $query->select('*')->from('Partite')->where(['Id' => $id]);
        $command = $query->createCommand();
        $partita = $command->queryOne();
        $model = new Partita();
        $model->Id = -1;
        if ($partita) {
            foreach ($partita as $key => $value) {
                $model[$key] = $value;
            }
            $model->Squadra_A = Squadra::getbyId($model->Sq_A);
            $model->Squadra_B = Squadra::getbyId($model->Sq_B);
        }

        return $model;
    }

    public static function getGironi($isM)
    {
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => $isM]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        $gironi = [];
        foreach ($QRgironi as $gironeKey => $girone) {
            $query = new Query();
            //die();
            if ($girone['Id'] < 10) {
                $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND Partite.IsCosa like 'isGironi' AND sA.Idgirone  =" . $girone["Id"] . " order by Ora")->queryAll();
                $dataProvider = new ArrayDataProvider ([
                    'allModels' => $partite
                ]);
                $gironi[$girone['Descrizione']] = $dataProvider;
            } else if ($girone['Id'] < 50) {
                $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa FROM Partite, Squadre as sA, Squadre as sB where sA.Id = Partite.Sq_A and sB.Id = Partite.Sq_B AND Partite.IsCosa like 'isQuarti' AND sA.IdgironeQ  =" . $girone["Id"] . " order by Ora")->queryAll();
                $dataProvider = new ArrayDataProvider ([
                    'allModels' => $partite
                ]);
                $gironi[$girone['Descrizione']] = $dataProvider;
            }
            //  echo"<pre>";var_dump($partite);die();

        }
        return $gironi;
    }

    public static function getGironiA($isM)
    {
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => $isM])->orderBy('Id desc');
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        $gironi = array();
        foreach ($QRgironi as $gironeKey => $girone) {
            $query = new Query();
            if ($girone['Id'] < 10) {
                $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id,Campo, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,sA.IsMaschile as isM,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND Partite.IsCosa like 'isGironi' AND sA.Idgirone= sB.Idgirone AND sA.Idgirone  = :IdG order by Ora")->bindValue(':IdG', $girone["Id"])->queryAll();
                $gironi[$girone['Descrizione']] = $partite;
            } else if ($girone['Id'] < 50) {
                $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id,Campo, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,sA.IsMaschile as isM,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id = Partite.Sq_A and sB.Id = Partite.Sq_B AND Partite.IsCosa like 'isQuarti' AND sA.IdgironeQ= sB.IdgironeQ AND sA.IdgironeQ  = :IdG order by Ora")->bindValue(':IdG', $girone["Id"])->queryAll();
                $gironi[$girone['Descrizione']] = $partite;
            }

        }
        // echo"<pre>";var_dump(array_keys($gironi)[0]);die();

        return $gironi;
    }

    public static function getSemifinali($isM)
    {
        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isSemi'")->bindValue(':isM', $isM)->queryAll();

        $dataProvider = new ArrayDataProvider ([
            'allModels' => $partite
        ]);
        return $dataProvider;
    }


    public static function getFinaliAll()
    {
        $finali = [
            'Gironi' => Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B  AND Partite.isCosa like 'isFinale'")->queryAll(),
            '3Point shootout' => Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND Partite.isCosa like 'isF3'")->queryAll(),
            'Run & Gun' => Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND Partite.isCosa like 'isFt'")->queryAll(),
        ];
        return $finali;
    }


    public static function getSemifinaliA($isM)
    {
        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isSemi'")->bindValue(':isM', $isM)->queryAll();
        return $partite;
    }

    public static function getFinali($isM)
    {
        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A AND sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isFinale'")->bindValue(':isM', $isM)->queryAll();

        $dataProvider = new ArrayDataProvider ([
            'allModels' => $partite
        ]);
        return $dataProvider;
    }

    public static function getFinaliA($isM)
    {
        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM ,sA.IsMaschile as isM, Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A AND sB.Id =Partite.Sq_B AND sA.isMaschile = :isM AND sB.isMaschile = :isM AND Partite.isCosa like 'isFinale'")->bindValue(':isM', $isM)->queryAll();
        return $partite;
    }


    public static function getPartiteMF()
    {
        $M = ['G' => self::getGironi(1), 'S' => self::getSemifinali(1), 'F' => self::getFinali(1)];
        $F = ['G' => self::getGironi(0), 'S' => self::getSemifinali(0), 'F' => self::getFinali(0)];
        $partite = ['M' => $M, 'F' => $F];
        return $partite;
    }

    public static function getPartiteMFArray()
    {
        $M = ['G' => self::getGironiA(1), 'S' => self::getSemifinaliA(1), 'F' => self::getFinaliA(1)];
        $F = ['G' => self::getGironiA(0), 'S' => self::getSemifinaliA(0), 'F' => self::getFinaliA(0)];
        $partite = ['M' => $M, 'F' => $F];
        return $partite;
    }

    public function valida()
    {
        $squadra_A = Squadra::getbyId($this->Sq_A);
        $squadra_B = Squadra::getbyId($this->Sq_B);
        switch ($this->isCosa) {
            case 'isGironi':
                {
                    return ($squadra_A->IsMaschile == $squadra_B->IsMaschile) && ($squadra_A->Idgirone == $squadra_B->Idgirone);
                }
            case 'isQuarti':
                {
                    return ($squadra_A->IsMaschile == $squadra_B->IsMaschile) && ($squadra_A->IdgironeQ == $squadra_B->IdgironeQ);
                }
            case 'isSemi':
                {
                    return ($squadra_A->IsMaschile == $squadra_B->IsMaschile);
                }
            case 'isFinale':
                {
                    return ($squadra_A->IsMaschile == $squadra_B->IsMaschile);
                }
        }
    }

    public static function getpartitaOra()
    {
        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = sB.isMaschile AND Partite.Ora >= ADDTIME(NOW(), '-0 0:15:0.000000') Order by Partite.Ora and Partite.Ora < ADDTIME(NOW(), '0 1:0:0.000000')")->queryOne();
//        if(!is_array($partite)){
//            $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = sB.isMaschile AND Partite.Ora >= ADDTIME(NOW(), '-0 0:-30:0.000000') and Partite.Ora ")->queryAll();
//        }
        return $partite;
    }

    public static function getpartiteOra()
    {
        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B,Punti_A,Punti_B,Ora,Partite.Id, sA.IsMaschile as sAisM,sA.IsMaschile as isM, sB.IsMaschile as sBisM , Partite.isCosa as Cosa, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Campo,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND Partite.Ora >= ADDTIME(NOW(), '-0 0:14:0.000000') Order by Partite.Ora limit 4")->queryAll();//and Partite.Ora < ADDTIME(NOW(), '0 1:0:0.000000')

        return $partite;
    }

    public static function ConHs()
    {
        return Yii::$app->db->createCommand("SELECT Partite.Id,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id =Partite.Sq_B AND sA.isMaschile = sB.isMaschile AND Partite.UrlVideo != '' Limit 5")->queryAll();

    }

    public function salva()
    {
        if ($this->validate() && $this->valida()) {
            // echo'<pre>';var_dump($this);die();

            switch ($this->isCosa) {
                case 'isGironi':
                    {
                        if ($this->Id == -1) {
                            //Nuova Partita
                            //Prendo TUtto
                            $squadra_A = Squadra::getbyId($this->Sq_A);
                            $squadra_B = Squadra::getbyId($this->Sq_B);
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
//                            echo "<pre>";
//                            var_dump($squadra_A);
//                            die();
                            //echo"<pre>";var_dump($model);die();
                            Yii::$app->db->createCommand("INSERT INTO Partite (Sq_A,Sq_B,Ora,Campo,UrlVideo,Punti_A,Punti_B,isCosa) VALUES (:Sq_A,:Sq_B,:Ora,:Campo,:UrlVideo,:Punti_A,:Punti_B,:isCosa)")
                                //->bindValue(':Id', $model->Id)
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->query();

                        } else {
                            //Prendo TUtto
                            $partita = self::getbyId($this->Id);
                            $squadra_A = Squadra::getbyId($partita->Sq_A);
                            $squadra_B = Squadra::getbyId($partita->Sq_B);

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


//                            $squadra_A->Punti -= $partita->Punti_A == $partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 3 : 0);
                            $squadra_A->Punti += $this->Punti_A == $this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 3 : 0);
//
//                            $squadra_B->Punti -= $partita->Punti_A == $partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 0 : 3);
                            $squadra_B->Punti += $this->Punti_A == $this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 0 : 3);


                            //Salvo Il Tutto
                            $squadra_A->Salva();
                            $squadra_B->Salva();

                            //Salvo La Partita
                            Yii::$app->db->createCommand("UPDATE Partite SET Punti_A = :Punti_A, Punti_B = :Punti_B, Sq_A = :Sq_A, Sq_B = :Sq_B, Ora = :Ora, Campo = :Campo, UrlVideo = :UrlVideo, isCosa = :isCosa WHERE Id=:Id")
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->bindValue(':Id', $this->Id)
                                ->query();
                        }
                    }
                    break;
                case 'isQuarti':
                    {
                        if ($this->Id == -1) {
                            //Nuova Partita
                            //Prendo TUtto
                            $squadra_A = Squadra::getbyId($this->Sq_A);
                            $squadra_B = Squadra::getbyId($this->Sq_B);
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
                            Yii::$app->db->createCommand("INSERT INTO Partite (Sq_A,Sq_B,Ora,Campo,UrlVideo,Punti_A,Punti_B,isCosa) VALUES (:Sq_A,:Sq_B,:Ora,:Campo,:UrlVideo,:Punti_A,:Punti_B,:isCosa)")
                                //->bindValue(':Id', $model->Id)
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->query();
                            //  echo"<pre>";var_dump($squadra_A);die();

                        } else {
                            //Prendo TUtto
                            $partita = self::getbyId($this->Id);
                            $squadra_A = Squadra::getbyId($partita->Sq_A);
                            $squadra_B = Squadra::getbyId($partita->Sq_B);

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

                            // $squadra_A->PuntiQ -= $partita->Punti_A == $partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 3 : 0);
                            $squadra_A->PuntiQ += $this->Punti_A == $this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 3 : 0);

                            // $squadra_B->PuntiQ -= $partita->Punti_A == $partita->Punti_B ? 1 : ($partita->Punti_A > $partita->Punti_B ? 0 : 3);
                            $squadra_B->PuntiQ += $this->Punti_A == $this->Punti_B ? 1 : ($this->Punti_A > $this->Punti_B ? 0 : 3);


                            //Salvo Il Tutto
                            $squadra_A->Salva();
                            $squadra_B->Salva();

                            //Salvo La Partita
                            Yii::$app->db->createCommand("UPDATE Partite SET Punti_A = :Punti_A, Punti_B = :Punti_B, Sq_A = :Sq_A, Sq_B = :Sq_B, Ora = :Ora, Campo = :Campo, UrlVideo = :UrlVideo, isCosa = :isCosa WHERE Id=:Id")
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->bindValue(':Id', $this->Id)
                                ->query();
                        }
                    }
                    break;
                case 'isSemi':
                    {
                        if ($this->Id == -1) {

                            Yii::$app->db->createCommand("INSERT INTO Partite (Sq_A,Sq_B,Ora,Campo,UrlVideo,Punti_A,Punti_B,isCosa) VALUES (:Sq_A,:Sq_B,:Ora,:Campo,:UrlVideo,:Punti_A,:Punti_B,:isCosa)")
                                //->bindValue(':Id', $model->Id)
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->query();
                        } else {
                            //Salvo La Partita
                            Yii::$app->db->createCommand("UPDATE Partite SET Punti_A = :Punti_A, Punti_B = :Punti_B, Sq_A = :Sq_A, Sq_B = :Sq_B, Ora = :Ora, Campo = :Campo, UrlVideo = :UrlVideo, isCosa = :isCosa WHERE Id=:Id")
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->bindValue(':Id', $this->Id)
                                ->query();
                        }
                    }
                    break;
                case 'isFinale':
                    {
                        if ($this->Id == -1) {

                            Yii::$app->db->createCommand("INSERT INTO Partite (Sq_A,Sq_B,Ora,Campo,UrlVideo,Punti_A,Punti_B,isCosa) VALUES (:Sq_A,:Sq_B,:Ora,:Campo,:UrlVideo,:Punti_A,:Punti_B,:isCosa)")
                                //->bindValue(':Id', $model->Id)
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->query();
                        } else {
                            //Salvo La Partita
                            Yii::$app->db->createCommand("UPDATE Partite SET Punti_A = :Punti_A, Punti_B = :Punti_B, Sq_A = :Sq_A, Sq_B = :Sq_B, Ora = :Ora, Campo = :Campo, UrlVideo = :UrlVideo, isCosa = :isCosa WHERE Id=:Id")
                                ->bindValue(':Punti_A', $this->Punti_A)
                                ->bindValue(':Punti_B', $this->Punti_B)
                                ->bindValue(':Sq_A', $this->Sq_A)
                                ->bindValue(':Sq_B', $this->Sq_B)
                                ->bindValue(':Ora', $this->Ora)
                                ->bindValue(':Campo', $this->Campo)
                                ->bindValue(':UrlVideo', $this->UrlVideo)
                                ->bindValue(':isCosa', $this->isCosa)
                                ->bindValue(':Id', $this->Id)
                                ->query();
                        }
                    }
                    break;
            }
            return true;
        }

        return false;
    }


}
