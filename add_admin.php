<?php

require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

// Create initial admin user
$admin = new Admin();
$admin->username = 'admin';
$admin->email = 'admin@ticash.com';
$admin->password = Hash::make('password123');
$admin->save();

echo "Admin user created successfully!\n";
echo "Username: admin\n";
echo "Password: password123\n";

?>