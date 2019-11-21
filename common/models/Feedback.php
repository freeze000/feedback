<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $mobile
 * @property string $plot
 */
class Feedback extends \yii\db\ActiveRecord
{
    public $reCaptcha;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'mobile', 'plot'], 'required'],
            [['plot'], 'string', 'min' => 100],
            
            [['firstname', 'lastname'], 'string', 'min' => 3, 'max' => 32],
            [['firstname', 'lastname'], 'match', 'pattern' => '/^([A-Z]|[А-ЯЁ])+$/ui', 'message' => 'Please only the letters'],

            [['email'], 'string', 'max' => 128],
            [['email'], 'email'],
            
            [['mobile'], 'string', 'max' => 32],
            [['mobile'], 'match', 'pattern' => '/^\+7 \(\d{3}\) \d{3}\-\d{2}\-\d{2}/', 'message' => 'Invalid phone please use format +7 (XXX) XXX-XX-XX'],
            
            [
                ['reCaptcha'],
                \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'uncheckedMessage' => 'Please confirm that you are not a bot.'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'plot' => 'Plot',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        $firstname = $this->firstname;
        $firstname = mb_strtoupper(mb_substr($firstname, 0, 1)) . mb_substr($firstname, 1);
        $this->firstname = $firstname;

        $lastname = $this->lastname;
        $lastname = mb_strtoupper(mb_substr($lastname, 0, 1)) . mb_substr($lastname, 1);
        $this->lastname = $lastname;

        return parent::beforeSave($insert);
    }
}
