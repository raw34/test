//约瑟夫问题
function josehpus(a, n) {
    var i = 1;
    while (a.length > 1) {
        var x = a.shift();
        if (i % n != 0) {
            a.push(x);
        } else {
            console.log('- ' + x + ' = ' + a);
        }
        i++;
    }
    return a[0];
}
var arr = [1, 2, 3, 4, 5, 6, 30, 20, 40, 50];
console.log(josehpus(arr, 7));

