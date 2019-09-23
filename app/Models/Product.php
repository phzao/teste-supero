<?php

namespace App\Models;

use App\Models\Interfaces\EntityInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model implements EntityInterface
{
    /**
     * @var array
     */
    protected $fillable = [
        'description',
        'short_description',
        'code',
        'status',
        'value',
        'qty'
    ];

    protected $attributes = [
        'status' => 'enable',
    ];

    /**
     * @param null $id
     *
     * @return array
     */
    public function rules($id = null): array
    {
        $id        = empty($id) ? "" : "," . $id;
        $sometimes = empty($id) ? "" : "sometimes";

        return [
            'short_description' => $sometimes.'|required|string|max:30',
            'description'       => $sometimes.'|required|string|max:150',
            'code'              => $sometimes.'|required|max:10',
            'status'            => $sometimes.'|in:enable,disable',
            'value'             => $sometimes."|required|regex:/^\d*(\.\d{1,2})?$/",
            'qty'               => $sometimes.'|required|integer',
        ];
    }
}
