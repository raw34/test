#
my $str1 = '';
my $num1 = 10;

if ($str1 > $num1) {
    print 'str1 > num1';
}
elsif ($str1 < $num1) {
    print 'str1 < num1';
}
else {
    print 'nothing';
}

my $str2 = 'xxxx';

my @arr1 = split('-', $str2);
print 'arr1[0] = ', $arr1[0];

