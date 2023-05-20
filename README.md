## Snow Valet

A modified version of Laravel Valet that adds **some** support for multiple TLDs.

## See Official Documentation

Documentation for Valet can be found on the [Laravel website](https://laravel.com/docs/valet).

## Installation

Edit `~/.composer/composer.json`

```
{
    "repositories": {
        "snowlaboratory/valet": {
            "type": "vcs",
            "url": "https://github.com/SnowLaboratory/valet.git"
        }
    },
    "require": {
        "laravel/valet": "dev-master",
    }
}
```

run `composer global update` 

See official documentation then modify `~/.config/valet/config.json`

make your config include the `tlds` key. Example below:
```
[
    "tld" => "test",
    "tlds" => [
        "test",
        "dev",
        "review",
        "qa",
    ],
    "loopback": "127.0.0.1",
    "paths": [
        "/Users/john/.config/valet/Sites"
    ]
]
```

## Differences

Adds ability to link site while specifying a tld

```
valet link mysite --secure --tld=review
```

adds ability to proxy while specifying a tld

```
valet proxy mysite https://localhost:3000 --secure --tld=review
```
