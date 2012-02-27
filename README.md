Streamer P2P Bundle
===================

This bundle uses a feed from StreamerP2P.com to retrieve information about your station.  It has access to the same information as the flash applet already used on many streamer station websites.

At the request of the person who gave me the location of the feed I have obfuscated that portion of the file that does the actual fetching of status.

Installation
------------
Simply add the following to your deps file ....

    [ALCStreamerBundle]
        git=http://github.com/hades200082/ALCStreamerBundle.git
        target=/bundles/ALC/StreamerBundle

... Run `$ php bin/vendors install`

... Configure the namespace in autoload.php...

```PHP
// app/autoload.php
$loader->registerNamespaces(array(
    //...
    'ALC'              => __DIR__.'/../vendor/bundles',
));
```

... and then register the bundle in your AppKernel...

```PHP
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        //...
        new ALC\StreamerBundle\StreamerBundle(),
    );
}
```

Add to your config.yml...

```YAML
# Streamer configuration
alc_streamer:
    # Add your station stream ID's below.
    v1_stream_id: 5448edb815636480 # This is for Streamer v1.47
    v2_stream_id: 438716eeedf9f590 # This is for Streamer v2.x BETA
```

Usage
-----

In your controllers you can now do the following to get an instance of the StreamerStatus class (which is where all the useful stuff is kept)

```php
$Streamer = $this->get('alc_streamer');
if ($Streamer->isV1Online()) {
    $returnArray = array('now_playing' => $Streamer->V1NowPlaying());
}
return $returnArray; // You now have a template variable called "now_playing".
```

License
=======
Copyright (c) 2012 Lee Conlin

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies 
of the Software, and to permit persons to whom the Software is furnished to do 
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all 
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS 
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR 
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER 
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN 
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.