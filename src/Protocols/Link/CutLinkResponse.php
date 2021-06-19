<?php

namespace ArtARTs36\B0oClient\Protocols\Link;

use ArtARTs36\B0oClient\Protocols\Protocol;

class CutLinkResponse extends Protocol
{
    public $statUrl = 'urlStat';

    public $shortUrl = 'short';

    public $qrUrl = 'urlQrImage';
}
