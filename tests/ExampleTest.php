<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic functional test example.
     *
     * @return void
     */
     /*public function testUserLogin()
     {
         $this->visit('/')
             ->seeRouteIs('login')
             ->type('test@gmail.com', 'email')
             ->type('test123', 'password')
             ->press('Login')
             ->seePageIs('/');
     }*/

    /**
     * A basic functional test example.
     *
     * @return void
     */
    /*public function testUpdateSettings()
    {
        $this->withoutMiddleware();

        $this->json('POST', '/settings', [
            'name' => 'Jordan Cannon',
            'email' => 'jordancannon15@gmail.com',
            'phone' => '7273249999'
        ])
            ->seeJson([
                'created' => true,
            ]);
    }*/

    /*public function testDeleteUserJson()
    {
        $this->withoutMiddleware();

        $this->json('DELETE', '/users', ['id' => 4])
            ->seeJson([
                'deleted' => true,
            ]);
    }*/

    public function testUpdateUserJson()
    {
        $this->withoutMiddleware();

        $this->json('PATCH', '/users', [
            'id' => 15,
            'first_name' => '',
            'last_name' => 'ppppppp',
            'email' => 'jordancannon14@gmail.com',
        ])
            ->seeJson([
                'patched' => true,
            ]);
    }
}
