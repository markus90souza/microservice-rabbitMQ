<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'uuid',
        'name',
        'url',
        'phone',
        'whatsapp',
        'email',
        'facebook',
        'instagram',
        'youtube'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCompanies(string $filter = '')
    {
        $companies = $this->with('category')
            ->where(function ($search) use ($filter) {
                if ($filter != '') {
                    $search->where('name', 'LIKE', "%{$filter}%");
                    $search->orWhere('email', '=', $filter);
                    $search->orWhere('phone', '=', $filter);
                }
            })->paginate();

        return $companies;
    }
}
