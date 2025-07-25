<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{
    use HasFactory;
    protected $table ='job_listing';
    // protected $fillable =['employer_id','title', 'salary'];
    protected $guarded = []; // This allows all fields to be mass assignable

    public function employer(){
        return $this->belongsTo(Employer::class);
    }
}


