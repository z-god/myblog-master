<?php
/**
 * Created by PhpStorm.
 * User: SIE-PC
 * Date: 2018/8/14
 * Time: 14:29
 */

namespace app\api\validate;

use think\Validate;

class ArticleValidate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];
}