<?php

namespace app\controllers;

use app\models\ref\RefMahalla;
use app\models\ref\RefSector;
use Yii;
use app\models\EventTask;
use app\models\search\EventTaskSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventTaskController implements the CRUD actions for EventTask model.
 */
class EventTaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EventTask models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventTaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EventTask model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EventTask model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($eventId, $sector)
    {
        $model = new EventTask();
        $model->event_id = $eventId;


        // Identifying mahalla for sector

        $sector = RefSector::find()->where([
            'sector_number' => $sector,
            'district_id' => Yii::$app->user->identity->detail->district_id
        ])->asArray()->one();
        if (empty($sector)) {
            Yii::$app->session->setFlash('Сиз туманга бириктирилмагансиз');
            return $this->redirect(['/event/view', 'id' => $eventId]);
        }
        $mahalla = ArrayHelper::map(RefMahalla::findAll(['sector_id' => $sector['id']]), 'id', 'name');


        /*******************************************/
        $model->sector = $sector['sector_number'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/event/view', 'id' => $eventId]);
        }

        return $this->render('create', [
            'model' => $model,
            'eventId' => $eventId,
            'mahalla' => $mahalla,
        ]);
    }

    /**
     * Updates an existing EventTask model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $eventId)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/event/view', 'id' => $eventId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EventTask model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EventTask model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventTask the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventTask::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
    }
}
