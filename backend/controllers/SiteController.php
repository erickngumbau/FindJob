<?php
namespace backend\controllers;

use backend\models\Company;
use backend\models\Job;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\Applicant;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','companyform'],
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
        ];
    }

    public function actionCompanyform()
    {
        $model = new \backend\models\Company();
    
        if ($model->load(Yii::$app->request->post())){

            $imageFile = UploadedFile::getInstance($model, 'image');
            if (isset($imageFile->size)) {

                // $imageFile->saveAs('uploads/' . $imageFile->baseName . '.' . $imageFile->extension);
               
                if(!file_exists((Url::to('@webfront/myassets/realimages/'))))
                {
                    mkdir(Url::to('@webfront/myassets/realimages/'),0777,true);
                }

                $imageName = Url::to('@webfront/myassets/realimages/').'/'.$imageFile->baseName.'.'.$imageFile->extension;
                $imageFile->saveAs($imageName);
          
            }
           
                 $model->image= $imageFile->baseName . '.' . $imageFile->extension;
                 $model->save(false);

                Yii::$app->session->setFlash('success', 'Company data saved.');
                return $this->refresh();
            
        }
    
        return $this->render('companyform', [
            'model' => $model,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $job = new Job();
        $company = new Company();
        $applicant = new Applicant();


    //     $jobcount = Job::find()
    //         ->count();

    //     $companiescount = Company::find()
    //         ->count();

    //    $applicantscount = Applicant::find()
    //         ->count();
        
     

        return $this->render('index',['job'=>$job,'company'=>$company,'applicant'=>$applicant]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
