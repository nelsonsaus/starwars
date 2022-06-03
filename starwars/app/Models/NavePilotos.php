<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavePilotos extends Model
{
    public $table = 'nave_piloto';
    use HasFactory;
    protected $fillable=['id', 'nave_id', 'piloto_id'];
}

?>
