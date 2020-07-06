<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblalarm]].
 *
 * @see Tblalarm
 */
class TblalarmQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblalarm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblalarm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
