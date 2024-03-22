<?php

namespace Tests\Feature\Http\Controllers;

use App\Jobs\ComputeSalary;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmployeeController
 */
final class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();

        Queue::fake();

        $response = $this->get(route('employees.test'));

        Queue::assertPushed(ComputeSalary::class, function ($job) use ($employee) {
            return $job->employee->is($employee);
        });
    }
}
