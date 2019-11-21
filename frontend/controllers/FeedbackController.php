<?php

namespace frontend\controllers;

use \common\models\Feedback;
use Yii;

class FeedbackController extends \yii\web\Controller
{
	public function init()
	{
		$this->defaultAction = 'form';

		return parent::init();
	}

    public function actionForm()
    {
    	$model = new Feedback;

    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Thank you for contacting us.');
            return $this->refresh();
    	}

        return $this->render('form', [
        	'model' => $model,
    	]);
    }

}
