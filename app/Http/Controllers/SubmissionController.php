<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitFormRequest;
use App\Jobs\ProcessSubmission;

class SubmissionController extends Controller
{
    public function submit(SubmitFormRequest $request)
    {
        ProcessSubmission::dispatch($request->all());

        return redirect('/')
            ->with('success', 'Your message is being processed and will be saved.');
    }
}
