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
    public function test_displays_view(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.test'));

        $response->assertOk();
        $response->assertViewIs('employee.show');
        $response->assertViewHas('employee');
    }
}
