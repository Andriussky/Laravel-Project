<?php

namespace App\Console\Commands;

use App\Models\Person;
use Illuminate\Console\Command;

class FindPersonById extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'find:person {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find a person by their ID';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');

        $person = Person::find($id);

        if ($person) {
            $this->info('Person found:');
            $this->table(['id', 'name', 'email'], [[$person->id, $person->name, $person->email]]);
        } else {
            $this->error('Person not found.');
        }
    }
}
