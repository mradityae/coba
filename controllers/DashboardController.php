<?php

namespace app\controllers;
use app\models\modeldeskripsi;
use app\models\modelpemeriksaan;
use app\models\modelworkorder;
use \yii\web\Controller;
use \yii\web\Response;

class DashboardController extends Controller
{
    public $enableCsrfValidation=false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetDeskripsi()
    {
        \Yii::$app->response->format = Response:: FORMAT_JSON;
        $teknisideskripsi = modeldeskripsi::find()->all();

        if(count($teknisideskripsi) > 0){
            return array('status' => true, 'data' => $teknisideskripsi);
        } else {
            return array('status' => false, 'data' => 'no data found');
        }
    }

    public function actionGetWorkOrder(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $workorder = modelworkorder::find()->all();

        if(count($workorder) > 0){
            return array('status'=>true,'data'=>$workorder);
        }
        else{
            return array('status'=>false,'data'=>'data tidak ditemukan');
        }
    }

    public function actionGetEachWorkOrder(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $postworkorder = \yii::$app->request->post();
        $jumlahworkorder = modelworkorder::find()
            ->where([
                'id_work_order'=>$postworkorder['id_work_order']
            ])->one();

        if(count($jumlahworkorder) > 0){
            return array('status'=>true, 'data'=>$jumlahworkorder);
        }
        else{
            return array('status'=>false,'data'=>'data tidak ditemukan');
        }

    }
    public function actionGetPemeriksaan(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $modelworkorder = \yii::$app->request->post();
        $pemeriksaan = modelpemeriksaan::find()
            ->where([
                'id_work_order_pemeriksaan'=>$modelworkorder['id_work_order_pemeriksa']
            ])->one();

        if(count($pemeriksaan) > 0){
            return array('status'=>true,'data'=>$pemeriksaan);
        }
        else{
            return array('status'=>false,'data'=>'data tidak ditemukan');
        }
    }
    public function actionPerbaikan(){

        \Yii::$app->response->format = Response::FORMAT_JSON;
        $cari_id_work_order = \yii::$app->request->post();

        $perbaikan_pemeriksaan = modelpemeriksaan::find()
            ->where([
                'id_work_order_pemeriksaan'=>$cari_id_work_order['id_work_order']
            ])->one();

        if(count($perbaikan_pemeriksaan) > 0){
            $perbaikan_pemeriksaan->perlu_perbaikan = $cari_id_work_order['perlu_perbaikan'];
            $perbaikan_pemeriksaan->update();
            return array('status'=>true,'data'=>$perbaikan_pemeriksaan);
        }
        else{
            return array('status'=>false,'data'=>'data tidak ditemukan');
        }
    }
}
