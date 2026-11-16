<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Docs\ApiController;

/*
| Every page reads resources/api-reference.json (App\ApiReference\Reference).
| The two catch-all routes stay last; a section never takes the slug of a route
| above them (Reference::RESERVED_SLUGS).
*/
Route::get('/', [ApiController::class, 'index'])->name('home');
Route::get('sitemap.xml', [ApiController::class, 'sitemap'])->name('sitemap');
Route::get('robots.txt', [ApiController::class, 'robots'])->name('robots');
Route::get('llms.txt', [ApiController::class, 'llms'])->name('llms');
Route::get('docs/api/lookup', [ApiController::class, 'lookup']);
Route::post('docs/api/save-theme', [ApiController::class, 'saveTheme']);
Route::post('docs/api/save-lang', [ApiController::class, 'saveLang']);
Route::get('guides/{guide}', [ApiController::class, 'guide'])->name('guide')->where('guide', '[a-z0-9-]+');
Route::get('{section}', [ApiController::class, 'section'])->name('section')->where('section', '[a-z0-9-]+');
Route::get('{section}/{operation}', [ApiController::class, 'operation'])->name('operation')
    ->where(['section' => '[a-z0-9-]+', 'operation' => '[a-z0-9-]+']);
