<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teknisi".
 *
 * @property integer $userid
 * @property string $username
 * @property string $password
 * @property integer $status
 */
class modelteknisi extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teknisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid','username','password','status','nama_lengkap'],'required'],
            [['userid', 'status'], 'integer'],
            [['username', 'password'], 'string', 'max' => 50],
            [['nama_lengkap'],'string','max'=>50],
        ];
    }
    public function scenarios(){

        $scenarios = parent::scenarios();
        $scenarios['create'] = ['userid','username','password','status','nama_lengkap'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'nama_lengkap'=>'nama lengkap',
        ];
    }
}
