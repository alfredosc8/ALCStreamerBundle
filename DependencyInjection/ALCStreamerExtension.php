<?php

namespace ALC\StreamerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ALCStreamerExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('streamer.xml');

// Why doesn't it work with this?
//        $configuration = new Configuration();
//        $config = $this->processConfiguration($configuration, $configs);

        $config = array();
        foreach($configs as $c) {
            $config = array_merge($config, $c);
        }

        if (isset($config['v1_stream_id'])) {
            $container->setParameter('alc_streamer.v1_stream_id', $config['v1_stream_id']);
        }

        if (isset($config['v2_stream_id'])) {
            $container->setParameter('alc_streamer.v2_stream_id', $config['v2_stream_id']);
        }
    }

    public function getAlias()
    {
        return 'alc_streamer';
    }
}
