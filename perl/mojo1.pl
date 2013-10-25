use Mojo::UserAgent;
use 5.010;
use Mojo::UserAgent::CookieJar;
use YAML 'Dump';
use Encode qw(decode encode decode_utf8 encode_utf8);
use Mojo::IOLoop;
use File::Spec;
use File::Basename;

my $feed = shift;
my $ua   = Mojo::UserAgent->new;
$ua->name(
    'Mozilla/5.0 (Macintosh; '.
    'Intel Mac OS X 10_8_5) AppleWebKit/537.36 '.
    '(KHTML, like Gecko) Chrome/29.0.1547.76 Safari/537.36'
);

# first get baidu index,get first cookie
say $ua->get('http://www.baidu.com/')->res->code;

=pod
var bdPass=bdPass||{};
bdPass.api=bdPass.api||{};
bdPass.api.params=bdPass.api.params||{};
bdPass.api.params.login_token='0be08e1d5fa566d2562715a4083ece70';
=cut

my ($token) = $ua->get(
    'http://passport.baidu.com/v2/api/?getapi&class=login&tpl=mn&tangram=true')
    ->res->body =~ m{login_token\s*=\s*'(.+?)'}six;
say "token => $token";

my $staticpage = "http://www.baidu.com/cache/user/html/jump.html";
my $login_url  = "http://passport.baidu.com/v2/api/?login";
my $user       = '492003149@qq.com';
my $password   = 'qq123456';

my $post_form = {
    charset    => 'utf-8',
    token      => $token,
    isPhone    => "false",
    index      => "0",
    staticpage => $staticpage,
    logintype  => "1",
    'tpl'      => "mn",
    'callback' => "parent.bdPass.api.login._postCallback",
    'username' => $user,
    'password' => $password,
    'mem_pass' => "on",
};

# cookies must contain 'BDUSS', 'PTOKEN', 'STOKEN', 'SAVEUSERID'
my $tx = $ua->post( $login_url => form => $post_form );
if ( $tx->success ) {
    say "get cookie as :";
    say Dump $tx->res->cookies;
}

# now,let's go to validate this cookie,get music.baidu and parse the mp3
# download address,if you do not login,you can't download the high rate file
# but take the cookie will be ok!

my @songs    = ();
my $base_url = "http://music.baidu.com";

# find every song's mp3 and album name,title

=pod
<span class="song-title " style="width: 185px;">
<a href="/song/7317902" title="相思风雨中"> 相思风雨中 </a> <a title="歌曲MV" target="_blank" href="/mv/7317902" class="mv-icon"></a> 
</span>
<span class="album-title" style="width: 130px;"> <a href="/album/7311811" title="广东经典101">《广东经典101》</a>        </span>
=cut

for my $e (
    $ua->get($feed)->res->dom->charset('UTF-8')->find('div.song-item')->each )
{
    my $node = $e->find('span.[class="song-title "] > a')->first;
    my ( $href, $song_id ) = $node->{href} =~ m/(.*?(\d+))/;
    next unless $song_id;
    my $song_url = $base_url . $href;
    push @songs, {
        link => $song_url,
        name => $node->{title},

# [url]http://music.baidu.com/song/265898/download?__o=%2Fsong%2F265898[/url]
        download_urls =>
        fetch_mp3_download( $song_url . "/download?__o=/song/$song_id" ),
    };
}

download_mp3( \@songs, '/tmp' );
say Dump( \@songs );

sub download_mp3 {
    my ( $download_info, $path ) = @_;

    for my $s (@$download_info) {
        for my $d ( @{ $s->{download_urls} } ) {
            my $abs_path = File::Spec->catfile( $path, $s->{name} );
            my $file = File::Spec->catfile( $abs_path,
                $d->{rate} . "_" . $s->{name} . "mp3" );
            if ( not -d $abs_path ) {
                mkdir $abs_path;
            }
            my $tx = $ua->get( $d->{download_url} );
            $tx->res->content->asset->move_to($file);
            $d->{downloaded_mp3} = $file if -e $file;
        }
    }
}

sub fetch_mp3_download {
    my ($url) = @_;
    my $tx = $ua->get($url);
    my @downloads;

    if ( $tx->success ) {
        for my $e ( $tx->res->dom->find('a')
            ->grep( sub { index( $_->{href}, 'mp3' ) != -1 } )->each )
        {
            push @downloads, {
                rate         => $e->{id} . "k",
                download_url => sub { my ($l) = $e->{href} =~ m{link=(.*)}six }
                ->(),
            };
        }
    }
    else {
        say "got download box failed";
    }

    return \@downloads;
}
