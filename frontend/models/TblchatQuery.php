<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblchat]].
 *
 * @see Tblchat
 */
class TblchatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblchat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblchat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
