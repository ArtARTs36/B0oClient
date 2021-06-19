## B0o.Ru Client

---

Installation:

`composer require artarts36/b0o-client`

---

### Features

* Cut Link:

```php
$api = new \ArtARTs36\B0oClient\Api(new \ArtARTs36\B0oClient\Client());

var_dump($api->link()->cut('http://google.ru'));
```

* Get clicks count:

```php
$api = new \ArtARTs36\B0oClient\Api(new \ArtARTs36\B0oClient\Client());

$link = $api->link()->cut('http://google.ru');

var_dump($api->click()->count($link));
```

