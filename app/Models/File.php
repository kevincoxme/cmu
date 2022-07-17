<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $primaryKey = 'file_id';

    protected $fillable = [
        'code',
        'filename',
        'slug',
        'description',
        'user_id',
        'retention_date',
        'file_status',
        'document_type',
        'retention_status',
        'category_id',
        'archive'
    ];

    public function location()
    {
        return $this->hasOne(FileLocation::class, 'file_id', 'file_id');
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:s a');
    }

}
