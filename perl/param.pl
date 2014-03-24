#
use Data::Dumper;

sub test {
    my $type = pop;
    my ($size, @data) = @_;
    #print $type;
    print Dumper (@data);
}

my @data = (1, 3, 54,3);
test(3, @data);
