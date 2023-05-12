<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type', // morning, evening
        'start_time',
        'end_time'
    ];

    protected function getLabel(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => ucfirst($this->type) . ' | ' . $this->get_formatted_start_time . ' - ' . $this->get_formatted_end_time
        );
    }

    protected function getFormattedStartTime(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => date('h:i A', strtotime($this->start_time))
        );
    }

    protected function getFormattedEndTime(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => date('h:i A', strtotime($this->end_time))
        );
    }
}
