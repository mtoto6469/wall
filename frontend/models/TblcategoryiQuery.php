<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Tblcategoryi]].
 *
 * @see Tblcategoryi
 */
class TblcategoryiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblcategoryi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblcategoryi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
