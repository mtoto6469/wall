<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblimg]].
 *
 * @see Tblimg
 */
class TblimgQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblimg[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblimg|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
