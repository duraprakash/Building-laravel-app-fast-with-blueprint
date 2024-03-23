<?php

namespace Tests\Feature\Http\Controllers;

use App\Mail\ThanksMail;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
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

        Mail::fake();

        $response = $this->get(route('employees.test'));

        Mail::assertSent(ThanksMail::class, function ($mail) {
            return $mail->hasTo($employee->contactInfo->email);
        });
    }
}
