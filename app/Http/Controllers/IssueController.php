<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function details(Issue $issue)
    {
        return view('layouts.issue.details', compact('issue'));
    }
}
