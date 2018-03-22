<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'path', 'name', 'extension', 'issue_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    /**
     * @param Request $request
     * @param Issue $issue
     * @return array
     */
    public static function saveFilesReturnArray(Request $request, Issue $issue): array
    {
        $files = [];
        foreach ($request->all()['files'] as $file) {
            $fileName = implode('_', explode(' ', $file->getClientOriginalName()));
            $extension = $file->getClientOriginalExtension();
            $catalog = 'files/' . $issue->id;
            if (!Storage::disk('public')->exists($catalog . '/' . $fileName)) {
                $file->storeAs('public/' . $catalog, $fileName);
                $newFile = File::create([
                    'path' => $catalog,
                    'name' => $fileName,
                    'extension' => $extension,
                    'issue_id' => $issue->id,
                ]);
                $files[$fileName]['deleteUrl'] = route('files.delete', ['issue' => $issue, 'file' => $newFile->id]);
                $files[$fileName]['url'] = url('storage/public/' . $catalog . '/' . $fileName);
                $files[$fileName]['extension'] = $extension;
                $files[$fileName]['id'] = $newFile->id;
            }
        }
        return $files;
    }
}
