<?php

namespace ArtARTs36\B0oClient\Tests\Unit;

use ArtARTs36\B0oClient\Exceptions\GivenInvalidData;
use ArtARTs36\B0oClient\Points\ClickPoint;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountProtocol;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountRequest;
use ArtARTs36\B0oClient\Protocols\Click\GetClicksCountResponse;
use ArtARTs36\B0oClient\Tests\Mocks\MockClient;
use ArtARTs36\B0oClient\Tests\TestCase;

class ClickPointTest extends TestCase
{
    /**
     * @covers \ArtARTs36\B0oClient\Points\ClickPoint::count
     */
    public function testCount(): void
    {
        $point = new ClickPoint($client = new MockClient(), new GetClicksCountProtocol(
            new GetClicksCountRequest(),
            $responseProtocol = new GetClicksCountResponse()
        ));

        $client->setResponseData([
            $responseProtocol->count => $expectedValue = 5,
        ]);

        self::assertEquals($point->count('test'), $expectedValue);

        //

        $client->setResponse([0]);

        self::expectException(GivenInvalidData::class);

        $point->count('test');
    }
}
