<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Http\Requests\SubmitFormRequest;

class SubmissionController extends Controller
{
    public function submit(SubmitFormRequest $request)
    {
        Submission::create($request->all());

        return redirect('/')
            ->with('success', 'Message sent successfully!');
    }
}
