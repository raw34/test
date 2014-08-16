#!/usr/bin/perl

#==============
# Date: 2012-11-03
# User: wcdj
#==============

use Socket;
use Carp;
use FileHandle;

# [1] use port 8080 by default, unless overridden on command line
$port = (@ARGV ? $ARGV[0] : 8080);

# [2] create local TCP socket and set it to listen for connections
$proto = getprotobyname('tcp');
socket(S, PF_INET, SOCK_STREAM, $proto) || die;
setsockopt(S, SOL_SOCKET, SO_REUSEADDR, pack("l", 1)) || die;
bind(S, sockaddr_in($port, INADDR_ANY)) || die;
listen(S, SOMAXCONN) || die;

# [3] print a startup message
printf("<<< perl_web_svr accepting on port %d >>>\n\n", $port);

while (1)
{
    # [4] wait for a connection C(Client)
    $cport_caddr = accept(C, S);
    ($cport, $caddr) = sockaddr_in($cport_caddr);
    C->autoflush(1);

    # [5] print who the connection is from
    $cname = gethostbyaddr($caddr, AF_INET);
    printf("<<< request from [%s] >>>\n", $cname);

    # [6] read request msg until blank line, and print on screen
    while ($line = <C>)
    {
        print $line;
        if ($line =~ /^\r/) {last; }
    }

    # [7] prompt for response msg, and input response lines,
    #     sending response lines to client, until solitary "."
    printf("<<< type response followed by '.' >>>\n");

    while ($line = <STDIN>)
    {
        $line =~ s/\r//;
        $line =~ s/\n//;
        if ($line =~ /^\./) {last; }
        print C $line . "\r\n";
    }
    close(C);
}
