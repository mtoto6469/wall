<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Percentage]].
 *
 * @see Percentage
 */
class PercentageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Percentage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Percentage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
