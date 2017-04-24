<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ui_table".
 *
 * @property integer $id
 * @property string $div
 * @property integer $parent
 * @property integer $position
 * @property integer $width
 */
class UiTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ui_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'position', 'width'], 'integer'],
            [['div'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'div' => 'Div',
            'parent' => 'Parent',
            'position' => 'Position',
            'width' => 'Width',
        ];
    }
}
