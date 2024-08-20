<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Submission;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_submission_creation()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $submission = Submission::create($data);

        $this->assertInstanceOf(Submission::class, $submission);
        $this->assertDatabaseHas('submissions', $data);
    }
}
