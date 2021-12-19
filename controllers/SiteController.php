<?php

namespace app\controllers;

use app\models\TiriTorneo;
use app\models\User;
use http\Url;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Partita;
use app\models\Squadra;
use app\models\Girone;
use yii\data\ArrayDataProvider;
use app\models\Tiri;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'HomeContainer';
        //return $this->render('index');
        return $this->render('index',['hs'=> Partita::ConHs(),'partiteOra'=> Partita::getpartiteOra()]);
        return $this->render('index',['partiteOra'=> Partita::getpartiteOra()]);

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //var_dump(Yii::$app->request->post());die();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTorneetti()
    {
        return $this->render('torneetti');
    }
    //new add web-page


    public function actionClassifica()
    {
//        $valori = ['M' => Squadra::getGironi(1), 'F' => Squadra::getGironi(0)];
        return $this->render('classifica', ['query' => Girone::getAll()]);
    }

    public function actionPartite()
    {
        return $this->render('partite', ['partite' => Partita::getPartiteMF(), 'PA' => Partita::getPartiteMFArray()]);
        //return $this->redirect("index.php?r=site%2Fpartiteora#".Partita::getpartitaOra()['Id']);
    }
    public function actionPartiteora()
    {
        return $this->render('partite', ['partite' => Partita::getPartiteMF(), 'PA' => Partita::getPartiteMFArray()]);
    }
    public function actionShot3()
    {
        $sq= Tiri::getAll();
        return $this->render('p3sh', ['squadre' => $sq]);
    }
    public function actionTorneo()
    {
        $sq= TiriTorneo::getAll();
        return $this->render('pTorneo', ['squadre' => $sq]);
    }
    public function actionRegole()
    {
        return $this->render('regolamento');
    }

    public function actionClassificas()
    {
        $valori = ['M' => Squadra::getGironi(1), 'F' => Squadra::getGironi(0)];
        return $this->render('classificaS', ['query' => $valori]);
    }

    public function actionPartites()
    {
        $valori = ['M' => Partita::getGironi(1), 'F' => Partita::getGironi(0)];
        return $this->render('partites', ['query' => $valori]);
    }

    public function actionSquadre()
    {
        $squadre = Squadra::getTutte();
        return $this->render('squadre', ['squadre' => $squadre]);
    }

    public function actionSq($id)
    {
        $squadra = Squadra::getbyId($id);
        if ($squadra->validate()) {
            return $this->render('vedisquadra', ['squadra' => $squadra, 'partite' => Girone::getPartiteGironeById($id), 'squadre' => Squadra::getSquadreSquadrabyId($id)]);
        } else {
            var_dump(Yii::$app->request->referrer);
            return $this->redirect(\yii\helpers\Url::to(['site/squadre']));
        }
    }

    public function actionVedipartita($id)
    {
        $partita = Partita::getbyId($id);
        if ($partita->validate()) {
            return $this->render('vedipartita', ['partita' => $partita]);
        } else {
            return $this->redirect(\yii\helpers\Url::to(['site/partite']));
        }
    }

    public function actionCredits()
    {
        return $this->render('credits');
    }

    public function actionInseriscipartita($id = -1)
    {
        if (!User::isAdmin(Yii::$app->user)) {
            return $this->goHome();
        }


        $model = new Partita();
        $model->Id = $id;
        $model = $id == -1 ? $model : Partita::getbyId($id);

        //Caso di invio del form

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->salva()) {
            return $this->redirect(\yii\helpers\Url::to(['site/partite']));
        }
        $squadre = Squadra::getSquadreperSelect2();
        //Caso di richiesta della pagina
        return $this->render('inseriscipartita', [
            'model' => $model, 'squadre' => $squadre
        ]);
    }

    public function actionGironi()
    {
        if (!User::isAdmin(Yii::$app->user)) {
            return $this->goHome();
        }

        Squadra::sistemaTutto(1);
        Squadra::sistemaTutto(0);

        return $this->render('index');
    }

    public function actionInseriscisquadra($id = -1)
    {
        if (!User::isAdmin(Yii::$app->user)) {
            return $this->goHome();
        }
        $model = new Squadra();
        $model->Id = $id;
        $model = $id == -1 ? $model : Squadra::getbyId($id);
        //Caso di invio del form
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->salva()) {
            return $this->goBack();
        }
        //Caso di richiesta della pagina
        return $this->render('is', [
            'model' => $model, 'gironi' => Girone::getGironiSelect2(), 'squadre' => Squadra::getSquadreperSelect2()
        ]);
    }

    public function actionInserisci3shot($id)
    {
        if (!User::isAdmin(Yii::$app->user)) {
            return $this->goHome();
        }
        $model = new Tiri();
        $model->Id = $id;
        $model = $id == -1 ? $model : Tiri::getbyId($id);
        //Caso di invio del form

//        var_dump($model);die();
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->Salvami()) {


            return $this->goBack();
        }

        //Caso di richiesta della pagina
        return $this->render('conf3sh', ['model' => $model]);
    }
    public function actionInseriscitorneo($id)
    {
        if (!User::isAdmin(Yii::$app->user)) {
            return $this->goHome();
        }
        $model = new TiriTorneo();
        $model->Id = $id;
        $model = $id == -1 ? $model : TiriTorneo::getbyId($id);
        //Caso di invio del form

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->Salvami()) {
            //var_dump($model);die();


            return $this->goBack();
        }

        //Caso di richiesta della pagina
        return $this->render('confTorneo', ['model' => $model]);

    }
    public function actionOra(){
        echo"<pre>";
        var_dump(Partita::getFinaliAll());die();
    }
}
