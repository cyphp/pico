<?php

namespace Cyphp\Pico\Component;

use Cyphp\Pico\Engine;

class WebComponent implements \JsonSerializable
{
    protected $template;
    protected $payload;

    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    public function setPayload($payload)
    {
        $this->payload = $payload;
    }

    public function setTemplateFromPath(string $templatePath)
    {
        $this->setTemplate(file_get_contents($templatePath));
    }

    public function render(Engine $engine)
    {
        return $engine->render($this->template, $this->jsonSerialize());
    }

    public function jsonSerialize()
    {
        return [];
    }
}
