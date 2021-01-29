<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'created_at', 'active'];

    public function filterAll($request)
    {

        $provider = Provider::where('name', 'like', '%' . $request->get('keyword') . '%')
                            ->where('phone', 'like', '%' . $request->get('phone') . '%');

        switch ($request->get('order_by')){
            case 'newest':
                $provider = $provider->orderBy('created_at', 'desc');
                break;
            case 'older':
                $provider = $provider->orderBy('created_at', 'asc');
                break;
        }

        $provider = $provider->paginate(10);

        return $provider;
    }

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
