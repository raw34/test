#
use Data::Dumper;

sub foo1 {
    my ($hash) = @_;
    print Dumper($hash);
    print $hash->{'hash'}->{'a'};
}

my @data = (1, 3, 4);
my %hash = ('a' => 11, 'b' => 22);
foo1({'title' => 'xxxx', 'id' => 11, 'data' => \@data, 'hash' => \%hash});
