<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\db\Query;

class Girone extends Model
{
    public $Id;
    public $QueryResultSquadre = [];
    public $QueryResultPartite = [];
    public $Descrizione;
    public $isMaschile;


    public function rules()
    {
        return [
            // Nome, Regione, Id and IsMaschile are required
            [['Id'], 'required'],
            [['Id'], 'integer'],
        ];
    }


//    public static function getAll()
//    {
//        $queryResult = Girone::getQueryAll();
//        $list=Array();
//        foreach ($queryResult as $k) {
//            $t=new Girone();
//            foreach ($k as $key => $value) {
//                $t[$key] = $value;
//            }
//            array_push($list,$t);
//        }
//        return $list;
//    }
//    public static function getQueryAll()
//    {
//        $query = new Query();
//        $query->select('*')->from('Gironi');
//        $command = $query->createCommand();
//        $records = $command->queryAll();
//        return $records;// Yii::$app->db->createCommand("Select * from Gironi");
//    }


    public static function getSquadrebyId($id)
    {

        $query = new Query();
        $query->from('Squadre')->where(['Idgirone' => $id]);
        $command = $query->createCommand();
        $girone = $command->queryAll();
        var_dump($girone);
        die();
        return [Yii::$app->db->createCommand("Select Descrizione from Gironi where Id=:Id")->bindValue(':Id', $id)->queryOne(), $girone];
    }
//    public static function getbyIdFull($id){
//
//        $query = new Query();
//        $query->select('*')->from('Gironi')->where(['Id'=>$id]);
//        $command = $query->createCommand();
//        $girone = $command->queryOne();
//        $model= new Girone();
//        $model->Id=-1;
//        foreach ($girone as $key => $value) {
//            $model[$key]=$value;
//        }
//        $model->QueryResultPartite = Yii::$app->db->createCommand("SELECT Id,Nome,Punti,Puntifatti,Puntisubiti,Posizione FROM Squadre WHERE Idgirone =".$id."  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc")->queryAll();
//
//    }


    public static function getGironiSelect2()
    {
        $gironi = ['G' => ['Maschili' => [], 'Femminili' => []], 'Q' => ['Maschili' => [], 'Femminili' => []]];
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => 0]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        foreach ($QRgironi as $gironeKey => $girone) {
            $query = new Query();
            $query->select('sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id')->from('Partite, Squadre as sA, Squadre as sB')->where(["sA.Id" => "Partite.Sq_A", "sB.Id" => "Partite.Sq_B", "sA.Idgirone" => $girone["Id"]]);
            $command = $query->createCommand();
            $partite = $command->queryAll();
            if ($girone['Id'] < 10) {
                $gironi['G']['Femminili'][$girone['Id']] = $girone['Descrizione'];
            } else {
                $gironi['Q']['Femminili'][$girone['Id']] = $girone['Descrizione'];
            }
        }
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => 1]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        foreach ($QRgironi as $gironeKey => $girone) {
            $query = new Query();
            $query->select('sA.Nome as Nome_A, sB.Nome as Nome_B,Punti_A,Punti_B,Ora,Partite.Id')->from('Partite, Squadre as sA, Squadre as sB')->where(["sA.Id" => "Partite.Sq_A", "sB.Id" => "Partite.Sq_B", "sA.Idgirone" => $girone["Id"]]);
            $command = $query->createCommand();
            $partite = $command->queryAll();
            if ($girone['Id'] < 10) {
                $gironi['G']['Maschili'][$girone['Id']] = $girone['Descrizione'];
            } else {
                $gironi['Q']['Maschili'][$girone['Id']] = $girone['Descrizione'];
            }
        }
        return $gironi;
    }

    public static function getAll()
    {
        return ['M' => Girone::getAllByIsM(1), 'F' => Girone::getAllByIsM(0)];;
    }

    public static function getAllByIsM($isM)
    {
        $All = ['M' => [], 'F' => []];
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => $isM])->orderBy('Id');
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        $gironi = [];
        $q;
        foreach ($QRgironi as $gironeKey => $girone) {
            if ($girone['Id'] < 10) {
                $q = Yii::$app->db->createCommand("SELECT Id,Nome,Punti,Puntifatti,Puntisubiti,Posizione,LogoRegione,Regione FROM Squadre WHERE Idgirone =" . $girone["Id"] . "  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc");
            } else if ($girone['Id'] < 50) {
                $q = Yii::$app->db->createCommand("SELECT Id,Nome,PuntiQ as Punti,PuntifattiQ as Puntifatti,PuntisubitiQ as Puntisubiti,Posizione,LogoRegione,Regione FROM Squadre WHERE IdgironeQ =" . $girone["Id"] . "  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc");
            }
            $gironi[$girone['Descrizione']] = $q->queryAll();
        }
        return $gironi;
    }

    public static function getPartiteGironeById($id)
    {
        return Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Punti_A,Punti_B,Ora,Partite.Id,Partite.UrlVideo FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id = Partite.Sq_B AND ( sA.Id =" . $id . " or sB.Id = " . $id . ")")->queryAll();
    }
}