<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_work_order".
 *
 * @property string $name_work_order
 * @property string $id_atm_order
 * @property integer $teknisi_id_work_order
 * @property integer $nomor_tiket
 * @property string $date_penugasan
 * @property string $time_penugasan
 * @property double $lokasi_latitude
 * @property double $lokasi_longitude
 * @property string $jenis_layanan
 * @property string $deskripsi
 * @property integer $id_work_order
 */
class modelworkorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_work_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teknisi_id_work_order', 'nomor_tiket', 'id_work_order'], 'integer'],
            [['date_penugasan', 'time_penugasan'], 'safe'],
            [['lokasi_latitude', 'lokasi_longitude'], 'number'],
            [['jenis_layanan'], 'string'],
            [['id_work_order'], 'required'],
            [['name_work_order', 'id_atm_order', 'deskripsi'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name_work_order' => 'Name Work Order',
            'id_atm_order' => 'Id Atm Order',
            'teknisi_id_work_order' => 'Teknisi Id Work Order',
            'nomor_tiket' => 'Nomor Tiket',
            'date_penugasan' => 'Date Penugasan',
            'time_penugasan' => 'Time Penugasan',
            'lokasi_latitude' => 'Lokasi Latitude',
            'lokasi_longitude' => 'Lokasi Longitude',
            'jenis_layanan' => 'Jenis Layanan',
            'deskripsi' => 'Deskripsi',
            'id_work_order' => 'Id Work Order',
        ];
    }
}
