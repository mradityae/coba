<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_pemeriksaan".
 *
 * @property integer $id_pemeriksaan
 * @property string $diagnosa
 * @property string $dampak
 * @property string $solusi
 * @property string $pencegahan
 * @property string $saran
 * @property boolean $perlu_perbaikan
 * @property string $id_work_order_pemeriksaan
 */
class modelpemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_pemeriksaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan'], 'integer'],
            [['perlu_perbaikan'], 'boolean'],
            [['diagnosa', 'dampak', 'solusi', 'pencegahan', 'saran', 'id_work_order_pemeriksaan'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pemeriksaan' => 'Id Pemeriksaan',
            'diagnosa' => 'Diagnosa',
            'dampak' => 'Dampak',
            'solusi' => 'Solusi',
            'pencegahan' => 'Pencegahan',
            'saran' => 'Saran',
            'perlu_perbaikan' => 'Perlu Perbaikan',
            'id_work_order_pemeriksaan' => 'Id Work Order Pemeriksaan',
        ];
    }
}
