<?php

namespace app\controllers;

use app\controllers\base\BaseController;
use Yii;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends BaseController
{

    public function beforeAction($action){

        $user_id =  self::getUserId();
        $carrier_id =  self::getCarrierId();
        $pub_token =  self::getPubToken();

        $user = Users::findIdentity( $user_id);
        $carrier = Carriers::findIdentity( $carrier_id);

        if( !$user || !$user->validateToken($pub_token) || !$user->isBelongToCarrier($carrier))
            throw new ForbiddenHttpException();
        return
            true;
    }

    public function actionCreate(){

    }

    public function actionDelete(){

    }

    public function actionUpdate(){

    }
}
