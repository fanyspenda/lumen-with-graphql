<?php
namespace App\Models\Monitor;

use Illuminate\Database\Eloquent\Model;

class Monitor_display extends Model{
    
    protected $fillable = [
        'refresh_rate',
        'maximum_resolution',
        'native_resolution',
        'response_time',
        'display_type'
    ];
}

?>