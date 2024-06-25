<?php

use App\Models\Keahlian;

beforeEach(function () {
    $this->actingAsAdmin();
});

describe('KeahlianController', function () {    
    describe('->index()', function () {
        it('should return view with data', function () {
            $response = $this->get(route('keahlian.index'));
            $response->assertStatus(200);
            $response->assertViewIs('admin.keahlian.index');
            $response->assertViewHas('data', Keahlian::latest()->get());
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $response = $this->get(route('keahlian.index'));
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });
    });

    describe('->store()', function () {
        it('should store new keahlian', function () {
            $keahlian = Keahlian::factory()->make();
            $response = $this->post(route('keahlian.store'), $keahlian->toArray());
            $response->assertRedirect(route('keahlian.index'));
            $this->assertDatabaseHas('keahlian', $keahlian->toArray());
        });

        it('should return error when nama is empty', function () {
            $keahlian = Keahlian::factory()->make(['nama' => '']);
            $response = $this->post(route('keahlian.store'), $keahlian->toArray());
            $response->assertRedirect(route('keahlian.index'));
            $response->assertSessionHasErrors('nama');
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $keahlian = Keahlian::factory()->make();
            $response = $this->post(route('keahlian.store'), $keahlian->toArray());
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });
    });

    describe('->update()', function () {
        it('should update keahlian', function () {
            $keahlian = Keahlian::factory()->create();
            $keahlian->nama = 'updated';
            $response = $this->patch(route('keahlian.update', $keahlian->id), $keahlian->toArray());
            $response->assertRedirect(route('keahlian.index'));
            expect(Keahlian::find($keahlian->id)->nama)->toBe('updated');
        });

        it('should return error when nama is empty', function () {
            $keahlian = Keahlian::factory()->create();
            $keahlian->nama = '';
            $response = $this->patch(route('keahlian.update', $keahlian->id), $keahlian->toArray());
            $response->assertRedirect(route('keahlian.index'));
            $response->assertSessionHasErrors('nama');
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $keahlian = Keahlian::factory()->create();
            $keahlian->nama = 'updated';
            $response = $this->patch(route('keahlian.update', $keahlian->id), $keahlian->toArray());
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });
    });

    describe('->destroy()', function () {
        it('should delete keahlian', function () {
            $keahlian = Keahlian::factory()->create();
            $response = $this->delete(route('keahlian.destroy', $keahlian->id));
            $response->assertRedirect(route('keahlian.index'));
            $this->assertDatabaseMissing('keahlian', $keahlian->toArray());
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $keahlian = Keahlian::factory()->create();
            $response = $this->delete(route('keahlian.destroy', $keahlian->id));
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });
    });
});
