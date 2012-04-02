<?php
namespace DLauritz\Forum\ContentBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class UtilsExtension extends Extension {
	
	public function load(array $config, ContainerBuilder $container) {
		$definition = new Definition('DLauritz\Forum\ContentBundle\Extension\UtilsExtension');
		
		// Inform the system that this extension exists
		$definition->addTag('twig.extension');
		$container->setDefinition('utils_extension', $definition);
	}
}
