<?php

namespace backend\models;

use frontend\models\Applicant;
use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property string|null $position
 * @property string $created_at
 * @property string|null $description
 * @property string|null $skills
 *
 * @property Applicant[] $applicants
 * @property Company[] $companies
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'description','skills'],'required'],
            [['created_at'], 'safe'],
            [['skills'], 'string'],
            [['position', 'description'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'created_at' => 'Created At',
            'description' => 'Description',
            'skills' => 'Skills',
        ];
    }

    /**
     * Gets query for [[Applicants]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplicants()
    {
        return $this->hasMany(Applicant::className(), ['job_id' => 'id']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['job_id' => 'id']);
    }
}
