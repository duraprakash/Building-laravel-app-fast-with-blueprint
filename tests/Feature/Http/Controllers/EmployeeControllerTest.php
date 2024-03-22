<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmployeeController
 */
final class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_responds_with(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.test'));

        $response->assertOk();
        $response->assertJson($employee);
    }
}
