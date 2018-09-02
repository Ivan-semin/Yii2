<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'description', 'content'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d' ],
            [['date'], 'default', 'value' => date('Y-m-d') ],
            [['title'], 'string', 'max' => 255]
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
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage() {
        return ($this->image) ? '/web/uploads/' . $this->image : '/web/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload;
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if ($category != null) {
            $this->link('category', $category);
            return true;
        }
    }

    public function getDate()
    {
        return  Yii::$app->formatter->asDate($this->date, 'long');
    }

    public static function getAll($pageSize = 5, $sort = 'desc') {

        // build a DB query to get all articles with status = 1
        $query = Article::find()->where(['status'=>1])->orderBy('date '.$sort);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
                          ->limit($pagination->limit)
                          ->all();

        $data['pagination'] = $pagination;
        $data['articles'] = $articles;

        return $data;
    }

    public static function getPopular()
    {
        return  Article::find()->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
        return  Article::find()->orderBy('date desc')->limit(4)->all();
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        return $this->save();
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['article_id'=>'id']);
    }

    public function getArticleComments()
    {
        Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий будет добавлен после модерации!');
        return $this->getComments()->where(['status'=>1])->all();
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }

   public function viewedCounter()
   {
       $this->viewed += 1;
       return $this->save(false);
   }

   public function allow()
   {
       $this->status = 1;
       return $this->save(false);
   }

   public function disallow()
   {
       $this->status = 2;
       return $this->save(false);
   }


}
