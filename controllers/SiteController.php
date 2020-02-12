<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Jobs;

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
        $jobs = Jobs::find()->all();
        /*print_r($jobs);
        exit();*/
        return $this->render('index' , ['jobs' => $jobs]);
    }

    public function actionCreate()
    {
        $job = new Jobs();
        $formData = Yii::$app->request->post();

        if ($job->load($formData)) {
            if ($job->save()) {
                Yii::$app->getSession()->setFlash('message' , 'Data Inserted');
                return $this->redirect(['index']);
                # code...
            }
            else
            {
              Yii::$app->getSession()->setFlash('message' , 'Error Inserted');   
            }
            # code...
        }
        return $this->render('create' , ['job' => $job]);
    }

    public function actionView($id)
    {
        $job = Jobs::findOne($id);
         return $this->render('view' , ['job' => $job]);

    }

    public function actionUpdate($id)
    {
        $job = Jobs::findOne($id);
        if($job->load(Yii::$app->request->post()) && $job->save())
        {
             Yii::$app->getSession()->setFlash('message' , 'Data updated');
              return $this->redirect(['index' , 'id' => $job->id]);

        }
        else{
            return $this->render('update' , ['job' => $job]);

        }

         

    }

    public function actionDelete($id)
    {
        $job = Jobs::findOne($id)->delete();
        if($job)
        {
              Yii::$app->getSession()->setFlash('message' , 'Data Deleted');
              return $this->redirect(['index']);

        }
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
}
