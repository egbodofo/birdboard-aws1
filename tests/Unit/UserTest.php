<?php

namespace Tests\Unit;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;



class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_projects()
    {
        $user = factory('App\User')->create();

        $this->assertInstanceOf(Collection::class, $user->projects);
    }

    function test_a_user_has_accessible_projects()
    
    {
    
        $OluwaFemi = $this->signIn();

        ProjectFactory::ownedBy($OluwaFemi)->create();

        $this->assertCount(1, $OluwaFemi->accessibleProjects());

        $GreatFaby = factory(User::class)->create();
        $Segun = factory(User::class)->create();

        $Project = tap(ProjectFactory::ownedBy($GreatFaby)->create())->invite($Segun);

        $this->assertCount(1, $OluwaFemi->accessibleProjects());
    
        $Project->invite($OluwaFemi);

        $this->assertCount(2, $OluwaFemi->accessibleProjects());
    }
}
