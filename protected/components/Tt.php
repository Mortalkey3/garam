<?php
/**
 * Fungsi Untuk Mendata Translate Text
 * 
 * @author Deory Pandu
 */
class Tt {
    public static function t($category, $message, $params=array ( ), $source=NULL, $language=NULL)
    {
        if (true) {
            $data = TtText::model()->find('message = :message AND category=:category', array(':message'=>$message, ':category'=>$category));
            if ($data === null) {
                $model = new TtText;
                $model->category = $category;
                $model->message = $message;
                $model->save(false);
            }
        }
        return Yii::t($category, $message, $params, $source, $language);
    }
}