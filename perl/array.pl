#
use Data::Dumper;

my @data = (0..5);
$data[0] = [22, 665];
$data[2] = [100, 200];
$data[4] = 11;

my @a = shift(@data);
print Dumper(@a);
print $a[0];
#my ($x, $y) = @a;
#my $x = shift(@a);
#print Dumper($x);
#print $y;
#print $a->{0};
#print ref($a);
#print Dumper(@data);

=pod
foreach (@data) {
    print $_;
    if (ref($_) eq 'SCALAR') {
        print "scalar\n";
    }
    else {
        print "\n";
    }
}
=cut


sub get_array_from_fun {
    return [22, 33];
}

my @d = get_array_from_fun();

#print Dumper(@d);
#
my $len = 6;
my @arr = (1..$len);
print scalar(@arr);
