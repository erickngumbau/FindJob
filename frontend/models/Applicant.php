<?php

namespace frontend\models;

use backend\models\Company;
use backend\models\Job;
use Yii;

/**
 * This is the model class for table "applicant".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $job_id
 * @property int|null $company_id
 * @property string|null $created_at
 *
 * @property Job $job
 * @property Company $company
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
            [['name','job_id', 'company_id'], 'required'],
            [['job_id', 'company_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Applicant Name',
            'job_id' => 'Job',
            'company_id' => 'Company',
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
}
