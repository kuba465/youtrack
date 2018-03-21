<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    const TOKEN = '2W4p3_RE1t8AAAAAAAAH2hdjcrQWEHs446_woitNRYPleLofksWMrbhsplO0cFqS';

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

    public static function saveFilesReturnArray(Request $request, Issue $issue)
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
