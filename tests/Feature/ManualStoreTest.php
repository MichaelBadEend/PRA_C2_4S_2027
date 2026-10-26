<?php

namespace Tests\Feature;

use App\Models\Brand;
use App\Models\Manual;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ManualStoreTest extends TestCase
{
    use DatabaseTransactions;

    public function test_existing_brands_are_available_in_the_create_form(): void
    {
        $brand = Brand::create(['name' => 'Test Brand ' . uniqid()]);

        $this->get('/admin/manuals/create')
            ->assertOk()
            ->assertSee('<option value="' . $brand->id . '"', false)
            ->assertSee($brand->name);
    }

    public function test_manual_can_be_stored_without_counter_value(): void
    {
        $brand = Brand::create(['name' => 'Test Brand ' . uniqid()]);
        $name = 'Test Manual ' . uniqid();

        $response = $this->from('/admin/manuals/create')->post('/admin/manuals', [
            'brand_id' => $brand->id,
            'name' => $name,
            'filesize' => 2048,
            'originUrl' => 'https://example.com/manual.pdf',
            'filename' => 'manual.pdf',
            'downloadedServer' => 'cdn.example.com',
        ]);

        $response->assertRedirect('/admin/manuals/create');
        $this->assertDatabaseHas('manuals', [
            'brand_id' => $brand->id,
            'name' => $name,
            'counter' => 0,
        ]);
        $this->assertSame(0, Manual::where('name', $name)->firstOrFail()->counter);
    }

    public function test_admin_lists_manuals_with_delete_actions(): void
    {
        $brand = Brand::create(['name' => 'Test Brand ' . uniqid()]);
        $manual = Manual::create([
            'brand_id' => $brand->id,
            'name' => 'Test Manual ' . uniqid(),
            'filesize' => 2048,
            'originUrl' => 'https://example.com/manual.pdf',
            'counter' => 0,
        ]);

        $this->get('/admin/manuals/create')
            ->assertOk()
            ->assertSee($manual->name)
            ->assertSee(route('manuals.destroy', $manual), false)
            ->assertSee('aria-label="Verwijder ' . $manual->name . '"', false);
    }

    public function test_manual_can_be_deleted_from_the_admin_list(): void
    {
        $brand = Brand::create(['name' => 'Test Brand ' . uniqid()]);
        $manual = Manual::create([
            'brand_id' => $brand->id,
            'name' => 'Test Manual ' . uniqid(),
            'filesize' => 2048,
            'originUrl' => 'https://example.com/manual.pdf',
            'counter' => 0,
        ]);

        $this->delete(route('manuals.destroy', $manual))
            ->assertRedirect(route('admin.manuals.create'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('manuals', ['id' => $manual->id]);
    }

    public function test_manual_page_shows_a_persistent_four_character_short_link(): void
    {
        $brand = Brand::create(['name' => 'Test Brand ' . uniqid()]);
        $manual = Manual::create([
            'brand_id' => $brand->id,
            'name' => 'Test Manual ' . uniqid(),
            'filesize' => 2048,
            'originUrl' => 'https://example.com/manual.pdf',
            'counter' => 0,
        ]);
        $manualPath = route('manual.show', [
            'brand_id' => $brand->id,
            'brand_slug' => $brand->name_url_encoded,
            'manual_id' => $manual->id,
        ], false);

        $this->get($manualPath)->assertOk();

        $shortCode = $manual->fresh()->short_code;
        $this->assertMatchesRegularExpression('/^[a-z0-9]{4}$/', $shortCode);

        $this->get($manualPath)
            ->assertOk()
            ->assertSee(route('manuals.short', $shortCode), false);

        $this->get(route('manuals.short', $shortCode))
            ->assertRedirect($manualPath);
    }
}
