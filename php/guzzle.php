<?php

require_once './vendor/autoload.php';

/**
 * Class guzzle
 * @author Randy Chang
 */
class guzzle
{
    public function handleResponseBody(\Psr\Http\Message\ResponseInterface $response, int $index)
    {
        echo 'index = ', $index, ' response = ' . $response->getBody(), "\n";
    }
}

$client = new \GuzzleHttp\Client();

$urls = [
    'https://www.baidu.com/sugrec?prod=pc_his&from=pc_web&json=1&sid=7509_1447_32880_32706_32231_7517_7605_32117&hisdata=&_t=1603007485731&req=2&csor=0',
    'https://www.baidu.com/home/xman/data/tipspluslist?indextype=manht&_req_seqid=0xdbfa16c0001ad871&asyn=1&t=1603007493911&sid=7509_1447_32880_32706_32231_7517_7605_32117',
    'https://www.baidu.com/home/msg/data/personalcontent?num=8&indextype=manht&_req_seqid=0xdbfa16c0001ad871&asyn=1&t=1603007493918&sid=7509_1447_32880_32706_32231_7517_7605_32117',
    'http://news.baidu.com/widget?id=LocalNews&ajax=json&t=1603007608746',
];

$requests = function ($total) use ($urls) {
    foreach ($urls as $url) {
        yield new \GuzzleHttp\Psr7\Request('GET', $url);
    }
};

$helper = new guzzle();

$pool = new \GuzzleHttp\Pool($client, $requests(count($urls)), [
    'concurrency' => 3,
    'fulfilled' => function ($response, $index) use ($helper){
        $helper->handleResponseBody($response, $index);
    },
//    'fulfilled' => [guzzle::class, 'handleResponseBody'],
    'rejected' => function ($reason, $index){
        echo 'index = ', $index, ' reason = ' . $reason, "\n";
    },
]);

// 开始发送请求
$promise = $pool->promise();
$promise->wait();
