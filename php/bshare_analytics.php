<?php
/**
 * bshare数据接口封装
 */
class bShareAnalytics
{
    //站长uuid
    private $_uuid;
    
    //secret key
    private $_secret;

    //验证信息
    private $_basicAuth;

    //api前缀
    private $_baseUrl = 'http://api.bshare.cn';

    //支持的api标识
    private $_metric_array = array(
        'platform', //返回前10位的分享平台数据。包括分享总数和平台名称。
        'platform_b', //返回前10位的分享平台数据。包括回流总数和平台名称。  
        'stats', //返回点击数、分享数和回流数及日期。
        'click', //返回点击数和日期。 
        'share', //返回分享数和日期。  
        'clickback',//返回回流数和日期。  
        'page', //返回分享次数, 批量。
    );

    //api标识
    private $_metric;

    //api类型
    private $_type;

    //api地址
    private $_api;

    /**
     * 构造函数
     *
     * @param string $metric    接口标识
     * @param string $uuid      bshare站长uid，默认为汽车频道
     * @param string $secret    bshare账号密钥，默认为汽车频道
     * @param string $basicAuth bsahre账号登陆名和密码，默认为汽车频道
     */
    public function __construct(
        $metric,
        $uuid = 'c0ea9c02-1624-42d0-9160-cab1f601cc39',
        $secret = '40b40081-e83b-4721-b670-119587b6cd2d',
        $basicAuth = 'autosinacomcn@163.com:autosina163'
    )
    {
        $this->_uuid = isset($uuid) && !empty($uuid) ? $uuid : $this->_uuid;
        $this->_secret = isset($secret) && !empty($secret) ? $secret : $this->_secret;
        $this->_baseUrl = isset($baseUrl) && !empty($baseUrl) ? $baseUrl : $this->_baseUrl;
        $this->_basicAuth = isset($basicAuth) && !empty($basicAuth) ? $basicAuth : $this->_basicAuth;
        $this->_metric = $metric;
        $this->_type = $metric != 'page' ? 'v2' : 'v1';
        $this->setMetric();
    }

    /**
     * 设置接口地址 
     */
    public function setMetric()
    {
        if ($this->_type == 'v1') {
            $this->_api = '/analytics/' . $this->_uuid . '/' . $this->_metric . '.json';
        } else if ($this->_type == 'v2') {
            $this->_api = '/analytics/' . $this->_metric . '.json';
        }
    }

    /**
     * 签名生成，v2版接口需要签名认证
     */
    public function addSign($params, $secret, $timestamp)
    {
        $params = array_merge($params, array('ts' => $timestamp));
        ksort($params);
        $params_new = '';
        foreach ($params as $k => $v) {
            $params_new .= $k . '=' . urldecode($v);
        }
        $params_new .= $secret;
        return md5($params_new);
    }
    
    /**
     * 拼装参数列表
     */
    public function getQueryString($params)
    {
        $query = '';
        foreach ($params as $key => $value) {
            $query .= '&' . $key . '=' . urlencode($value);
        }
        return substr($query, 1);
    }

    /**
     * 解码返回数据
     */
    public function decodeResponse($response)
    {
        $response = json_decode($response);
        $response_new = array();
        foreach ($response as $k => $v) {
            $response_new[urldecode($k)] = $v;
        }
        return $response_new;
    }

    /**
     * 发送请求
     *
     * @param array $params 请求参数数组，可传参数名称：
     *    ts => 时间戳， 
     *    locale => 地区（zh/en）,
     *    datestart => 开始时间（2013-01-01）,
     *    dateend => 结束时间（2013-12-31）,
     *    url => 单条url，
     *    urls => 批量url，用|隔开，只有在method=page的时候可用, 为避免请求字节数超标，每次请求要少于20个url
     */
    public function doGet($params)
    {
        if ($this->_type == 'v2') {
            $params['publisherUuid'] = $this->_uuid;
            $params = array_merge($params, array('sig' => $this->addSign($params, $this->_secret, $params['ts'])));
        }
        $this->_api .= '?' . $this->getQueryString($params);
        //echo '<br/>', $this->_api;
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_USERPWD, $this->_basicAuth);
        curl_setopt($handle, CURLOPT_URL, $this->_baseUrl . $this->_api);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLINFO_HEADER_OUT, true);
        curl_setopt($handle, CURLOPT_VERBOSE, true); 
        //curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
        //curl_setopt($handle, CURLOPT_UNRESTRICTED_AUTH, true);
        //$response = curl_exec($handle);
        $response = curl_exec_follow($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        return array('code' => $code, 'response' => $this->decodeResponse($response));
    }
}

if (isset($_REQUEST['method']) && !empty($_REQUEST['method'])) {
    $method = $_REQUEST['method'];
    $bshare = new bShareAnalytics($method);
    $params = array();
    $params['ts'] = time() . '000';
    $params['locale'] = isset($_REQUEST['locale']) ? $_REQUEST['locale'] : 'zh';
    $params['dateStart'] = isset($_REQUEST['datestart']) ? $_REQUEST['datestart'] : null;
    $params['dateEnd'] = isset($_REQUEST['dateend']) ? $_REQUEST['dateend'] : null;
    $params['url'] = isset($_REQUEST['url']) ? $_REQUEST['url'] : null;
    $urls = $_REQUEST['urls'];
    if
    $params['urls'] = isset($_REQUEST['urls']) ? $_REQUEST['urls'] : null;
    //echo '<pre>'; var_dump($params); echo '</pre>';
    $response = $bshare->doGet($params);
    //echo '<pre>'; var_dump($response); echo '</pre>';
    $response_json = json_encode($response);
    if (isset($_REQUEST['callback']) && !empty($_REQUEST['callback'])) { 
        echo $_REQUEST['callback'] . '('. $response_json .')';
    } else {
        echo $response_json; 
    }
}


//为解决 CURLOPT_FOLLOWLOCATION cannot be activated when safe_mode is enabled or an open_basedir is set 问题,不用curl_exec
function curl_exec_follow(/*resource*/ $ch, /*int*/ &$maxredirect = null) { 
    $mr = $maxredirect === null ? 5 : intval($maxredirect); 
    if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) { 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $mr > 0); 
        curl_setopt($ch, CURLOPT_MAXREDIRS, $mr); 
    } else { 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); 
        if ($mr > 0) { 
            $newurl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); 

            $rch = curl_copy_handle($ch); 
            curl_setopt($rch, CURLOPT_HEADER, true); 
            curl_setopt($rch, CURLOPT_NOBODY, true); 
            curl_setopt($rch, CURLOPT_FORBID_REUSE, false); 
            curl_setopt($rch, CURLOPT_RETURNTRANSFER, true); 
            do { 
                curl_setopt($rch, CURLOPT_URL, $newurl); 
                $header = curl_exec($rch); 
                if (curl_errno($rch)) { 
                    $code = 0; 
                } else { 
                    $code = curl_getinfo($rch, CURLINFO_HTTP_CODE); 
                    if ($code == 301 || $code == 302) { 
                        preg_match('/Location:(.*?)\n/', $header, $matches); 
                        $newurl = trim(array_pop($matches)); 
                    } else { 
                        $code = 0; 
                    } 
                } 
            } while ($code && --$mr); 
            curl_close($rch); 
            if (!$mr) { 
                if ($maxredirect === null) { 
                    trigger_error('Too many redirects. When following redirects, libcurl hit the maximum amount.', E_USER_WARNING); 
                } else { 
                    $maxredirect = 0; 
                } 
                return false; 
            } 
            curl_setopt($ch, CURLOPT_URL, $newurl); 
        } 
    } 
    return curl_exec($ch); 
}
