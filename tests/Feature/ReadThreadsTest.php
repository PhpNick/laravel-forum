<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadThreadsTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    public function setUp():void
    {
        parent::setUp();
        $this->thread = Thread::factory()->create();
    }

    public function test_a_user_can_view_all_threads()
    {
        $response = $this->get('/');
        $response->assertSee($this->thread->title);
    }

    function test_a_user_can_read_a_single_thread()
    {
        $response = $this->get('/threads/' . $this->thread->channel->id . '/' . $this->thread->id);
        $response->assertSee($this->thread->title);
    }

    function test_a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = Reply::factory()
            ->create([
                'thread_id' => $this->thread->id,
                'user_id'   => $this->thread->user_id,
            ]);

        $this->get('/threads/' . $this->thread->channel->id . '/' . $this->thread->id)
            ->assertSee($reply->body);
    }
}
