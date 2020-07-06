<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblfactors]].
 *
 * @see Tblfactors
 */
class TblfactorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblfactors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblfactors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
