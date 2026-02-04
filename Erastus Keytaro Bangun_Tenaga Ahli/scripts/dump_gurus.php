<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Guru;

$gurus = Guru::orderBy('id')->limit(10)->get([
    'id',
    'nip',
    'nama',
    'email',
    'mata_pelajaran',
    'pendidikan',
    'status',
    'years_experience',
    'trainings_completed',
    'eligibility_override',
    'eligibility_note'
]);

echo json_encode($gurus->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
