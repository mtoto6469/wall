<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblchat2]].
 *
 * @see Tblchat2
 */
class Tblchat2Query extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblchat2[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblchat2|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
