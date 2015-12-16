<?php

namespace Zimbra\Tests\Soap;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Zimbra\Soap\Client\Http as ClientHttp;

class LocalClientHttp extends ClientHttp
{
    public function __doRequest($request, array $headers = array())
    {
        $this->headers = $headers;
        $this->emit('before.request', array(&$request, &$headers));
        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n"
            .'<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:enc="http://www.w3.org/2003/05/soap-encoding">'
                .'<soap:Body xmlns:rpc="http://www.w3.org/2003/05/soap-rpc">'
                    .'<TestResponse>'
                        .'<foo>foo</foo>'
                        .'<bar>bar</bar>'
                    .'</TestResponse>'
                .'</soap:Body>'
            .'</soap:Envelope>';
        $stream = Psr7\stream_for($xml);
        return new HttpResponse(200, array(), $stream);
    }
}
