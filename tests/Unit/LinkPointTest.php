<?php

namespace ArtARTs36\B0oClient\Tests\Unit;

use ArtARTs36\B0oClient\Points\LinkPoint;
use ArtARTs36\B0oClient\Protocols\Link\CutLinkProtocol;
use ArtARTs36\B0oClient\Protocols\Link\CutLinkRequest;
use ArtARTs36\B0oClient\Protocols\Link\CutLinkResponse;
use ArtARTs36\B0oClient\Tests\Mocks\MockClient;
use ArtARTs36\B0oClient\Tests\TestCase;

class LinkPointTest extends TestCase
{
    /**
     * @covers \ArtARTs36\B0oClient\Points\LinkPoint::cut
     */
    public function testCut(): void
    {
        $point = new LinkPoint($client = new MockClient(), new CutLinkProtocol(
            new CutLinkRequest(),
            new CutLinkResponse()
        ));

        $client->setResponseData([
            'urlStat' => 'link1',
            'short' => 'http://b0o.ru/1234',
            'urlQrImage' => 'link3',
        ]);

        $link = $point->cut('http://google.ru');

        self::assertEquals('link1', $link->statUrl);
        self::assertEquals('http://b0o.ru/1234', $link->shortUrl);
        self::assertEquals('link3', $link->qrUrl);
        self::assertEquals('1234', $link->code);
    }
}
