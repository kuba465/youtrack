<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\FileRequest;
use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * @param Request $request
     * @param Issue $issue
     * @return \Illuminate\Http\JsonResponse
     */
    public function save(Request $request, Issue $issue)
    {
        $files = File::saveFilesReturnArray($request, $issue);
        return response()->json([
            'files' => $files,
            'count' => count($files),
            'message' => Lang::get('main.issue.files.delete_message'),
            'text' => Lang::get('main.issue.files.delete')
        ], 200);
    }

    /**
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(File $file)
    {
        $fileId = $file->id;
        if (Storage::disk('public')->exists($file->path . '/' . $file->name)) {
            Storage::disk('public')->delete($file->path . '/' . $file->name);
            $file->delete();
        }

        return response()->json([
            'fileId' => $fileId
        ]);
    }
}
