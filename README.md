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
    v1_stream_id: 5448edb815636480
    v2_stream_id: 438716eeedf9f590
```

In your controllers you can now do the following to get an instance of the StreamerStatus class (which is where all the useful stuff is kept)

```php
    $Streamer = $this->get('alc_streamer');
```