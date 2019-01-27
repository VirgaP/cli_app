<?php
/**
 * Created by PhpStorm.
 * User: virga
 * Date: 2019-01-27
 * Time: 16:04
 */

namespace Tests\Unit;


use App\Client;
use App\ClientRepository;
use App\Console\Commands\findClient;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\TestCase;
use Symfony\Component\Console\Application as ConsoleApplication;


use Faker\Generator as Faker;


/**
 * @property  Faker $faker
 */
class ClientUnitTest extends TestCase{

    use RefreshDatabase;
    use WithFaker;


    protected $command;

    protected $commandTester;

    /** @test */
    public function it_can_create_a_client()
    {
        $data = [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->word,
            'email' => $this->faker->unique()->email,
            'phoneNumber1'=>$this->faker->e164PhoneNumber,
            'phoneNumber2'=>$this->faker->e164PhoneNumber,
            'comment'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2)
        ];

        $clientRepo = new ClientRepository(new Client);
        $client = $clientRepo->createClient($data);

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals($data['firstname'], $client->firstname);
        $this->assertEquals($data['lastname'], $client->lastname);
        $this->assertEquals($data['email'], $client->email);
        $this->assertEquals($data['phoneNumber1'], $client->phoneNumber1);
        $this->assertEquals($data['phoneNumber2'], $client->phoneNumber2);
        $this->assertEquals($data['comment'], $client->comment);
    }

    /** @test */
    public function it_can_show_the_client()
    {
        $client = factory(Client::class)->create();
        $clientRepo = new ClientRepository(new Client());
        $found = $clientRepo->findClient($client->id);

        $this->assertInstanceOf(Client::class, $found);
        $this->assertEquals($found->firstname, $client->firstname);
        $this->assertEquals($found->lastname, $client->lastname);
        $this->assertEquals($found->email, $client->email);
        $this->assertEquals($found->phoneNumber1, $client->phoneNumber1);
        $this->assertEquals($found->phoneNumber2, $client->phoneNumber2);
        $this->assertEquals($found->comment, $client->comment);
    }

    /** @test */
    public function it_can_update_the_client()
    {
        $client = factory(Client::class)->create();

            $data = [
                'firstname' => $this->faker->firstName(),
                'lastname' => $this->faker->word,
                'email' => $this->faker->unique()->email,
                'phoneNumber1'=>$this->faker->e164PhoneNumber,
                'phoneNumber2'=>$this->faker->e164PhoneNumber,
                'comment'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2)
        ];

        $clientRepo = new ClientRepository($client);
        $update = $clientRepo->updateClient($data);

        $this->assertTrue($update);
        $this->assertEquals($data['firstname'], $client->firstname);
        $this->assertEquals($data['lastname'], $client->lastname);
        $this->assertEquals($data['email'], $client->email);
        $this->assertEquals($data['phoneNumber1'], $client->phoneNumber1);
        $this->assertEquals($data['phoneNumber2'], $client->phoneNumber2);
        $this->assertEquals($data['comment'], $client->comment);
    }

    /** @test */
    public function it_can_delete_the_client()
    {
        $client = factory(Client::class)->create();

        $clientRepo = new ClientRepository($client);
        $delete = $clientRepo->deleteClient();

        $this->assertTrue($delete);
    }

    /** @test */
    public function it_has_add_client_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\addClient::class));
    }

    /** @test */
    public function it_has_find_client_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\findClient::class));
    }

    /** @test */
    public function it_has_update_client_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\updateClient::class));
    }

    /** @test */
    public function it_has_delete_client_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\deleteClient::class));
    }

    /** @test */
    public function it_has_list_clients_command()
    {
        $this->assertTrue(class_exists(\App\Console\Commands\showClients::class));
    }

}