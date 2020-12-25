<?php 
namespace Ihorhnatchuk\LKClient\Exception;

use Exception;

class KClientError extends Exception
{
    const ERROR_UNKNOWN = 'UNKNOWN';

    public function getHumanCode()
    {
        switch ($this->getCode()) {
            case CURLE_HTTP_RETURNED_ERROR:
                preg_match(
                    "/The requested URL returned error: (?'errorCode'\d+).*$/",
                    $this->getMessage(),
                    $matches
                );

                $errorCode = isset($matches['errorCode']) ? $matches['errorCode'] : 'HTTP_ERROR_'.self::ERROR_UNKNOWN;
                return "[REQ_ERR: {$errorCode}]";
            case CURLE_UNSUPPORTED_PROTOCOL:
                return "[REQ_ERR: UNSUPPORTED_PROTOCOL]";
            case CURLE_FAILED_INIT:
                return "[REQ_ERR: FAILED_INIT]";
            case CURLE_URL_MALFORMAT:
                return "[REQ_ERR: BAD_URL]";
            case CURLE_COULDNT_RESOLVE_PROXY:
                return "[REQ_ERR: COULDNT_RESOLVE_PROXY]";
            case CURLE_COULDNT_RESOLVE_HOST:
                return "[REQ_ERR: COULDNT_RESOLVE_HOST]";
            case CURLE_COULDNT_CONNECT:
                return "[REQ_ERR: COULDNT_CONNECT]";
            case CURLE_PARTIAL_FILE:
                return "[REQ_ERR: PARTIAL_FILE]";
            case CURLE_READ_ERROR:
                return "[REQ_ERR: READ_ERROR]";
            case CURLE_OUT_OF_MEMORY:
                return "[REQ_ERR: OUT_OF_MEMORY]";
            case CURLE_OPERATION_TIMEDOUT:
                return "[REQ_ERR: OPERATION_TIMEDOUT]";
            case CURLE_HTTP_POST_ERROR:
                return "[REQ_ERR: HTTP_POST_ERROR]";
            case CURLE_BAD_FUNCTION_ARGUMENT:
                return "[REQ_ERR: BAD_FUNCTION_ARGUMENT]";
            case CURLE_TOO_MANY_REDIRECTS:
                return "[REQ_ERR: TOO_MANY_REDIRECTS]";
            case CURLE_GOT_NOTHING:
                return "[REQ_ERR: GOT_NOTHING]";
            case CURLE_SEND_ERROR:
                return "[REQ_ERR: SEND_ERROR]";
            case CURLE_RECV_ERROR:
                return "[REQ_ERR: RECV_ERROR]";
            case CURLE_BAD_CONTENT_ENCODING:
                return "[REQ_ERR: BAD_CONTENT_ENCODING]";
            case CURLE_SSL_CACERT:
            case CURLE_SSL_CACERT_BADFILE:
            case CURLE_SSL_CERTPROBLEM:
            case CURLE_SSL_CIPHER:
            case CURLE_SSL_CONNECT_ERROR:
            case CURLE_SSL_ENGINE_NOTFOUND:
            case CURLE_SSL_ENGINE_SETFAILED:
            case CURLE_SSL_PEER_CERTIFICATE:
            case CURLE_SSL_PINNEDPUBKEYNOTMATCH:
                return "[REQ_ERR: SSL]";
            case CURLE_OK:
                return '';
            default:
                return "[REQ_ERR: " . self::ERROR_UNKNOWN . "]";
        }
    }
}