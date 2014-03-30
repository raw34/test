#
my %hash_pdps = (
    '苏州' => [
        ['PDPS000000038147','PDPS000000038148'],
        ['PDPS000000038142','PDPS000000038144','PDPS000000038145','PDPS000000038146'],
        ['PDPS000000038147','PDPS000000038148','PDPS000000038147']
    ],

    '南京' => [
        ['PDPS000000038147','PDPS000000038148'],
        ['PDPS000000038142','PDPS000000038144','PDPS000000038145','PDPS000000038146'],
        ['PDPS000000038147','PDPS000000038148','PDPS000000038147']
    ],

    '通用' => [
        #通栏1 按钮*2
        [
            '<a href="http://data.auto.sina.com.cn/kjt/" target="_blank"><img class="fL" width="360" height="90" src="http://www.sinaimg.cn/qc/2014/0322/360x90.jpg" alt=""/></a>',
            '<a href="http://dealer.auto.sina.com.cn/dealer/map/" target="_blank"><img class="fR" width="620" height="90" src="http://www.sinaimg.cn/qc/2014/0322/620x90.jpg" alt=""/></a>'
        ],
        #通栏2 按钮*4
        [
            '<a href="http://weidealer.auto.sina.com.cn/about.html" target="_blank"><img width="240" height="100" src="http://www.sinaimg.cn/qc/2014/0322/240x100.jpg" alt=""/></a>',
            '<a href="http://dealer.auto.sina.com.cn/price/" target="_blank"><img width="240" height="100" src="http://www.sinaimg.cn/qc/2014/0322/240x100a.jpg" alt=""/></a>',
            '<a href="http://usedcar.auto.sina.com.cn/" target="_blank"><img width="240" height="100" src="http://www.sinaimg.cn/qc/2014/0322/240x100b.jpg" alt=""/></a>',
            '<a href="http://auto.sina.com.cn/z/jingxiaoshanganfang04/" target="_blank"><img width="240" height="100" src="http://www.sinaimg.cn/qc/2014/0322/240x100c.jpg" alt=""/></a>',
        ],
        #通栏2 按钮*3
        [
            '<a href="http://photo.auto.sina.com.cn/" target="_blank"><img class="fL" width="320" height="90" src="http://www.sinaimg.cn/qc/2014/0322/320x90.jpg" alt=""/></a>',
            '<a href="http://data.auto.sina.com.cn/" target="_blank"><img style="margin-left:20px;" class="fL" width="320" height="90" src="http://www.sinaimg.cn/qc/2014/0322/320x90.jpg" alt=""/></a>',
            '<a href="http://weidealer.auto.sina.com.cn/" target="_blank"><img class="fR" width="320" height="90" src="http://www.sinaimg.cn/qc/2014/0322/320x90.jpg" alt=""/></a>'
        ]
    ]
);

if ($hash_pdps{'北京'} eq '') {
    print 'eq 空';
}
if (scalar($hash_pdps{'北京'}) <= 0) {
    print '<= 0';
}
if (!defined($hash_pdps{'北京'})) {
    print 'not defined';
}
