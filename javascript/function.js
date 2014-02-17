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

console.log(josehpus1(10, 7));
console.log(josehpus2(10, 7));
