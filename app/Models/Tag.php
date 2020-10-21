<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
        ]);
        $request->create([
            'name' => $request->name,
        ]);
    }
}
