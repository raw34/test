#
use Data::Dumper;
my %hash = ();
push (@{$hash{'key1'}}, 'test');
print Dumper(%hash);
