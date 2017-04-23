<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property integer $category_id
 * @property integer $user_id
 * @property integer $createdAt
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['category_id', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'createdAt' => 'Created At',
        ];
    }

    public function upload(){
        $this->image->saveAs(Yii::getAlias('@frontend') .'/web/images/'.$this->image->baseName . '.' . $this->image->extension);
        return true;
    }

    public function getTags()
    {
        return $this->hasMany(Tags::className(), ['id' => 'tag_id'])
            ->viaTable('news_tag', ['news_id' => 'id']);
    }
    public function getNewsTag(){
        return $this->hasMany(NewsTag::className(),['news_id'=>'id']);
    }


}
