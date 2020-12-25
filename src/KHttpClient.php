<?php 

namespace Ihorhnatchuk\LKClient;

use Ihorhnatchuk\LKClient\Exception\KClientError;

class KHttpClient
{
    const UA = 'KHttpClient';

    public function request($url, $params, $opts = array())
    {
        if (!function_exists('curl_init')) {
            die('[KClient] Extension \'php_curl\' must be installed');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_COOKIE, isset($opts['cookies']) ? $opts['cookies'] : null);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_USERAGENT, self::UA);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($ch);
        if (curl_error($ch)) {
            throw new KClientError(curl_error($ch), curl_errno($ch));
        }

        if (empty($result)) {
            throw new KClientError('Empty response');
        }
        return $result;
    }
}