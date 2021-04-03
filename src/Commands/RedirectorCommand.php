<?php

namespace Combindma\Redirector\Commands;

use Illuminate\Console\Command;

class RedirectorCommand extends Command
{
    public $signature = 'redirector';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
