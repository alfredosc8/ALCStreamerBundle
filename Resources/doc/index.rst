Add to your deps file...

.. code: TEXT

    [ALCStreamerBundle]
        git=http://github.com/hades200082/ALCStreamerBundle.git
        target=/bundles/ALC/StreamerBundle

Run php bin/vendors install

Then add to your autoload.php...

.. code: PHP

    // app/autoload.php
    $loader->registerNamespaces(array(
        //...
        'ALC'              => __DIR__.'/../vendor/bundles',
    ));

Then add to your AppKernel.php...

.. code: PHP

    // app/AppKernel.php
    public function registerBundles()
    {
        $bundles = array(
            //...
            new ALC\StreamerBundle\StreamerBundle(),
        );
    }

Then add your stream id's to your config.yml as follows...

.. code: YAML

    # Streamer configuration
    alc_streamer:
        v1_stream_id: 6527b128069d8aa0 # This is for Streamer v1.47
        v2_stream_id: cc56266bcd09ba80 # This is for Streamer v2.x BETA