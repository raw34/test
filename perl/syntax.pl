use Data::Dumper;
=pod
    #map test
    my @allow = ('aa', 'bb');
    my $title = 'cccc';
    my $res = map($title =~ $_ ? 1 : 0, @allow);
    print Dumper(@res);
    print $res;
=cut

my $str = 'aaa';
if ($str > 0) {
    print "gt0\n",
}
else {
    print "not gt0\n",
}


