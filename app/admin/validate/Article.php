<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/29
 * Time: 10:38
 */

namespace app\admin\validate;

use think\validate;
class Article extends validate
{
    protected $rule = [
     'category_title'  => 'require',
     'category_id'  => 'require|number',
     'article_id'  => 'require|number',
     'article_title'  => 'require',
     'artilce_content'  => 'require',
    ];
    protected $message = [
        'category_title.require' => '分类名称必填',
        'category_id.require' => '参数错误',
        'category_id.number' => '参数错误',
        'article_title.require' => '文章标题必填',
        'artilce_content.require' => '文章内容必填',
    ];
    protected $scene = [
        'addCategory' => ['category_title'],
        'addArticle' => ['article_title','artilce_content'],
        'editArticle' => ['article_id','article_title','artilce_content'],
        'editCategory' => ['category_title','category_id'],
        'delCategory' => ['category_id'],
        'delArticle' => ['article_id'],
    ];
}