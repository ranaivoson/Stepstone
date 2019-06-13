<?php
namespace App\DependencyInjection\Compiler;

use App\Storage\StoreInterfaceChain;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class StorePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(StoreInterfaceChain::class)) {
            return;
        }

        $definition = $container->findDefinition(StoreInterfaceChain::class);

        $taggedServices = $container->findTaggedServiceIds('app.storage');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addStore', [new Reference($id)]);
        }
    }

}