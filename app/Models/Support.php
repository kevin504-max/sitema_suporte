<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $table = 'supports';
    protected $fillable = ['requester_id', 'assistant_id', 'subject_id', 'description', 'status', 'file', 'rating', 'review'];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function assistant()
    {
        return $this->belongsTo(User::class, 'assistant_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
