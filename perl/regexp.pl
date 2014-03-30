#

sub check_title {
    my $title = shift;
    if ($title =~ /降|让利|优惠/) {
        #print "\n匹配到 降|让利|优惠";
        my $sales = getSales($title);
        print ' ', $sales, "\n";
        $title =~ s/$sales/<span class="redFont"\>$sales<\/span\>/;
    }
    return $title;
}

sub getSales {
    my $title = shift;

    if ($title =~ /千/ && $title !~ /元/) {
        $title =~ s/千/千元/g;
    }
    if ($title =~ /万/ && $title !~ /元/) {
        $title =~ s/万/万元/g;
    }

    #print $title;

    if ($title =~ /降(\d*\.?\d+(千|万)?元)/) {
        print 'case1';
    }
    elsif ($title =~ /让利(\d*\.?\d+(千|万)?元)/) {
        print 'case2';
    }
    elsif ($title =~ /(\d*\.?\d+(千|万)?元)优惠/) {
        print 'case3';
    }
    elsif ($title =~ /优惠(\d*\.?\d+(千|万)?元)/) {
        print 'case4';
    }
    else {
        print 'case5';
        return ''; 
    }

    return $1;
}

my $title = '';
$title = '3千元优惠';
check_title($title);
$title = '降3000元';
check_title($title);
$title = '让利20.5万元';
check_title($title);
$title = '优惠10万元';
check_title($title);




=pod
my $str1 = '中文111@0#';
my $str2 = '32302304((##';


if ($str1 =~ /([\x80-\xFF][\x80-\xFF])/) {
    print "\n", $1;
    print "\nchinese3";
}

if ($str2 =~ /([\x80-\xFF][\x80-\xFF])/) {
    print "\nchinese4";
}

if ($str1 =~ /([\x80-\xFF])/) {
    print "\nchinese5";
}

if ($str1 =~ /[\u4e00-\u9fa5]/) {
    print "\nchinese1";
}

if ($str2 =~ /[\u4e00-\u9fa5]/) {
    print "\nchinese2";
}

my $html = qq~
<div class="front_term_list ft1">
				<div class="litpic"><a href="/content/news/1636" target="_blank"><img src="/sites/files/user-203/2013-12/7061/200x150_scale_and_crop.jpg" title="混沌的车联网产业：生长无序，价值堪忧" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="/content/news/1636" target="_blank">混沌的车联网产业：生长无序，价值堪忧</a><!--<span class="hot"><img src="/sites/themes/che1/images/hot.jpg" /></span>--></h3>
					<div class="submit"><span class="author"><a href="/content/news/1636" target="_blank">腾讯科技</a></span>发表于&nbsp;&nbsp;2013-12-15 10:23</div>
					<div class="des"><a href="/content/news/1636">车联网行业正处于混乱无序状态，市场前景不明。产业链各方在不知道游戏玩法，也没有游戏规则的大环境下，进行着一场深度博弈。<span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
															<li><a href="/tags/车联网" target="_blank">车联网</a></li>
															<li><a href="/tags/车载系统" target="_blank">车载系统</a></li>
													</div>
						<div class="fshare">
							<span class="qq"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&title=【混沌的车联网产业：生长无序，价值堪忧】车联网行业正处于混乱无序状态，市场前景不明。产业链各方在不知道游戏玩法，也没有游戏规则的大环境下，进行着一场深度博弈。(分享自@cheyunwang)&appkey=801341757&url=http://www.cheyun.com/content/news/1636&pic=http://www.cheyun.com/sites/files/weibo/chang/9302093b32db22d0e42dd7525badba9b.png&line1=" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=【混沌的车联网产业：生长无序，价值堪忧】车联网行业正处于混乱无序状态，市场前景不明。产业链各方在不知道游戏玩法，也没有游戏规则的大环境下，进行着一场深度博弈。(分享自@车云网)&appkey=2772204160&url=http://www.cheyun.com/content/news/1636&pic=http://www.cheyun.com/sites/files/weibo/chang/9302093b32db22d0e42dd7525badba9b.png" target="_blank"></a></span>
							<span class="cnum"><a href="/content/news/1636#comment_form">0</a></span>
						</div>
					</div>
				</div>
			</div>
				<div class="front_term_list ft2">
				<div class="litpic"><a href="/content/news/1630" target="_blank"><img src="/sites/files/user-203/2013-12/7041/200x150_scale_and_crop.jpg" title="当汽车共享恋上电动车" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="/content/news/1630" target="_blank">当汽车共享恋上电动车</a></h3>
					<div class="submit"><span class="author"><a href="/content/news/1630" target="_blank">汽车商业评论</a></span>发表于&nbsp;&nbsp;2013-12-15 09:37</div>
					<div class="des"><a href="/content/news/1630">电动车和汽车共享都是新鲜概念，但是他们正产生着奇妙的化学反应。80%共享汽车用户希望驾驶电动车，这或许是新能源汽车的好商机。<span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
															<li><a href="/tags/电动车" target="_blank">电动车</a></li>
															<li><a href="/tags/汽车共享" target="_blank">汽车共享</a></li>
													</div>
						<div class="fshare">
							<span class="qq"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&title=【当汽车共享恋上电动车】电动车和汽车共享都是新鲜概念，但是他们正产生着奇妙的化学反应。80%共享汽车用户希望驾驶电动车，这或许是新能源汽车的好商机。(分享自@cheyunwang)&appkey=801341757&url=http://www.cheyun.com/content/news/1630&pic=http://www.cheyun.com/sites/files/weibo/chang/21d177b8ef59608fdcd40d7786aeaa3b.png&line1=" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=【当汽车共享恋上电动车】电动车和汽车共享都是新鲜概念，但是他们正产生着奇妙的化学反应。80%共享汽车用户希望驾驶电动车，这或许是新能源汽车的好商机。(分享自@车云网)&appkey=2772204160&url=http://www.cheyun.com/content/news/1630&pic=http://www.cheyun.com/sites/files/weibo/chang/21d177b8ef59608fdcd40d7786aeaa3b.png" target="_blank"></a></span>
							<span class="cnum"><a href="/content/news/1630#comment_form">1</a></span>
						</div>
					</div>
				</div>
			</div>
				<div class="front_term_list ft3">
				<div class="litpic"><a href="/content/news/1632" target="_blank"><img src="/sites/files/baidueditor/fa22767981f4cd836313bef96c6f912e.jpg" title="【一周动态】Tesla中国官网上线，通用任命首位女CEO，法拉利首款混动车售罄" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="/content/news/1632" target="_blank">【一周动态】Tesla中国官网上线，通用任命首位女CEO，法拉利首款混动车售罄</a></h3>
					<div class="submit"><span class="author"><a href="/content/news/1632" target="_blank">车云网</a></span>发表于&nbsp;&nbsp;2013-12-15 09:22</div>
					<div class="des"><a href="/content/news/1632">车载智联设备Zubie融资1000万刀?；霍顿品牌或将消亡；观致3年净亏损或超20亿……还有，这里有第一辆用比特币购买的TESLA。<span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
															<li><a href="/tags/一周动态" target="_blank">一周动态</a></li>
													</div>
						<div class="fshare">
							<span class="qq"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&title=【【一周动态】Tesla中国官网上线，通用任命首位女CEO，法拉利首款混动车售罄】车载智联设备Zubie融资1000万刀?；霍顿品牌或将消亡；观致3年净亏损或超20亿……还有，这里有第一辆用比特币购买的TESLA。(分享自@cheyunwang)&appkey=801341757&url=http://www.cheyun.com/content/news/1632&pic=http://www.cheyun.com/sites/files/weibo/chang/436e1009bbfd004a19a8c83cba34498d.png&line1=" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=【【一周动态】Tesla中国官网上线，通用任命首位女CEO，法拉利首款混动车售罄】车载智联设备Zubie融资1000万刀?；霍顿品牌或将消亡；观致3年净亏损或超20亿……还有，这里有第一辆用比特币购买的TESLA。(分享自@车云网)&appkey=2772204160&url=http://www.cheyun.com/content/news/1632&pic=http://www.cheyun.com/sites/files/weibo/chang/436e1009bbfd004a19a8c83cba34498d.png" target="_blank"></a></span>
							<span class="cnum"><a href="/content/news/1632#comment_form">0</a></span>
						</div>
					</div>
				</div>
			</div>
				<div class="front_term_list ft4">
				<div class="litpic"><a href="/content/news/1634" target="_blank"><img src="/sites/files/user-203/2013-12/7059/200x150_scale_and_crop.jpg" title="苏伟铭升迁记，大众“内阁”唯一华人" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="/content/news/1634" target="_blank">苏伟铭升迁记，大众“内阁”唯一华人</a></h3>
					<div class="submit"><span class="author"><a href="/content/news/1634" target="_blank">头条汽车</a></span>发表于&nbsp;&nbsp;2013-12-15 09:04</div>
					<div class="des"><a href="/content/news/1634">狼堡的一纸任命，让苏伟铭成为德国大众最为重要的亚裔高管。他强硬但不失灵活，作为中国市场代表，中国兴则苏兴。<span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
															<li><a href="/tags/大众" target="_blank">大众</a></li>
															<li><a href="/tags/职场" target="_blank">职场</a></li>
															<li><a href="/tags/头条" target="_blank">头条</a></li>
													</div>
						<div class="fshare">
							<span class="qq"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&title=【苏伟铭升迁记，大众“内阁”唯一华人】狼堡的一纸任命，让苏伟铭成为德国大众最为重要的亚裔高管。他强硬但不失灵活，作为中国市场代表，中国兴则苏兴。(分享自@cheyunwang)&appkey=801341757&url=http://www.cheyun.com/content/news/1634&pic=http://www.cheyun.com/sites/files/weibo/chang/56dc011b3e24133f418f90a3fb0cf568.png&line1=" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=【苏伟铭升迁记，大众“内阁”唯一华人】狼堡的一纸任命，让苏伟铭成为德国大众最为重要的亚裔高管。他强硬但不失灵活，作为中国市场代表，中国兴则苏兴。(分享自@车云网)&appkey=2772204160&url=http://www.cheyun.com/content/news/1634&pic=http://www.cheyun.com/sites/files/weibo/chang/56dc011b3e24133f418f90a3fb0cf568.png" target="_blank"></a></span>
							<span class="cnum"><a href="/content/news/1634#comment_form">1</a></span>
						</div>
					</div>
				</div>
			</div>
				<div class="front_term_list ft5">
				<div class="litpic"><a href="/content/news/1631" target="_blank"><img src="/sites/files/baidueditor/dbb94b50c534ec2544d2d05b3fe5e6e7.jpg" title="沃尔沃S60L：中国制造的“进口”车" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="/content/news/1631" target="_blank">沃尔沃S60L：中国制造的“进口”车</a></h3>
					<div class="submit"><span class="author"><a href="/content/news/1631" target="_blank">车云网</a></span>发表于&nbsp;&nbsp;2013-12-14 10:08</div>
					<div class="des"><a href="/content/news/1631">作为沃尔沃成都工厂的第一款产品，S60L除了拥有沃尔沃在安全方面的常规优势，还有一个独有“天赋”：中国制造的进口车。<span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
															<li><a href="/tags/沃尔沃" target="_blank">沃尔沃</a></li>
															<li><a href="/tags/营销" target="_blank">营销</a></li>
															<li><a href="/tags/安全" target="_blank">安全</a></li>
															<li><a href="/tags/环保" target="_blank">环保</a></li>
													</div>
						<div class="fshare">
							<span class="qq"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&title=【沃尔沃S60L：中国制造的“进口”车】作为沃尔沃成都工厂的第一款产品，S60L除了拥有沃尔沃在安全方面的常规优势，还有一个独有“天赋”：中国制造的进口车。(分享自@cheyunwang)&appkey=801341757&url=http://www.cheyun.com/content/news/1631&pic=http://www.cheyun.com/sites/files/weibo/chang/c0be114a53199a0a3baf81a7da0ba2ff.png&line1=" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=【沃尔沃S60L：中国制造的“进口”车】作为沃尔沃成都工厂的第一款产品，S60L除了拥有沃尔沃在安全方面的常规优势，还有一个独有“天赋”：中国制造的进口车。(分享自@车云网)&appkey=2772204160&url=http://www.cheyun.com/content/news/1631&pic=http://www.cheyun.com/sites/files/weibo/chang/c0be114a53199a0a3baf81a7da0ba2ff.png" target="_blank"></a></span>
							<span class="cnum"><a href="/content/news/1631#comment_form">5</a></span>
						</div>
					</div>
				</div>
			</div>
				<div class="front_term_list ft6">
				<div class="litpic"><a href="/content/news/1626" target="_blank"><img src="/sites/files/user-203/2013-12/7039/200x150_scale_and_crop.jpg" title="从英国首相“点赞”看捷豹路虎在中国的野心膨胀" width="200" height="150" /></a>
				</div>
				<div class="fcon_right">
					<h3><a href="/content/news/1626" target="_blank">从英国首相“点赞”看捷豹路虎在中国的野心膨胀</a></h3>
					<div class="submit"><span class="author"><a href="/content/news/1626" target="_blank">第一财经周刊</a></span>发表于&nbsp;&nbsp;2013-12-14 08:33</div>
					<div class="des"><a href="/content/news/1626">随着45亿英镑的2014财年车辆采购备忘录签署，外加英国首相卡梅伦的“点赞”，捷豹路虎在中国这个最大单一市场的野心进一步膨胀。<span class="fmore"></span></a></div>
					<div class="fcon_bottom">
						<div class="ftags">
															<li><a href="/tags/捷豹" target="_blank">捷豹</a></li>
															<li><a href="/tags/路虎" target="_blank">路虎</a></li>
															<li><a href="/tags/头条" target="_blank">头条</a></li>
													</div>
						<div class="fshare">
							<span class="qq"><a href="http://share.v.t.qq.com/index.php?c=share&a=index&title=【从英国首相“点赞”看捷豹路虎在中国的野心膨胀】随着45亿英镑的2014财年车辆采购备忘录签署，外加英国首相卡梅伦的“点赞”，捷豹路虎在中国这个最大单一市场的野心进一步膨胀。(分享自@cheyunwang)&appkey=801341757&url=http://www.cheyun.com/content/news/1626&pic=http://www.cheyun.com/sites/files/weibo/chang/2de52c743659d442447d62a41b11b2f7.png&line1=" target="_blank"></a></span>
							<span class="sina"><a href="http://service.weibo.com/share/share.php?title=【从英国首相“点赞”看捷豹路虎在中国的野心膨胀】随着45亿英镑的2014财年车辆采购备忘录签署，外加英国首相卡梅伦的“点赞”，捷豹路虎在中国这个最大单一市场的野心进一步膨胀。(分享自@车云网)&appkey=2772204160&url=http://www.cheyun.com/content/news/1626&pic=http://www.cheyun.com/sites/files/weibo/chang/2de52c743659d442447d62a41b11b2f7.png" target="_blank"></a></span>
							<span class="cnum"><a href="/content/news/1626#comment_form">0</a></span>
						</div>
					</div>
				</div>
			</div>
~;

while($html =~ /<div class="litpic"\><a href[^\>]*?\><img src="(.*?)"[^\>]*?\>.*?<h3\><a href[^\>]*?\>(.*?)<\/a\><\/h3\>/) {

}
=cut



