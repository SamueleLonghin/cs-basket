<?php
    
    namespace app\models;
    
    use phpDocumentor\Reflection\Types\This;
    use app\models\Squadra;
    use phpDocumentor\Reflection\DocBlock\Tags\Return_;
    use Yii;
    use yii\base\Model;
    use yii\db\Query;
    use yii\data\ArrayDataProvider;
    
    
    class Tiri extends Model
    {
        public $Tiri = [];
        public $Tempo;
        public $Id;
        public $Nome;
        
        public function rules()
        {
            return [
            [['Tiri', 'Tempo', 'Id','Nome'], 'safe'],
            ];
        }
        
        public static function getById($id)
        {
            $sq = Squadra::getbyId($id);
            $model = new Tiri();
            $model->Id = $sq['Id'];
            $model->Tiri = $sq['Tiri3Shot'];
            $model->Tempo = $sq['Tempo3Shot'];
            $model->Nome = $sq['Nome_3S'];
            return $model;
        }
        
        public function Salvami()
        {
            $sq = Squadra::getbyId($this->Id);
            Yii::$app->db->createCommand("UPDATE Squadre SET Tiri3Shot = :Tiri, Tempo3Shot = :Tempo, Nome_3S = :Nome WHERE Id = :Id ")
            ->bindValue(':Id', $sq->Id)
            ->bindValue(':Tempo', $this->Tempo)
            ->bindValue(':Tiri', serialize($this->Tiri))
            ->bindValue(':Nome', $this->Nome)
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
                $r['Punti3'] = 0;
                
                if(trim($r['Tiri3Shot'])){
                    $r['Tiri3Shot'] = unserialize($r['Tiri3Shot']);
                    $r['Tiri3Shot']=is_array($r['Tiri3Shot'])?$r['Tiri3Shot']:array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
                    foreach ($r['Tiri3Shot'] as $item) {
                        $r['Punti3'] += (int)$item;
                    }
                }
                if(trim($r['TiriTorneo'])){
                    $r['TiriTorneo'] = unserialize($r['TiriTorneo']);
                    $r['TiriTorneo']=is_array($r['TiriTorneo'])?$r['TiriTorneo']:array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
                }
                array_push($tutti, $r);
            }
            return $tutti;// Yii::$app->db->createCommand("Select * from Gironi");
        }
    }
