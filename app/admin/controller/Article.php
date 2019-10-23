<?php
/**
 * Created by PhpStorm.
 * User: 杨
 * Date: 2019/9/29
 * Time: 9:56
 */

namespace app\admin\controller;


use think\App;
use app\common\model\ArticleCategory;
use app\common\model\Article as ArticleModel;
class Article extends Base
{
    public $articleCategory;
    public $article;
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->articleCategory = new ArticleCategory();
        $this->article = new ArticleModel();
    }

    /**
     * 分类列表
     */
    public function categoryList(){
        return $this->fetch();
    }
    /*
     * 分类列表接口
     */
    public function apiCategoryList(){
        $list = $this->articleCategory->order('sort ASC')->select();

        return json($list);
    }
    /**
     * 添加/编辑分类接口
     */
    public function apiAddCategory(){
        $list = $this->articleCategory->order('sort ASC')->select();
        $Ctg = Category($list);
        return json($Ctg);
    }
    /**
     * 添加分类
     */
    public function addCategory(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->validate($data,'app\admin\validate\Article.addCategory');
            if ($check !== true){
                return adminMsg(1,'',$check);
            }
            $re = $this->articleCategory->add($data);

            if ($re){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        return $this->fetch();
    }
    /**
     * 编辑分类
     */
    public function editCategory(){
        if (request()->isPost()){
            $data = request()->param();
            $msg = $this->validate($data,'app\admin\validate\Article.editCategory');
            if ($msg !== true){
                return adminMsg(1,'',$msg);
            }
            $re = $this->articleCategory->edit(['category_id'=>$data['category_id']],$data);

            if ($re){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $id = request()->get('category_id');
        $info = $this->articleCategory->where('category_id',$id)->find();
        $this->assign('info',$info);

        return $this->fetch('add_category');
    }
    /*
     * 删除分类
     */
    public function delCategory(){
        $id = request()->param();
        $check = $this->Validate($id,'app\admin\validate\Article.delCategory');
        if ($check != true){
            return adminMsg(1,'',$check);
        }
        $res = $this->articleCategory->del($id);
        if ($res){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
    /*
     * 文章列表
     */
    public function articleList(){
        return $this->fetch();
    }
    /*
     * 文章列表接口
     */
    public function apiArticleList(){
        $content = request()->param('content');
        $page = request()->param('page',1);
        $limit = request()->param('limit',10);
        $where = [];
        if (!empty($content)){
            $where[] = ['article_title|article_keywords|article_description|article_content','like',"%$content%"];
        }
        $list = $this->article->getList($where,'',$page,$limit);
        $count = $this->article->where($where)->count();

        return api($list,$count);
    }
    /*
     * 添加文章
     */
    public function addArticle(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Article.addArticle');
            if ($check != true){
                return adminMsg(1,'',$check);
            }

            if (isset($data['article_moreimg[]'])){
                $data['article_moreimg'] = json_encode($data['article_moreimg[]']);
            }
            unset($data['file']);
           $data['article_addtime'] = time();
            $res = $this->article->add($data);
            if ($res){
                return adminMsg(9);
            }
            return adminMsg(10);
        }
        return $this->fetch();
    }
    /**
     * 编辑文章
     */
    public function editArticle(){
        if (request()->isPost()){
            $data = request()->param();
            $check = $this->Validate($data,'app\admin\validate\Article.editArticle');
            if ($check != true){
                return adminMsg(1,'',$check);
            }
            if (!empty($data['article_moreimg'])){
                $data['article_moreimg'] = json_encode($data['article_moreimg']);
            }

            unset($data['file']);
            $data['article_addtime'] = time();

            $res = $this->article->edit(['article_id'=>$data['article_id']],$data);
            if ($res){
                return adminMsg(13);
            }
            return adminMsg(14);
        }
        $article_id = request()->param();
        $info = $this->article->getInfo($article_id);
        $info['article_moreimg'] = json_decode($info['article_moreimg'],true);
        return $this->fetch('add_article',[
            'info'=>$info
        ]);
    }
    /*
     * 删除文章
     */
    public function delArticle(){
        $id = request()->param();
        $check = $this->Validate($id,'app\admin\validate\Article.delArticle');
        if ($check != true){
            return adminMsg(1,'',$check);
        }
        $res = $this->article->del($id);
        if ($res){
            return adminMsg(15);
        }
        return adminMsg(16);
    }
}