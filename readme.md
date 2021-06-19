### B0o.Ru Client
---

> Installation:

`composer require artarts36/b0o-client`

---

#### Examples

* Cut Link:

```php
$api = new \ArtARTs36\B0oClient\Api(new \ArtARTs36\B0oClient\Client());

var_dump($api->link()->cut('http://google.ru'));
```

