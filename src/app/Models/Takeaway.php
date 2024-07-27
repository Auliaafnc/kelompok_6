<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Takeaway extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'takeaways';

    protected $fillable = [
        'name',
        'phone',
        'waktu_takeaway',
        'product_id',
        'total',
        'keterangan_tambahan',
        'pembayaran',
        'status',
    ];

    protected $dates = [
        'waktu_takeaway',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PEMBAYARAN_SELECT = [
        'Dompet_Digital' => 'Dompet Digital',
        'Transfer_Bank'  => 'Transfer Bank',
    ];

    public const STATUS_SELECT = [
        'Cancel'   => 'Cancel',
        'Takeaway' => 'Takeaway',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getWaktuTakeawayAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setWaktuTakeawayAttribute($value)
    {
        $this->attributes['waktu_takeaway'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'takeaway_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
