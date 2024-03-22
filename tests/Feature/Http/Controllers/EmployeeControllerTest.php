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
    public function test_redirects(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.test'));

        $response->assertRedirect(route('employee.show', [$employee.id]));
    }


    #[Test]
    public function showEmployee_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.showEmployee'));
    }
}
