<?php

namespace frontend\models;

use backend\models\Company;
use backend\models\Job;
use common\models\User;
use Yii;

/**
 * This is the model class for table "applicant".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property int|null $job_id
 * @property int|null $company_id
 * @property string|null $created_at
 *
 * @property Job $job
 * @property Company $company
 * @property User $user
 */
class Applicant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'job_id', 'company_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'job_id' => 'Job ID',
            'company_id' => 'Company ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'job_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
