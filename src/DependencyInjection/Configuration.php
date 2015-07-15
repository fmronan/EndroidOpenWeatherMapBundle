<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\Bundle\OpenWeatherMapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $treeBuilder
            ->root('endroid_openweathermap')
                ->children()
                    ->scalarNode('api_key')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('api_url')->defaultValue(null)->end()
                    ->scalarNode('units')->defaultValue(null)->end()
                    ->scalarNode('langs')->defaultValue(null)->end()
                ->end()
        ;

        return $treeBuilder;
    }
}
