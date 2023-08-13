<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
    public function testUserRoute()
    {
        $this->get(route('user.index'))->assertStatus(200);
        $this->get(route('user.edit', 1))->assertStatus(200);
        $this->get(route('user.update', 1))->assertStatus(200);
        $this->get(route('user.create'))->assertStatus(200);
        $this->get(route('user.store'))->assertStatus(200);
        $this->get(route('user.delete', 1))->assertStatus(200);
    }
    public function test_create_user_by_factory()
    {
        $user = User::factory(User::class)->create();//goi factory de tao moi du lieu
        $this->assertNotNull($user);//kiem tra ket qua tra ve co NULL hay khong
        $this->assertInstanceOf(User::class, $user);
    }
    public function test_update_user()
    {
        $user = User::where('id','>',1)->first();
        $user->image = fake()->imageUrl(640,480);
        $user->email = fake()->email;
        $user->gender =  fake()->numberBetween($min = 0, $max = 2);
        $user->group_id = fake()->numberBetween($min = 2, $max = 3);
        $user->password = bcrypt('123456');
        $this->assertTrue($user->save());
    }
    public function test_delete_user()
    {
        $user = User::where('id','>',1)->first();//lay ket qua cuoi cung
        $this->assertTrue($user->delete());//kiem tra ket qua tra ve co tra ve TRUE hay ko
    }
}