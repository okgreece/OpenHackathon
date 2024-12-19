<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model implements Authenticatable
{
    // Προσθήκη της απαιτούμενης μεθόδου για την υλοποίηση του Authenticatable
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = [
        'email', 'password', // Κλίνουμε τα πεδία που θέλουμε να είναι μαζικά αναθέσιμα
    ];
}
