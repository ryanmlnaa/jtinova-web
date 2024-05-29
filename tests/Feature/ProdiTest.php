<?php

use App\Models\Prodi;

beforeEach(function () {
    $this->actingAsAdmin();
});

describe('ProdiController', function () {    
    describe('->index()', function () {
        it('should return view with data', function () {
            $response = $this->get(route('prodi.index'));
            $response->assertStatus(200);
            $response->assertViewIs('prodi.index');
            $response->assertViewHas('data', Prodi::all());
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $response = $this->get(route('prodi.index'));
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });

        it('should return 403 when authenticated but not admin', function () {
            $this->actingAsUserMbkm();
            $response = $this->get(route('prodi.index'));
            $response->assertStatus(403);
        });
    });

    describe('->store()', function () {
        it('should store new prodi', function () {
            $prodi = Prodi::factory()->make();
            $response = $this->post(route('prodi.store'), $prodi->toArray());
            $response->assertRedirect(route('prodi.index'));
            $this->assertDatabaseHas('prodis', $prodi->toArray());
        });

        it('should return error when name is empty', function () {
            $prodi = Prodi::factory()->make(['code' => '','name' => '']);
            $response = $this->post(route('prodi.store'), $prodi->toArray());
            $response->assertRedirect(route('prodi.index'));
            $response->assertSessionHasErrors('code');
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $prodi = Prodi::factory()->make();
            $response = $this->post(route('prodi.store'), $prodi->toArray());
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });

        it('should return 403 when authenticated but not admin', function () {
            $this->actingAsUserMbkm();
            $prodi = Prodi::factory()->make();
            $response = $this->post(route('prodi.store'), $prodi->toArray());
            $response->assertStatus(403);
        });
    });

    describe('->update()', function () {
        it('should update prodi', function () {
            $prodi = Prodi::factory()->create();
            $prodi->name = 'updated';
            $response = $this->put(route('prodi.update', $prodi->id), $prodi->toArray());
            $response->assertRedirect(route('prodi.index'));
            $this->assertDatabaseHas('prodis', $prodi->toArray());
        });

        it('should return error when name is empty', function () {
            $prodi = Prodi::factory()->create();
            $prodi->code = '';
            $prodi->name = '';
            $response = $this->put(route('prodi.update', $prodi->id), $prodi->toArray());
            $response->assertRedirect(route('prodi.index'));
            $response->assertSessionHasErrors('code');
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $prodi = Prodi::factory()->create();
            $prodi->name = 'updated';
            $response = $this->put(route('prodi.update', $prodi->id), $prodi->toArray());
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });

        it('should return 403 when authenticated but not admin', function () {
            $this->actingAsUserMbkm();
            $prodi = Prodi::factory()->create();
            $prodi->name = 'updated';
            $response = $this->put(route('prodi.update', $prodi->id), $prodi->toArray());
            $response->assertStatus(403);
        });
    });

    describe('->destroy()', function () {
        it('should delete prodi', function () {
            $prodi = Prodi::factory()->create();
            $response = $this->delete(route('prodi.destroy', $prodi->id));
            $response->assertRedirect(route('prodi.index'));
            $this->assertDatabaseMissing('prodis', $prodi->toArray());
        });

        it('should return 302 when not authenticated', function () {
            $this->logout();
            $prodi = Prodi::factory()->create();
            $response = $this->delete(route('prodi.destroy', $prodi->id));
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        });

        it('should return 403 when authenticated but not admin', function () {
            $this->actingAsUserMbkm();
            $prodi = Prodi::factory()->create();
            $response = $this->delete(route('prodi.destroy', $prodi->id));
            $response->assertStatus(403);
        });
    });
});
