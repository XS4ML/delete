<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
  /**
   * Seed the event's table.
   *
   * @return void
   */
  public function run()
  {
    $users = collect([
      collect([
        'name' => 'John Doe',
        'email' => 'johndoe@aston.ac.uk',
        'password' => 'test1234',
        'account_type' => 'student'
      ]),
      collect([
        'name' => 'Jane Doe',
        'email' => 'janedoe@aston.ac.uk',
        'password' => 'test1234',
        'account_type' => 'organiser'
      ])
    ]);

    foreach ($users as $u) {
      User::firstOrcreate($u->only(['email'])->toArray(), $u->toArray());
    }
  }
}
