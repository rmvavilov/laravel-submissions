<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitFormRequest;
use App\Jobs\ProcessSubmission;
use Illuminate\Support\Facades\Log;

class SubmissionController extends Controller
{
    public function submit(SubmitFormRequest $request)
    {
        try {
            ProcessSubmission::dispatch($request->all());

            return redirect('/')
                ->with('success', 'Your message is being processed and will be saved.');
        } catch (\Exception $e) {
            Log::error('Error dispatching submission job: ' . $e->getMessage());

            return redirect('/')
                ->with('error', 'Failed to process your message. Please try again later.');
        }
    }
}
