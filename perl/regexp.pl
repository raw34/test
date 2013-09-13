#
my $str1 = 'ÖÐÎÄ111@0#';
my $str2 = '32302304((##';


if ($str1 =~ /([\x80-\xFF][\x80-\xFF])/) {
    print "\n", $1;
    print "\nchinese3";
}

if ($str2 =~ /([\x80-\xFF][\x80-\xFF])/) {
    print "\nchinese4";
}

=pod
if ($str1 =~ /([\x80-\xFF])/) {
    print "\nchinese5";
}

if ($str1 =~ /[\u4e00-\u9fa5]/) {
    print "\nchinese1";
}

if ($str2 =~ /[\u4e00-\u9fa5]/) {
    print "\nchinese2";
}
=cut
