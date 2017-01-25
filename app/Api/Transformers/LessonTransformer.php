<?php

/**
 * Created by PhpStorm.
 * User: chenjiang
 * Author: chenjiang <chenjiang@xiaomi.com>
 * Date: 17-1-25
 * Time: 上午10:01
 */
namespace App\Api\Transformers;

use App\Lesson;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract
{
    public function transform(Lesson $lesson)
    {
        return [
            'id'    => $lesson['id'],
            'title' => $lesson['title'],
            'content'=>$lesson['body'],
            'is_free'=>(boolean)$lesson['free']
        ];
    }
}