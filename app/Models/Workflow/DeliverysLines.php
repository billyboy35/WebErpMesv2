<?php

namespace App\Models\Workflow;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverysLines extends Model
{
    use HasFactory;

    protected $fillable = ['delivery_id', 
                            'order_line_id', 
                            'ORDRE',
                            'qty',
                            'statu'
    ];

    public function delivery()
    {
    return $this->belongsTo(Deliverys::class, 'delivery_id');
    }

    public function orderLine()
    {
    return $this->belongsTo(OrderLines::class, 'order_line_id');
    }

    public function GetPrettyCreatedAttribute()
    {
    return date('d F Y', strtotime($this->created_at));
    }
}