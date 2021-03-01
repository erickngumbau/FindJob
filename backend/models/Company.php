<?php

namespace backend\models;

use common\models\User;
use frontend\models\Applicant;
use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int|null $job_id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $salary
 * @property string|null $employees_required
 * @property string|null $country
 * @property string|null $city
 * @property string|null $image
 *
 * @property Applicant[] $applicants
 * @property Job $job
 * @property User $user
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','job_id','user_id', 'salary', 'employees_required', 'country', 'city', 'image'], 'required'],
            [['job_id', 'user_id'], 'integer'],
            [['name', 'salary', 'employees_required', 'country', 'city', 'image'], 'string', 'max' => 200],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['image'],'file','extensions'=>'jpg,png,gif','skipOnEmpty'=>false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'user_id' => 'User ID',
            'name' => 'Company Name',
            'salary' => 'Salary',
            'employees_required' => 'Employees Required',
            'country' => 'Country',
            'city' => 'City',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Applicants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicants()
    {
        return $this->hasMany(Applicant::className(), ['company_id' => 'id']);
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
