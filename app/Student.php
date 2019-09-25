<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $fillable = [
        "name",
        "email",
        "telephone",
        "feedback",
        "created_at",
        "updated_at"
    ];
}
