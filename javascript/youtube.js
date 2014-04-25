function get_videos_by_username(user, keyword, page, pagesize) {
    //?alt=json-in-script&start-index=1&max-results=50&q=%E4%B8%96%E3%81%AB%E3%82%82%E5%A5%87%E5%A6%99%E3%81%AA%E7%89%A9%E8%AA%9E';
    if (typeof(user) != 'undefined') {
        var api = 'http://gdata.youtube.com/feeds/api/users/'+ user +'/uploads';
        var params1 = typeof(keyword) != 'undefined' ? '&q=' + encodeURIComponent(keyword) : '';
        var params2 = '' + params1;
        page = typeof(page) != 'undefined' ? pagesize * (Number(page) - 1) + 1 : 1;
        params1 += '&start-index=' + page;
        pagesize = typeof(pagesize) != 'undefined' ? Number(pagesize) : 10;
        params1 += '&max-results=' + pagesize;
        params2 += '&max-results=' + pagesize;
        //params1 += typeof(keyword) != 'undefined' ? '&q=' + encodeURI(keyword) : '';
        //params1 += typeof(keyword) != 'undefined' ? '&q=' + keyword : '';

        api += '?alt=json-in-script&callback=?' + params1;
        //console.log(api);
        $.getJSON(api, function(json){
            //console.log(json['feed']['entry']);
            //console.log(json);
            var total = json['feed']['openSearch$totalResults']['$t'];
            var data = json['feed']['entry'];
            var html = '';
            for (var i = 0, l = data.length; i < l; i ++) {
                var title = data[i]['title']['$t'];
                var arr_match = title.match(/世にも奇妙な物語 #(\d+) (.*?$)/);
                if (arr_match != null && arr_match.length > 2) {
                    var index = arr_match[1];
                    title = arr_match[2];
                    html += '<dd>';
                    html += '    <span>'+ index +'</span>';
                    html += '    <span>'+ title +'</span>';
                    html += '    <span>'+ data[i]['media$group']['media$thumbnail'][0]['url'] +'</span>';
                    html += '    <span>'+ data[i]['link'][0]['href'] +'</span>';
                    html += '    <span>'+ data[i]['media$group']['media$content'][0]['url'] +'</span>';
                    html += '</dd>';
                }
            }
            $('#video_list').append(html);
            var p = new getPage(total, pagesize, page, 5, params2, 'get_videos_by_username');
            //console.log(p);
            $('#pagination').html(p.html);
        });
    }
}
