<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

use Jaxon\Zend\Factory\Zf3ControllerFactory;
use Jaxon\Zend\Controller\Plugin\JaxonPlugin;
use Jaxon\Zend\Controller\JaxonClass;

return [
    'router' => [
        'routes' => [
            'demo' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\DemoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            // Route to the Jaxon request processor
            'jaxon' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/jaxon',
                    'defaults' => [
                        'controller' => JaxonClass::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\DemoController::class => Zf3ControllerFactory::class,
            JaxonClass::class => Zf3ControllerFactory::class,
        ],
    ],
    'service_manager' => array(
        /*'factories' => array(
            JaxonPlugin::class => InvokableFactory::class,
        ),
        'aliases' => array(
            'JaxonPlugin' => JaxonPlugin::class,
        ),*/
        'invokables' => array(
            'JaxonPlugin' => JaxonPlugin::class,
        ),
    ),
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
