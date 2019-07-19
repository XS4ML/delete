<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\OrganisedEvent;
use App\User;

class OrganisedEventSeeder extends Seeder
{
  /**
   * Seed the event's table.
   *
   * @return void
   */
  public function run()
  {
    $organiser = User::where('email', 'janedoe@aston.ac.uk')->first();

    $organised_events = collect([
      collect([
        'name' => 'Chess Tournament',
        'description' => 'We\'re going to play some mean chess.',
        'venue' => 'The Great Hall',
        'category' => 'sport'
      ]),
      collect([
        'name' => 'Indian Street Food',
        'description' => 'We\'re going to eating some mean indian.',
        'venue' => 'Cafeteria',
        'category' => 'culture'
      ]),
      collect([
        'name' => '80s Disco',
        'description' => 'We\'re going to having some mean 80s songs.',
        'venue' => 'Student\'s Union',
        'category' => 'other'
      ]),
      collect([
        'name' => 'Art Show',
        'description' => 'We\'re going to having some mean demonstrations.',
        'venue' => 'The Great Hall',
        'category' => 'other'
      ]),
    ]);

    foreach ($organised_events as $eo) {
      $starting_at = Carbon::now();
      $starting_at->addDays(rand(0, 364));
      $starting_at->addSeconds(rand(0, 3600 * 24));

      $eo['organiserId'] = $organiser->id;
      $eo['starting_at'] = $starting_at;

      OrganisedEvent::firstOrcreate($eo->only(['name', 'description', 'venue'])->toArray(), $eo->toArray());
    }
  }
}
