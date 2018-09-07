<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Project;
use App\Models\Client;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();
        $this->model = new Project();
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testClient()
    {
        $project = Project::create();
        $client = Client::create();

        $project->client()->associate($client);

        $this->assertSame($client->id, $project->client->id);
    }
}
