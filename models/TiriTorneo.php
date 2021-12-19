<?php
    
    namespace app\models;
    
    use phpDocumentor\Reflection\Types\This;
    use app\models\Squadra;
    use phpDocumentor\Reflection\DocBlock\Tags\Return_;
    use Yii;
    use yii\base\Model;
    use yii\db\Query;
    use yii\data\ArrayDataProvider;
    
    
    class TiriTorneo extends Model
    {
        public $Tiri = [];
        public $Tempo;
        public $Id;
        public $Nome;
        
        public function rules()
        {
            return [
            [['Tiri', 'Tempo', 'Id','Nome'], 'safe'],
            ['Tiri', 'match', 'pattern' => '/^[1-5,]+$/', 'message' => 'Solo numeri tra 1 e 5 separati da virgole.'],
            ];
        }
        
        public static function getById($id)
        {
            $sq = Squadra::getbyId($id);
            $model = new TiriTorneo();
            $model->Id = $sq['Id'];
            $model->Tiri = $sq['TiriTorneo'];
            $model->Nome = $sq['Nome_Torneo'];
            $tiri = "";
            foreach ($model->Tiri as $item) {
                $tiri =$tiri.$item;
                $tiri = $tiri.',';
            }
            $model->Tiri = $tiri;
            $model->Tempo = $sq['TempoTorneo'];
            return $model;
        }
        
        public function Salvami()
        {
            $sq = Squadra::getbyId($this->Id);
            //var_dump($this);die();
            Yii::$app->db->createCommand("UPDATE Squadre SET TiriTorneo = :Tiri, TempoTorneo = :Tempo,Nome_Torneo = :Nome WHERE Id = :Id ")
            ->bindValue(':Id', $sq->Id)
            ->bindValue(':Tempo', $this->Tempo)
            ->bindValue(':Nome', $this->Nome)
            ->bindValue(':Tiri', serialize(explode(",",$this->Tiri)))
            ->query();
            return true;
        }
        public static function getAll()
        {
            return ['M'=>self::getBySesso(1),'F'=>self::getBySesso(0)];
            
        }
        public static function getBySesso($isM){
            $query = new Query();
            $query->select('*')->from('Squadre')->where('IsMaschile='.$isM);
            $command = $query->createCommand();
            $records = $command->queryAll();
            $tutti = [];
            foreach ($records as $r) {
                $r['PuntiTorneo'] =0;
                $r['BonusTorneo']=false;
                if(trim($r['TiriTorneo'])!=""){
                    
                    $r['TiriTorneo'] = unserialize($r['TiriTorneo']);
                    $r['TiriTorneo']=is_array($r['TiriTorneo'])?$r['TiriTorneo']:array(-1);
                    //                   echo"<pre>";var_dump($r);die();
                }
                $r['TiriTorneo']=is_array($r['TiriTorneo'])?$r['TiriTorneo']:array(-1);
                if(in_array(1,$r['TiriTorneo'])&&in_array(2,$r['TiriTorneo'])&&in_array(3,$r['TiriTorneo'])&&in_array(4,$r['TiriTorneo'])&&in_array(5,$r['TiriTorneo'])){
                    $r['PuntiTorneo']+=5;
                    $r['BonusTorneo']=true;
                }
                foreach ($r['TiriTorneo'] as $item) {
                    $r['PuntiTorneo'] += (int)$item>0?(int)$item:0;
                }
                array_push($tutti, $r);
            }
            return $tutti;// Yii::$app->db->createCommand("Select * from Gironi");
        }
    }
