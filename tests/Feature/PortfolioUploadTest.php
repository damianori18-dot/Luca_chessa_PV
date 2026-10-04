<?php

use App\Models\PortfolioImage;
use App\Models\PortfolioSet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('portfolio images larger than five megabytes are stored with their database records', function () {
    Storage::fake('public');

    $this->post(route('portfolio.store'), [
        'title' => 'Wedding portfolio',
        'images' => [
            UploadedFile::fake()->create('large.jpg', 6000, 'image/jpeg'),
        ],
    ])->assertRedirect(route('portfolio.index'));

    $set = PortfolioSet::firstOrFail();
    $image = PortfolioImage::firstOrFail();

    expect($image->set_id)->toBe($set->id)
        ->and($set->preview_image)->toBe($image->path);

    Storage::disk('public')->assertExists($image->path);
});

test('a portfolio set is not created when no images are uploaded', function () {
    $this->from(route('portfolio.create'))
        ->post(route('portfolio.store'), [
            'title' => 'Empty portfolio',
            'images' => [],
        ])
        ->assertRedirect(route('portfolio.create'))
        ->assertSessionHasErrors('images');

    $this->assertDatabaseCount('portfolio_sets', 0);
    $this->assertDatabaseCount('portfolio_images', 0);
});
