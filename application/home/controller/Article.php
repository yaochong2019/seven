<?php
namespace app\home\controller;
use think\Db;
use think\Page;
class Article extends Base {
    
    public function index(){       
        $article_id = I('article_id/d',38);
    	$article = Db::name('article')->where("article_id", $article_id)->find();
    	$this->assign('article',$article);
        return $this->fetch();
    }
 
    /**
     * 文章内列表页
     */
    public function articleList(){
        $article_cat = M('ArticleCat')->where("parent_id  = 0")->select();
        $article = M('Article')->where('is_open=1');
        $count = $article->count();
        $page = new \think\Page($count,10);
        $p = isset($_GET['p'])?$_GET['p']:1;
        $articles= $article->order('publish_time desc')->Page($p.',10')->select();
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','末页');
        $show = $page->show();
        $this->assign('article_cat',$article_cat);
        $this->assign('article',$articles);
        $this->assign('page',$show);
        return $this->fetch();
    }
    /**
     * 文章内容页
     */
    public function detail(){
    	$article_id = I('article_id/d',1);
    	$article = Db::name('article')->where("article_id", $article_id)->find();
    	if($article){
    		$parent = Db::name('article_cat')->where("cat_id",$article['cat_id'])->find();
            $content = $article['content'];
    		$this->assign('cat_name',$parent);
    		$this->assign('article',$article);
            $this->assign('content',$content);
    	}
        return $this->fetch();
    } 

    /**
     * 关于
     */
    public function about(){
        $con = M('Article')->where('cat_id=7')->select();
        $this->assign('con',$con);
        return $this->fetch();
    }
}