<?php

namespace app\models;

use yii\base\Model;
use Yii;

class ImageUpload extends Model {

    public $image;

    // Валидация
    public function rules() {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    // Загрузка файла
    public function uploadFile($file, $currentImage) {

        $this->image = $file;

        if ($this->validate()) {

            $this->deleteCurrentImage($currentImage);

            return $this->saveImage($file);
        }
    }

    // Получение пути к папке хранения загрузок
    public function getFolder() {

        return Yii::getAlias('@web') . 'uploads/';
    }

    // Генерация имени файла
    public function generateFilename($file) {

        return strtolower(md5(uniqid($file->baseName)) .'.'. $file->extension);
    }

    // Удаление старой картинки
    public function deleteCurrentImage($currentImage) {

        if( $this->fileExists($currentImage) ) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    // Проверка на наличие картинки в папке
    public function fileExists($currentImage) {

        if (!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }
    
    // Сохранение картинки
    public function saveImage($file) {

        $filename = $this->generateFilename($file);

        $file->saveAs($this->getFolder() . $filename);

        return $filename;
    }



}
