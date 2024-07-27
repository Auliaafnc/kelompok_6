<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

class Reservation extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'name',
        'phone',
        'start_book',
        'table_id',
        'keterangan_tambahan',
        'pembayaran',
        'status',
    ];

    protected $dates = [
        'start_book',
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
        'Reservation' => 'Reservation',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartBookAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartBookAttribute($value)
    {
        $this->attributes['start_book'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
