<?php
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 9/13/2018
 * Time: 9:39 AM
 */

namespace backend\models;


use yii\base\Model;

class Img extends Model
{
    public $images;
    
    public function rules()
    {
        return[
            [['images'],'file','extensions'=>'png,jpg,jpeg,mp4' , 'maxFiles'=>10]
        ];
    }

}