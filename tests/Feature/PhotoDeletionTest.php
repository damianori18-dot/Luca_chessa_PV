<?php

use App\Models\Photo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('an admin can delete a photo and its stored image', function () {
    Storage::fake('public');
    Storage::disk('public')->put('gallery/photo.jpg', 'photo content');

    $photo = Photo::create(['image' => 'gallery/photo.jpg']);
    $admin = User::factory()->create(['is_admin' => true]);

    $this->actingAs($admin)
        ->delete(route('photo.destroy', $photo))
        ->assertRedirect(route('photo.gallery'));

    $this->assertDatabaseMissing('photos', ['id' => $photo->id]);
    Storage::disk('public')->assertMissing('gallery/photo.jpg');
});

test('a non-admin cannot delete a photo', function () {
    $photo = Photo::create(['image' => 'gallery/photo.jpg']);
    $user = User::factory()->create();

    $this->actingAs($user)
        ->delete(route('photo.destroy', $photo))
        ->assertForbidden();

    $this->assertDatabaseHas('photos', ['id' => $photo->id]);
});
