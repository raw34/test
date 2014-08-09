#!/usr/local/bin/perl
use encoding "utf-8";
use Encode;
use Data::Dumper;

open(INPUT, "<:utf8", "lamp8.md") or die("open error:$!");
my @lines = <INPUT>;
close(INPUT);
#print scalar(@lines);

my $str_input = join("", @lines);
my @arr_input = split('---', $str_input);
my %hash_output = ();
my @arr_output = ();
my $str_output = '';
my $i = 0;
foreach (@arr_input) {
    #$_ =~ /#(\d{1,3})、(.*?([A-Z]$))/;
    $_ =~ /\n#(\d{1,3})、.*?([A-Z])[\r\n]/;
    my $order = $1;
    my $type = $2;
    $_ =~ s/#$order/#$i/;
=pod
    if ($i >= 200) {
        print "\norder = ", $order, ' type = ', $type;
    }
    my $key = $_ =~ /undone/i ? $i + 1000000 : $i;
    print "\n", $key;
    $arr_output[$key] = $_;
=cut
    if ($type ne '') {
        $hash_output{$type}[$i] = $_;
    }
    $i++;
}

=pod
    #undone延后
    $str_output = join("---\n", @arr_output);
    open(OUTPUT, ">:utf8", "lamp8.md") or die("open error:$!");
    print OUTPUT ($str_output);
    close(OUTPUT);
=cut

#print Dumper(%hash_output);

foreach my $type(keys(%hash_output)) {
    print "\ntype = ", $type;
    $str_output = join('', @{$hash_output{$type}});;
    open(OUTPUT, ">:utf8", "$type.md") or die("open error:$!");
    print OUTPUT ($str_output);
    close(OUTPUT);
}
