<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class LoginPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@login-button' => 'button[type="submit"]',
        ];
    }

    public function fillInLoginForm(Browser $browser, $email, $password)
    {
        $browser->visit('http://project6')
            ->clicklink('Login')
            ->type('email', $email)
            ->type('password', $password)
            ->click('@login-button')
            ->assertSee('Logout');
    }
}
