Endroid OpenWeatherMap Bundle
=============================

*By [endroid](http://endroid.nl/)*

[![Build Status](https://secure.travis-ci.org/endroid/EndroidOpenWeatherMapBundle.png)](http://travis-ci.org/endroid/EndroidOpenWeatherMapBundle)
[![Latest Stable Version](https://poser.pugx.org/endroid/openweathermap-bundle/v/stable.png)](https://packagist.org/packages/endroid/openweathermap-bundle)
[![Total Downloads](https://poser.pugx.org/endroid/openweathermap-bundle/downloads.png)](https://packagist.org/packages/endroid/openweathermap-bundle)

This bundle enables you to use Endroid [`OpenWeatherMap`](https://github.com/endroid/OpenWeatherMap) as a service in your Symfony project.
It also provides an API controller that takes a local API request, adds the API key (APPID) to it and returns the corresponding
OpenWeatherMap API response. This enables you to expose the OpenWeatherMap API on your own domain without having to bother about passing your
API key on every request and creating a new instance each time you make a request.

For more information see the [endroid/OpenWeatherMap](https://github.com/endroid/OpenWeatherMap) repository and the [OpenWeatherMap API](http://openweathermap.org/API).

[![knpbundles.com](http://knpbundles.com/endroid/EndroidOpenWeatherMapBundle/badge-short)](http://knpbundles.com/endroid/EndroidOpenWeatherMapBundle)

## Requirements

* Symfony
* Dependencies:
 * [`Buzz`](https://github.com/kriswallsmith/Buzz)
 * [`OpenWeatherMap`](https://github.com/endroid/OpenWeatherMap)

## Installation

### Add in your composer.json

```js
{
    "require": {
        "endroid/openweathermap-bundle": "dev-master"
    }
}
```

### Install the bundle

``` bash
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar update endroid/openweathermap-bundle
```

Composer will install the bundle to your project's `vendor/endroid` directory.

### Enable the bundle via the kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Endroid\Bundle\OpenWeatherMapBundle\EndroidOpenWeatherMapBundle(),
    );
}
```

## Configuration

### config.yml

```yaml
endroid_open_weather_map:
    api_key: "..."
    api_url: "..." // optional
    units: "..." // optional
```

## Routing

If you don't want to expose the OpenWeatherMap API via your application, you can skip this section.

``` yml
EndroidOpenWeatherMapBundle:
    resource:	"@EndroidOpenWeatherMapBundle/Controller/"
    type:		annotation
    prefix:		/openweathermap/api
```

This exposes the OpenWeatherMap API via <yourdomain>/openweathermap/api. This means that instead of sending a request to
http://api.openweathermap.org/ you can now send an unsigned request to <yourdomain>/openweathermap/api/*. Make sure you
secure this area if you don't want others to be able to post on your behalf.

## Usage

After installation and configuration, the service can be directly referenced from within your controllers.

```php
<?php

$openWeatherMap = $this->get('endroid.openweathermap');

// Retrieve the current weather for Breda
$weather = $openWeatherMap->getWeather('Breda,nl');

// Or retrieve the weather using the generic query method
$response = $openWeatherMap->query('weather', array('q' => 'Breda,nl'));
$weather = json_decode($response->getContent());

```

## License

This bundle is under the MIT license. For the full copyright and license information, please view the LICENSE file that
was distributed with this source code.
