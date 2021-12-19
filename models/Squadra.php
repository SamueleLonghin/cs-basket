<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;
use yii\data\ArrayDataProvider;


class Squadra extends Model
{
    public $Nome;
    public $Regione;
    public $Id;
    public $UrlSito;
    public $IsMaschile;
    public $UrlVideo;
    public $Descrizione;
    public $Posizione;
    public $Punti = 0;
    public $Puntifatti = 0;
    public $Puntisubiti = 0;
    public $Idgirone;
    public $PuntiQ = 0;
    public $PuntifattiQ = 0;
    public $PuntisubitiQ = 0;
    public $IdgironeQ;
    public $IdgironeS;
    public $Semifinale;
    public $Finale;
    public $LogoRegione;
    public $Tiri3Shot = array();
    public $Tempo3Shot;
    public $TiriTorneo;
    public $TempoTorneo;
    public $Nome_3S;
    public $Nome_Torneo;



    public function rules()
    {
        //todo Da completare con regione...
        return [
            [['Nome', 'Id', 'Regione', 'UrlSito', 'UrlVideo', 'Descrizione', 'Idgirone', 'IdgironeQ', 'Punti', 'Puntifatti', 'Puntisubiti', 'PuntiQ', 'PuntifattiQ', 'PuntisubitiQ'], 'safe'],
            // [['Punti','Puntifatti','Puntisubiti'],'number'],
            [['Nome', 'Regione', 'Id', 'IsMaschile'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'Nome' => 'Nome',
            'Regione' => 'Regione',
        ];
    }


    public function Salva()
    {
        if ($this->validate()) {
            //Esistente
            if ($this->Id == -1) {
                //Nuova Partitay
                Yii::$app->db->createCommand("INSERT INTO Squadre (Nome,Regione,IsMaschile,Punti,PuntiFatti,PuntiSubiti,PuntiQ,PuntiFattiQ,PuntiSubitiQ,Idgirone,IdgironeQ) VALUES (:Nome, :Regione, :IsMaschile, :Punti, :PuntiFatti, :PuntiSubiti, :PuntiQ, :PuntiFatti, :PuntiSubitiQ, :Idgirone, :IdgironeQ )")
                    ->bindValue(':Nome', $this->Nome)
                    ->bindValue(':Regione', $this->Regione)
                    ->bindValue(':IsMaschile', $this->IsMaschile)
                    ->bindValue(':Punti', $this->Punti)
                    ->bindValue(':PuntiSubiti', $this->Puntisubiti)
                    ->bindValue(':PuntiFatti', $this->Puntifatti)
                    ->bindValue(':PuntiQ', $this->PuntiQ)
                    ->bindValue(':PuntiSubitiQ', $this->PuntisubitiQ)
                    ->bindValue(':PuntiFattiQ', $this->PuntifattiQ)
                    ->bindValue(':Idgirone', $this->Idgirone)
                    ->bindValue(':IdgironeQ', $this->IdgironeQ)
                    ->query();

            } else {
                //Esistente
//                $s = Squadra::getbyId($this->Id);
//                foreach ($this as $k => $v) {
//                    if (is_null($v)) {
//                        $this[$k] = $s[$k];
//                    }
//                }

                //  var_dump($s);die();
                $s = $this;
                Yii::$app->db->createCommand("UPDATE Squadre SET Nome = :Nome,Regione = :Regione,IsMaschile = :IsMaschile,Punti = :Punti,PuntiFatti = :PuntiFatti,PuntiSubiti = :PuntiSubiti,PuntiQ = :PuntiQ,PuntifattiQ = :PuntiFattiQ, PuntisubitiQ = :PuntiSubitiQ, IdgironeQ =:IdgironeQ WHERE Id = :Id ")
                    ->bindValue(':Id', $s->Id)
                    ->bindValue(':Nome', $s->Nome)
                    ->bindValue(':Regione', $s->Regione)
                    ->bindValue(':IsMaschile', $s->IsMaschile)
                    ->bindValue(':Punti', $s->Punti)
                    ->bindValue(':PuntiSubiti', $s->Puntisubiti)
                    ->bindValue(':PuntiFatti', $s->Puntifatti)
                    ->bindValue(':PuntiQ', $s->PuntiQ)
                    ->bindValue(':PuntiSubitiQ', $s->PuntisubitiQ)
                    ->bindValue(':PuntiFattiQ', $s->PuntifattiQ)
                    ->bindValue(':IdgironeQ', $s->IdgironeQ)
                    ->query();
            }
            return true;
        }
        return false;
    }



    public static function getTutte()
    {
        $q = new Query();
        $regioni = $q->select('Regione')->from('Squadre')->distinct()->createCommand()->queryAll();
        $squadre = [];
        foreach ($regioni as $item) {
            $squadre[$item['Regione']]['M'] = $q
                ->select('*')
                ->from('Squadre')
                ->where(['Regione' => $item, 'IsMaschile' => 1])
                ->createCommand()
                ->queryOne();

            $squadre[$item['Regione']]['F'] = $q
                ->from('Squadre')
                ->where(['Regione' => $item, 'IsMaschile' => 0])
                ->createCommand()
                ->queryOne();
        }
        $query = new Query();
        $list = $query->select(['A.Nome as NA', 'B.Nome as NB', 'A.Id as IdA', 'B.Id as IdB', 'A.Regione as Regione'])
            ->from(['Squadre as A', 'Squadre as B'])
            ->where('A.Regione = B.Regione and A.Nome != B.Nome and A.IsMaschile=1 and B.IsMAschile=0')
            ->createCommand()
            ->queryAll();
        return $squadre;
    }

    public static function getQueryAll()
    {
        $query = new Query();
        $query->select('*')->from('Squadre');
        $command = $query->createCommand();
        $records = $command->queryAll();
        $tutti = [];
        foreach ($records as $r) {
            if(trim($r['Tiri3Shot']) !=""){
            $r['Tiri3Shot'] = unserialize($r['Tiri3Shot']);
                $r['Tiri3Shot'] = is_array($r['Tiri3Shot']) ? $r['Tiri3Shot'] : array(false, false, false, false, false, false, false, false, false, false);

            }
             $r['Tiri3Shot'] = is_array($r['Tiri3Shot']) ? $r['Tiri3Shot'] : array(false, false, false, false, false, false, false, false, false, false);
            if(trim($r['Tiri3Shot']) !=""){
            $r['TiriTorneo'] = unserialize($r['TiriTorneo']);
            $r['TiriTorneo'] = is_array($r['TiriTorneo']) ? $r['TiriTorneo'] : array(false, false, false, false, false, false, false, false, false, false);
            }
            $r['TiriTorneo'] = is_array($r['TiriTorneo']) ? $r['TiriTorneo'] : array(false, false, false, false, false, false, false, false, false, false);
            array_push($tutti, $r);
        }
        return $tutti;// Yii::$app->db->createCommand("Select * from Gironi");
    }


    public static function getbyId($id)
    {
        $query = new Query();
        $query->select('*')->from('Squadre')->where(['Id' => $id]);
        $command = $query->createCommand();
        $squadra = $command->queryOne();
        if (!$squadra) {
            return new Squadra();
        }
        $model = new Squadra();
        $model->Id = -1;
        foreach ($squadra as $key => $value) {
            $model[$key] = $value;
        }

        if(trim($model['Tiri3Shot'])!=""){
        $model['Tiri3Shot'] = unserialize($model['Tiri3Shot']);
            $model['Tiri3Shot'] = is_array($model['Tiri3Shot']) ? $model['Tiri3Shot'] : array(false, false, false, false, false, false, false, false, false, false);
        }
        $model['Tiri3Shot'] = is_array($model['Tiri3Shot']) ? $model['Tiri3Shot'] : array(false, false, false, false, false, false, false, false, false, false);

        if(trim($model['TiriTorneo'])!=""){
        $model['TiriTorneo'] = unserialize($model['TiriTorneo']);
        $model['TiriTorneo'] = is_array($model['TiriTorneo']) ? $model['TiriTorneo'] : array(false, false, false, false, false, false, false, false, false, false);
        }
        $model['TiriTorneo'] = is_array($model['TiriTorneo']) ? $model['TiriTorneo'] : array(false, false, false, false, false, false, false, false, false, false);

        return $model;
    }

    public static function isM($id)
    {
        $query = new Query();
        $query->select('IsMaschile')->from('Squadre')->where(['Id' => $id]);
        $command = $query->createCommand();
        return $command->queryOne()['IsMaschile'];
    }



//    public static function getPartiteSquadrabyId($id)
//    {
//        $partite = Yii::$app->db->createCommand("SELECT sA.Nome as Nome_A, sB.Nome as Nome_B, sA.Regione as Regione_A, sB.Regione as Regione_B, sA.LogoRegione as Logo_A, sB.LogoRegione as Logo_B,Punti_A,Punti_B,Ora,Partite.Id FROM Partite, Squadre as sA, Squadre as sB where sA.Id= Partite.Sq_A and sB.Id = Partite.Sq_B AND ( sA.Id =" . $id . " or sB.Id = " . $id . ")")->queryAll();
//
//        $dataProvider = new ArrayDataProvider ([
//            'allModels' => $partite
//        ]);
//        return $partite;
//    }

    public static function getSquadreSquadrabyId($id)
    {
        $squadre = Yii::$app->db->createCommand("SELECT s.Id,s.Nome,s.Punti,s.Puntifatti,s.Puntisubiti,s.Posizione,s.LogoRegione FROM Squadre as s ,Squadre as m WHERE s.Idgirone = m.Idgirone and m.Id=:Id  ORDER BY Punti desc, s.PuntiFatti-s.PuntiSubiti desc")->bindValue(':Id', $id)->queryAll();
        return $squadre;
    }

    public static function getSquadreperSelect2()
    {
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => 0]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        $gironi = array();
        foreach ($QRgironi as $gironeKey => $girone) {
//            $query = new Query();
//            $query->select('Concat(Nome,Regione) as Nome,Id')->from('Squadre')->where('Idgirone = ' . $girone['Id']);
//            $command = $query->createCommand();
//            $squadre = $command->queryAll();
            $squadre = Yii::$app->db->createCommand("SELECT Concat(Nome,' ',Regione) as Nome , Id FROM `Squadre` WHERE Idgirone = :Id ")->bindValue(':Id', $girone['Id'])->queryAll();

            foreach ($squadre as $sqKey => $sq) {
                $gironi['Femminili'][$girone['Descrizione']][$sq['Id']] = $sq['Nome'];
            }
        }
        $query = new Query();
        $query->select('*')->from('Gironi')->where(['isMaschile' => 1]);
        $command = $query->createCommand();
        $QRgironi = $command->queryAll();
        foreach ($QRgironi as $gironeKey => $girone) {
//            $query = new Query();
//            $query->select('Nome,Id')->from('Squadre')->where('Idgirone = ' . $girone['Id']);
//            $command = $query->createCommand();

            $squadre = Yii::$app->db->createCommand("SELECT Concat(Nome,' ',Regione) as Nome , Id FROM `Squadre` WHERE Idgirone = :Id ")->bindValue(':Id', $girone['Id'])->queryAll();

            foreach ($squadre as $sqKey => $sq) {
                $gironi['Maschili'][$girone['Descrizione']][$sq['Id']] = $sq['Nome'];
            }
        }
        return $gironi;
    }

    public static function sistemaTutto($isM)
    {
        $q = new Query();
        $gironi = $q->select('*')->from('Gironi')->where(['isMaschile' => $isM])->andWhere('Id < 10')->orderBy('Descrizione')->createCommand()->queryAll();
        $squadre = [];
        $azzurro = [];//1A,2B,1C,2D
        $verde = [];//2A,1B,2C,1D
        $squadreQuarti = [];
        foreach ($gironi as $gironeKey => $girone) {
            $squadre[$girone['Id']] = Yii::$app->db->createCommand("SELECT Id FROM Squadre WHERE Idgirone = :Id  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc LIMIT 2")->bindValue(':Id', $girone['Id'])->queryAll();
        }
        // if(!$isM){ echo"<pre>"; var_dump($squadre);die();}
        if (!is_array($squadre)) return;
        array_push($azzurro, $squadre[$isM ? 1 : 5][0]['Id']);
        array_push($azzurro, $squadre[$isM ? 2 : 6][1]['Id']);
        array_push($azzurro, $squadre[$isM ? 3 : 7][0]['Id']);
        array_push($azzurro, $squadre[$isM ? 4 : 8][1]['Id']);
        array_push($verde, $squadre[$isM ? 1 : 5][1]['Id']);
        array_push($verde, $squadre[$isM ? 2 : 6][0]['Id']);
        array_push($verde, $squadre[$isM ? 3 : 7][1]['Id']);
        array_push($verde, $squadre[$isM ? 4 : 8][0]['Id']);
        foreach ($azzurro as $a) {
            Yii::$app->db->createCommand("UPDATE Squadre SET IdgironeQ = :IdgironeQ WHERE Id = :Id ")
                ->bindValue(':Id', $a)
                ->bindValue(':IdgironeQ', $isM ? 10 : 11)
                ->query();
        }
        foreach ($verde as $a) {
            Yii::$app->db->createCommand("UPDATE Squadre SET IdgironeQ = :IdgironeQ WHERE Id = :Id ")
                ->bindValue(':Id', $a)
                ->bindValue(':IdgironeQ', $isM ? 20 : 21)
                ->query();
        }

        $squadreQuarti['Azzurro'] = Yii::$app->db->createCommand("SELECT Id FROM Squadre WHERE IdgironeQ = :Id  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc LIMIT 2")->bindValue(':Id', $isM ? 10 : 11)->queryAll();
        $squadreQuarti['Verde'] = Yii::$app->db->createCommand("SELECT Id FROM Squadre WHERE IdgironeQ = :Id  ORDER BY Punti desc, PuntiFatti-PuntiSubiti desc LIMIT 2")->bindValue(':Id', $isM ? 20 : 21)->queryAll();

        $semi = [];
        $semi['Prima'] = [];
        $semi['Seconda'] = [];
        // echo"<pre>"; var_dump($squadreQuarti);die();
        return;


//todo cose stane ancora da definire
        array_push($semi['Prima'], $squadreQuarti['Azzurro'][0]['Id']);
        array_push($semi['Prima'], $squadreQuarti['Verde'][1]['Id']);
        array_push($semi['Seconda'], $squadreQuarti['Azzurro'][1]['Id']);
        array_push($semi['Seconda'], $squadreQuarti['Verde'][0]['Id']);


        foreach ($semi['Prima'] as $a) {
            Yii::$app->db->createCommand("UPDATE Squadre SET IdgironeS = :IdgironeS WHERE Id = :Id ")
                ->bindValue(':Id', $a)
                ->bindValue(':IdgironeS', $isM ? 50 : 51)
                ->query();
        }
        foreach ($semi['Seconda'] as $a) {
            Yii::$app->db->createCommand("UPDATE Squadre SET IdgironeS = :IdgironeS WHERE Id = :Id ")
                ->bindValue(':Id', $a)
                ->bindValue(':IdgironeS', $isM ? 60 : 61)
                ->query();
        }
        // echo"<pre>"; var_dump($semi);die();

    }
}
