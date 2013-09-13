Jivaro
======

[![Build Status](https://secure.travis-ci.org/raulfraile/jivaro.png)](http://travis-ci.org/raulfraile/jivaro)
[![Latest Stable Version](https://poser.pugx.org/raulfraile/jivaro/v/stable.png)](https://packagist.org/packages/raulfraile/jivaro)
[![Total Downloads](https://poser.pugx.org/raulfraile/jivaro/downloads.png)](https://packagist.org/packages/raulfraile/jivaro)
[![Latest Unstable Version](https://poser.pugx.org/raulfraile/jivaro/v/unstable.png)](https://packagist.org/packages/raulfraile/jivaro)

Jivaro is a simple library to minify, combine and embed CSS and JavaScript files. It is written in PHP and
does not have external dependencies.

``` php
<?php
$jivaro = new Jivaro\Compressor\Css();

echo $jivaro
    ->addFile(__DIR__ . '/files/test1.css')
    ->minify()
    ->getContents();
```

## Credits

* Raul Fraile ([@raulfraile](https://twitter.com/raulfraile))
* [All contributors](https://github.com/raulfraile/jivaro/contributors)

## License

Jivaro is released under the MIT License. See the bundled LICENSE file for details.