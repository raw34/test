//约瑟夫环
function josehpus1(n, m) {
    var a = [];
    for (var i = 1; i <= n; i ++) {
        a.push(i)
    }
    var i = 1;
    while (a.length > 1) {
        var x = a.shift();
        if (i % m != 0) {
            a.push(x);
        } else {
            console.log('- ' + x + ' = ' + a);
        }
        i++;
    }
    return a[0];
}

function josehpus2(n, m) {
    var s = 0;
    for (var i = 2; i <= n; i ++) {
        s = (s + m) % i;
    }
    return s + 1;
}

//console.log(josehpus1(10, 7));
//console.log(josehpus2(10, 7));

//分页类
function getPage(total, pageSize, page, show, columns, fun, prefix){
    //var this = this;
    console.log('total =' + total);
    console.log('pagesize = ' + pageSize);
    console.log('page = ' + page);
    this.total = total;//数据总条数，必选
    this.pageSize = pageSize;//每页显示数据条数，必选
    this.page = page != undefined ? Number(page) : 1;//当前页号
    this.show = show != undefined ? show : 10;//显示页数
    this.columns = columns != undefined ? columns : '';//其他参数字串
    this.fun = fun != undefined ? fun : 'getList';//数据列表函数名
    this.prefix = prefix != undefined ? prefix : window.location.href.split('?')[0];//url前缀
    this.omitLeft = false;
    this.omitRight = false;
    if(typeof getPage.prototype._initialized === "undefined"){
        //获取最大页号
        getPage.prototype.getMaxPage = function(){
            return Math.ceil(this.total / this.pageSize);
        }
        //获取偏移量
        getPage.prototype.getOffset = function(){
            return (this.page - 1)*this.pageSize;
        }
        //获取&nbsp;
        getPage.prototype.getPrev = function(){
            if(this.page <= 1){
                this.page = 1;
                return false;	
            }else{
                return this.page - 1;
            }	
        }
        //获取&nbsp;
        getPage.prototype.getNext = function(){
            if(this.page >= this.maxPage){
                this.page = this.maxPage;
                return false;
            }else{
                return this.page + 1;
            }
        }
        //获取开始数据条数
        getPage.prototype.getStart = function(){
            return this.offset * this.pagesize + 1;
        }
        //获取结束数据条数
        getPage.prototype.getEnd = function(){
            return (this.offset + 1) * this.pagesize
        }
        //获取循环开始结束位置
        getPage.prototype.getPos = function(){
            var i,num;
            if(this.maxPage <= this.show  + 4){
                i = 1;
                num = this.maxPage;
            }else if(this.page <= this.show){
                i = 1;
                num = Math.ceil(this.show * 1.25);
                this.omitRight = true;
            }else if(this.page > this.maxPage - this.show){
                i = this.maxPage - Math.floor(this.show * 1.25);
                num = this.maxPage;
                this.omitLeft = true;
            }else{
                num = this.offset / this.pageSize + Math.ceil(this.show / 2);
                i = num - this.show;
                this.omitLeft = true;
                this.omitRight = true;
            }
            return [i,num];
        }
        //拼接分页信息代码
        getPage.prototype.getHTML = function(){
            var i =this.pos[0],
            len = this.pos[1],
            col = this.columns,
            fun = this.fun,
            html = '';
            //console.log(i+'=='+len);
            if(this.page == 1){
                //html += '<a href="javascript:void(0)" id="firstpage">首页</a>';
                html += ' <a href="javascript:void(0)" id="firstpage" class="prev disabled">&nbsp;</a> ';
            }else{
                //html += '<a href="'+this.prefix+'?page=1&'+col+'" target="_self">首页</a>';
                //html += '<a href="'+this.prefix+'?page='+this.prev+'&'+col+'" target="_self" id="prepage">&nbsp;</a> ';
                html += ' <a href="javascript:'+fun+'('+"'page="+this.prev+"&"+col+"'"+')" target="_self" class="prev">&nbsp;</a>';
            }
            if(this.omitLeft){
                //html += '<a href="'+this.prefix+'?page=1&'+col+'" target="_self">1</a> ';
                html += ' <a href="javascript:'+fun+'('+"'page=1&"+col+"'"+')" target="_self">1</a> ';
                html += i > 2 ? ' <span class="break">...</span> ' : '';
            }
            while(i <= len){
                //console.log(i);
                if(i == this.page){
                    html += ' <a href="javascript:void(0)" target="_self" class="current">'+i+'</a> ';
                }else{
                    //html += '<a href="'+this.prefix+'?page='+i+'&'+col+'" target="_self">'+i+'</a> ';
                    html += ' <a href="javascript:'+fun+'('+"'page="+i+"&"+col+"'"+')" target="_self">'+i+'</a>';
                }
                i++;
            }
            //console.log(len);
            //console.log(Math.ceil(this.show * 0.25));
            if(this.omitRight){
                html += this.maxPage - len > 1 ? ' <span class="break">...</span> ' : '';
                //html += '<a href="'+this.prefix+'?page='+this.maxPage+'&'+col+'" target="_self">'+this.maxPage+'</a> ';
                html += ' <a href="javascript:'+fun+'('+"'page="+this.maxPage+'&'+col+"'"+')" target="_self">'+this.maxPage+'</a> ';
            }
            if(this.page != this.maxPage){
                html += ' <a href="javascript:'+fun+'('+"'page="+this.next+"&"+col+"'"+')" target="_self" class="next">&nbsp;</a>';
                //html += '<a href="'+this.prefix+'?page='+this.next+'&'+col+'" target="_self" id="nextpage">&nbsp;</a> ';
                //html += '<a href="'+this.prefix+'?page='+this.maxPage+'&'+col+'" target="_self">末页</a>';
            }else{
                html += ' <a href="javascript:void(0)" id="lastpage" class="next disabled">&nbsp;</a> ';
                //html += '<a href="javascript:void(0)" id="lastpage">末页</a>';
            } 
            if(this.maxPage > this.show){
                //html += ' 共'+this.maxPage+'页';
            }
            return html;
        }
        getPage.prototype._initialized = true; 
    }
    this.maxPage = this.getMaxPage();
    this.offset = this.getOffset();
    this.prev = this.getPrev();
    this.next = this.getNext();
    this.start = this.getStart();
    this.end = this.getEnd();
    this.pos = this.getPos();
    this.html = this.getHTML();
}
