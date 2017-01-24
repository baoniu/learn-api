<?php
/**
 * Created by PhpStorm.
 * User: chenjiang
 * Author: chenjiang <chenjiang@xiaomi.com>
 * Date: 17-1-24
 * Time: 下午8:09
 */
namespace App\Transformer;

/**
 * Class Transformer
 * @package App\Transformers
 */
abstract class Transformer{
    /**
     * @param $items
     * @return array
     */
    public function transformCollection($items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $item
     * @return mixed
     */
    abstract public function transform($item);
}