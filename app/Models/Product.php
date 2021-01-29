<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'provider_id', 'price', 'manufacturing_date', 'expiration_date'];

    protected $casts = [
        'expiration_date' => 'datetime',
        'manufacturing_date' => 'datetime',
    ];

    public function filterAll($request)
    {
        $products = Product::where('name', 'like', '%' . $request->get('keyword') . '%');

        if(!empty($request->get('price_from')))
            $products = $products->where('price', '>=', $request->get('price_from'));

        if(!empty($request->get('price_to')))
            $products = $products->where('price', '<=', $request->get('price_to'));

        switch ($request->get('order_by')){
            case 'newest':
                $products = $products->orderBy('created_at', 'desc');
                break;
            case 'older':
                $products = $products->orderBy('created_at', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
        }

        $products = $products->paginate(10);

        return $products;
    }

    public function provider ()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getPriceFormatedAttribute()
    {
        return 'R$ ' . number_format($this->attributes['price'], 2, ',', '.');
    }
}
