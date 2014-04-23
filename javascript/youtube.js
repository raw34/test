function get_videos_by_username(user, keyword, page, pagesize) {
    //?alt=json-in-script&start-index=1&max-results=50&q=%E4%B8%96%E3%81%AB%E3%82%82%E5%A5%87%E5%A6%99%E3%81%AA%E7%89%A9%E8%AA%9E';
    if (typeof(user) != 'undefined') {
        var api = 'http://gdata.youtube.com/feeds/api/users/'+ user +'/uploads';
        pagesize = typeof(pagesize) != 'undefined' ? Number(pagesize) : 10;
        page = typeof(page) != 'undefined' ? pagesize * Number(page) + 1 : pagesize + 1;
        var params = '&start-index=' + page + '&max-results=' + pagesize;
        params += typeof(keyword) != 'undefined' ? '&q=' + encodeURIComponent(keyword) : '';
        //params += typeof(keyword) != 'undefined' ? '&q=' + encodeURI(keyword) : '';
        //params += typeof(keyword) != 'undefined' ? '&q=' + keyword : '';

        api += '?alt=json-in-script&callback=?&' + params;
        console.log(api);
        $.getJSON(api, function(json){
            //console.log(json['feed']['entry']);
            var data = json['feed']['entry'];
            for (var i = 0, l = data.length; i < l; i ++) {
                var v = data[i];
            }
        });
    }
}
