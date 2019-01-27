<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class findClientTest extends TestCase
{
//    use DatabaseMigrations;
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testItClientIsFound()
//    {
////        Artisan::call('client:find', [
////            'command_parameter_1' => 'value1',
////            'command_parameter_2' => 'value2',
////        ])
//        // If you need result of console output
////        $resultAsText = Artisan::output();
////
////        $this->assertTrue(true);
//    }
//
//    public function testItErrorsIfClientNotFound()
//    {
//        // First we register a partial mock of the command, in this test case
//        // we only need to mock the error() method and leave the rest
//        // of the methods as is.
//        $command = m::mock('App\Console\Commands\findClient[error]',[new \Illuminate\Filesystem\Filesystem()]);
//
//        // We expect the method to be called with a specific string indicating
//        // that the config file we're trying to read doesn't exist.
//        $command->shouldReceive('error')->once()->with('The provided config file was not found!');
//
//        // Now we register our mocked command instance in Console Kernel.
//        $this->app['Illuminate\Contracts\Console\Kernel']->registerCommand($command);
//
//        // Calling the command will run the mocked version of the command.
//        // Notice how we pass the "file" command argument, that's how
//        // arguments and options are passed to the artisan() test
//        // helper method. Also we added '--no-interaction' to
//        // prevent the application from expecting an actual
//        // user input.
//        $this->artisan('config:manage', ['file' => 'not_found', '--no-interaction' => true]);
//    }
//
//    public function testItDataInDatabase()
//    {
////        $this->assertDatabaseHas($table, array $data);
//    }
//
//    public function testQuestionInputAndOutput()
//    {
//        $this->artisan('client:find')
//            ->expectsQuestion('Enter client email', 'virga@pr.lt')
//            ->expectsOutput('virga@pr.lt')
//            ->assertExitCode(0);
//    }
//
//    public function testItDisplaysATableOfClients()
//    {
//        // Run config:manage file
//        // See correct records in table
//    }
//
//    public function testItErrorsWhileCreatingClient()
//    {
//        // Run config:manage file
//        // Get asked "Would you like to create a new file?"
//        // Answer yes
//        // Get asked to provide file name "File name [ex: facebook]"
//        // Provide and existing file
//        // Get error "File already exists!"
//        // File is never touched
//    }
}
