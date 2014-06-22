#!/usr/local/bin/perl
use encoding "utf-8";
use Data::Dumper;

open(INPUT, "<:utf8", "eee2.md") or die("open error:$!");
my @lines = <INPUT>;
close(INPUT);
#print scalar(@lines);

my $str_input = join("", @lines);
my @arr_input = split(/#{10}/, $str_input);
#print scalar(@arr_input);
my %hash_output = ();
foreach (@arr_input) {
    my ($title, $content) = split(/#{3}/, $_);
    $title =~ /(\d+)、/;
    $title_s = $1;
    $hash_output{$title_s} = {'title' => $title, 'content' => $content};
}

#print scalar(keys(%hash_output));
my $str_output = '';
foreach my $key(sort {$a <=> $b} keys %hash_output) {
    print $key, "\n";
    $str_output .= "$hash_output{$key}{'title'}\n$hash_output{$key}{'content'}";
}

open(OUTPUT, ">:utf8", "eee3.md") or die("open error:$!");
print OUTPUT ($str_output);
close(OUTPUT);
