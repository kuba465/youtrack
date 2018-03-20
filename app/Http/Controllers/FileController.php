<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\FileRequest;
use App\Issue;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function save(Request $request, Issue $issue)
    {
        $files = [];
        foreach ($request->all()['files'] as $file) {
            $filename = implode('_', explode(' ', $file->getClientOriginalName()));
            $catalog = 'files/' . $issue->id . '/' . date('Y-m-d');
            $file->storeAs($catalog, $filename);
            File::create([
                'path' => $catalog,
                'name' => $filename,
                'issue_id' => $issue->id,
            ]);
            $files[$filename]['url'] = url('storage/app/' . $catalog . '/' . $filename);
            $files[$filename]['extension'] = $file->getClientOriginalExtension();
        }
        return response()->json([
            'files' => $files,
        ], 200);
    }
}
