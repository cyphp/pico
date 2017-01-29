<?php

use Cyphp\Pico\Engine;

class EngineTest extends PicoTestCase
{
    public function testEmptySpace()
    {
        $engine = new Engine();

        $this->assertEquals('This section is final text.', $engine->render('This {{defined.text }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{defined.text  }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{ defined.text}}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{   defined.text}}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{ defined.text }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{   defined.text }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{ defined.text   }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This section is final text.', $engine->render('This {{   defined.text  }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));
    }

    public function testUndefinedKey()
    {
        $engine = new Engine();

        $this->assertEquals('This is final text.', $engine->render('This {{ un.defined.text }}is final text.', []));
    }

    public function testFilter()
    {
        $engine = new Engine();

        $this->assertEquals('This SECTION is final text.', $engine->render('This {{ defined.text | strtoupper }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));

        $this->assertEquals('This "Section "is final text.', $engine->render('This {{ defined.text | strtolower | ucfirst | json_encode }}is final text.', [
            'defined' => [
                'text' => 'section ',
            ],
        ]));
    }
}
