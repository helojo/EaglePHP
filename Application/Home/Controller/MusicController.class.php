<?php
/**
 * 在线听音乐
 * @author maojianlw@139.com
 * @since 2012-05-21
 * @version 1.8
 */
class MusicController extends CommonController{
     
    private $cur_model;   
 
    public function __construct(){
        $this->cur_model = M('music');
    }
    
    public function indexAction(){
		$list = $this->cur_model->where("state=0")->order('rank DESC,id DESC')->select(array('cache'=>true));
		foreach($list as $val){
		    $music .= "{title: '{$val['title']}',artist: '{$val['author']}', mp3: '{$val['url']}'},";
		}
		$this->assign('music', trim($music, ','));
		$this->assign('list', $list);
		$this->assign('title', '音乐');
		$this->assign('hot_news', M('news')->getHot());
        $this->display();
    }
    
    
     
}