<?php
/**
 * Created by PhpStorm.
 * User: chenjiang
 * Author: chenjiang <chenjiang@xiaomi.com>
 * Date: 17-1-24
 * Time: 下午8:12
 */
namespace App\Transformer;


/**
 * Class LessonsTransformer
 * @package App\Transformers
 */
class LessonsTransformer extends Transformer
{
    /**
     * @param $lesson
     * @return array
     */
    public function transform($lesson)
    {
        return [
            'id'     =>$lesson['id'],
            'title'  =>$lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free']
        ];
    }
}