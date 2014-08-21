<?php 
$str1 = '
        <a href="http://data.auto.sina.cn/carlibrary/subbrand.php?subid=769&bid=64&vt=4">宾利慕尚</a>
          </dd>
        </dl>
      </div>
      <!-- / 热门车型-->
      <!--  按品牌-->
  <div class="top-tabs-detail top-tabs-brands menu_switch"   data-sudaclick="wap_pinpai">
    <ul class="clearfix">
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=1&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/aodi.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=4&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/baoma.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=3&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/benchi.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=6&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/dazhong.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=2&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/bentian.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=9&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/fengtian.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=77&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/baoshijie.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=5&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/biaozhi.png"></a></li> 
      <li><a href="http://data.auto.sina.cn/carlibrary/typesearch.php?brand=26&pos=25&vt=4"><img src="http://u1.sinaimg.cn/upload/2014/07/31/biyadi.png"></a></li>
      <li><a class="brl" href="http://data.auto.sina.cn/carlibrary/choose.php">更多</a></li>
    </ul>
  </div>
  <!-- / 按品牌-->
      <!--  按价格-->
      <div class="top-tabs-detail top-tabs-prices menu_switch hide"   data-sudaclick="wap_price">
        <ul class="clearfix"> 
         <dl class="clearfix"> 
            <dd> 
';

$str1 = preg_replace('/<\!--  按品牌-->.*?<\!-- \/ 按品牌-->/s', '', $str1);
echo $str1;
?>
