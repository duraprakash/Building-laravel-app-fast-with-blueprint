<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Department;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmployeeController
 */
final class EmployeeControllerTest extends TestCase
{
    use AdditionalAssertions, WithFaker;

    #[Test]
    public function test_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeeController::class,
            'test',
            \App\Http\Requests\EmployeeTestRequest::class
        );
    }

    #[Test]
    public function test_behaves_as_expected(): void
    {
        $name = $this->faker->name();
        $identifiacation = $this->faker->word();
        $birth = Carbon::parse($this->faker->dateTime());
        $salary = $this->faker->numberBetween(-10000, 10000);
        $marital_status = $this->faker->randomElement(/** enum_attributes **/);
        $order = $this->faker->randomNumber();
        $department = Department::factory()->create();

        $response = $this->get(route('employees.test'), [
            'name' => $name,
            'identifiacation' => $identifiacation,
            'birth' => $birth->toDateTimeString(),
            'salary' => $salary,
            'marital_status' => $marital_status,
            'order' => $order,
            'department_id' => $department->id,
        ]);
    }
}
