<?php

use Jaxon\Jaxon;
use Jaxon\Plugin\AbstractResponsePlugin;
use Jaxon\Plugin\JsCode;
use Jaxon\Plugin\JsCodeGeneratorInterface;

class TextPlugin extends AbstractResponsePlugin implements JsCodeGeneratorInterface
{
    public const NAME = 'text';

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @inheritDoc
     */
    public function getHash(): string
    {
        return '0.0.1'; // Use a version number as hash.
    }

    /**
     * @inheritDoc
     */
    public function getJsCode(): JsCode
    {
        return new JsCode(file_get_contents(__DIR__ . '/text.js'));
    }

    public function value(string $eltId, string $value)
    {
        $this->addCommand('text.value', ['eltId' => $eltId, 'value' => $value]);
    }

    public function color(string $eltId, string $color)
    {
        $this->addCommand('text.color', ['eltId' => $eltId, 'color' => $color]);
    }
}

class HelloWorld
{
    public function sayHello(bool $isCaps)
    {
        $text = $isCaps ? 'HELLO WORLD!' : 'Hello World!';
        /** @var TextPlugin */
        $xTextPlugin = jaxon()->getResponse()->text;
        // $xTextPlugin = jaxon()->getResponse()->plugin('text');
        // $xTextPlugin = jaxon()->getResponse()->plugin(TextPlugin::class);
        $xTextPlugin->value('hello-text', $text);
    }

    public function setColor(string $sColor)
    {
        /** @var TextPlugin */
        $xTextPlugin = jaxon()->getResponse()->text;
        $xTextPlugin->color('hello-text', $sColor);
    }
}

// Register object
$jaxon = jaxon();

$jaxon->register(Jaxon::CALLABLE_CLASS, HelloWorld::class);
$jaxon->registerPlugin(TextPlugin::class, TextPlugin::NAME);

// Js options
$jaxon->setOptions(['lib' => ['uri' => '/js'], 'app' => ['minify' => false]], 'js');
