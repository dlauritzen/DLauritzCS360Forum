<?php
namespace DLauritz\Forum\ContentBundle\Extension;

class UtilsExtension extends \Twig_Extension {
	
	public function getFilters() {
		return array(
			'count' => new \Twig_Filter_Function('count')
		);
	}
	
	public function getName() {
		return 'utils_extension';
	}
	
}