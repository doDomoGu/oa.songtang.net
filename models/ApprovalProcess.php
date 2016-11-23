<?php

namespace app\models;

use Yii;

class ApprovalProcess extends \yii\db\ActiveRecord
{

    public function attributeLabels(){
        return [
            'title' => '审批标题',
            'type' => '审批类型',
            'content' => '详细信息',
            //'approve_user' => '审批人',
            //'cc_user' => '抄送人',
            'process_id' => '对应审批流程id',
            'status' => '状态',
        ];
    }

    public function rules()
    {
        return [
            [['username', 'password', 'name', 'ord', 'status'], 'required'],
            ['username','unique'],
            [['id', 'ord', 'status', 'position_id', 'gender'], 'integer'],
            ['username','email'],
            ['username','unique','on'=>'create', 'targetClass' => 'app\models\User', 'message' => '此用户名已经被使用。'],
            [['reg_code', 'forgetpw_code'],'default','value'=>''],
            [['reg_code', 'forgetpw_code', 'birthday', 'join_date', 'contract_date', 'mobile', 'phone', 'describe','password_true'], 'safe']

        ];
    }

/*CREATE TABLE `user` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`username` varchar(100) NOT NULL,
`password` varchar(100) NOT NULL,
`reg_code` varchar(255) NOT NULL,
`forgetpw_code` varchar(255) NOT NULL,
`name` varchar(100) NOT NULL,
`is_admin` tinyint(1) unsigned DEFAULT '0',
`position_id` int(9) unsigned NOT NULL DEFAULT '0',
`gender` tinyint(1) unsigned NOT NULL DEFAULT '0',
`birthday` date DEFAULT NULL,
`join_date` date DEFAULT NULL,
`mobile` varchar(255) NOT NULL DEFAULT '',
`phone` varchar(255) NOT NULL DEFAULT '',
`describe` text NOT NULL,
`ord` int(9) NOT NULL DEFAULT '0',
`status` tinyint(1) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`),
UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8*/


    public function getPosition()
    {
        return $this->hasOne('app\models\Position', array('id' => 'position_id'));
    }
}
