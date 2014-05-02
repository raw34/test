function get_videos_by_username(str) {
    var arr_input = str.split(/&/);
    var arr_allow = ['page', 'start-index', 'max-results', 'q', 'user'];
    var hash_allow = {'page' : 1, 'max-results' : 10};
    //console.log(arr_input);
    var params1 = '';
    var params2 = '';
    for (var i = 0, l = arr_input.length; i < l; i ++) {
        var temp = arr_input[i].split('=');
       // console.log(temp);
        if ($.inArray(temp[0], arr_allow) > -1) {
            arr_input[i] = /q/.test(arr_input[i]) ? temp[0] + '=' + encodeURIComponent(temp[1]) : arr_input[i];
            params1 += '&' + arr_input[i];
            hash_allow[temp[0]] = temp[1];
            if(!/page/.test(arr_input[i])){
                params2 += '&' + arr_input[i];
            }
        }
    }
    hash_allow['start-index'] = (Number(hash_allow['page']) - 1) * hash_allow['max-results'] + 1;
    params1 += '&start-index=' + hash_allow['start-index'];

    //console.log(params1);

    //?alt=json-in-script&start-index=1&max-results=50&q=%E4%B8%96%E3%81%AB%E3%82%82%E5%A5%87%E5%A6%99%E3%81%AA%E7%89%A9%E8%AA%9E';
    if (typeof(hash_allow['user']) != 'undefined') {
        var api = 'http://gdata.youtube.com/feeds/api/users/'+ hash_allow['user'] +'/uploads';
        api += '?alt=json-in-script&callback=?' + params1;

        //console.log(api);
        $.getJSON(api, function(json){
            //console.log(json['feed']['entry']);
            //console.log(json);
            var page = typeof(hash_allow['page']) != 'undefined' ? hash_allow['page'] : 1;
            var pagesize = typeof(hash_allow['max-results']) != 'undefined' ? hash_allow['max-results'] : 10;
            var total = json['feed']['openSearch$totalResults']['$t'];
            var html = '';
            if (typeof(json['feed']['entry']) != 'undefined') {
                var data = json['feed']['entry'];
                for (var i = 0, l = data.length; i < l; i ++) {
                    var title = data[i]['title']['$t'];
                    //console.log('title=' + title);
                    var arr_match = title.match(/世にも奇妙な物語 #(\d+) (.*?$)/);
                    //console.log(arr_match);
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
                //console.log(html);
                $('#video_list').append(html);
                //$('#video_list').html(html);
                var p = new getPage(total, pagesize, page, 5, params2, 'get_videos_by_username');
                //console.log(p);
                $('#pagination').html(p.html);
            }
        });
    }
}
