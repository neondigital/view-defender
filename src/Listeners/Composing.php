<?php

namespace Neondigital\LaravelViewDefender\Listeners;

use Illuminate\Contracts\Config\Repository as Config;
use Neondigital\LaravelViewDefender\Exceptions\ViewDefenderException;

class Composing
{
    protected $config;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($view)
    {
        if (!$this->config->get('app.debug')) {
            return;
        }

        $this->checkData($view->getData());
    }

    protected function checkData($data)
    {
        if (is_array($data) or $data instanceof \Traversable) {
            foreach ($data as $d) {
                $this->checkData($d);
            }

            return;
        }

        foreach ($this->config->get('viewdefender.enemies') as $enemy) {
            if (is_a($data, $enemy)) {
                throw new ViewDefenderException('Your view has moved to the dark side!');
            }
        }
    }
}
