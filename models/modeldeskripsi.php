<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_deskripsi".
 *
 * @property integer $id_deskripsi
 * @property string $Judul_deskripsi
 * @property string $isi_deskripsi
 */
class modeldeskripsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_deskripsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_deskripsi'], 'integer'],
            [['Judul_deskripsi'], 'string', 'max' => 255],
            [['isi_deskripsi'], 'string', 'max' => 4000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_deskripsi' => 'Id Deskripsi',
            'Judul_deskripsi' => 'Judul Deskripsi',
            'isi_deskripsi' => 'Isi Deskripsi',
        ];
    }
}
