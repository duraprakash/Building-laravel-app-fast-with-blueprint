<?php

namespace Tests\Feature\Http\Controllers;

use App\Events\FancyEvent;
use App\Models\Project;
use App\Notification\checkDetails;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
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
        $employee = Project::factory()->create();

        Event::fake();
        Notification::fake();

        $response = $this->get(route('employees.test'));

        $response->assertSessionHas('employee.name', $employee->name);

        Event::assertDispatched(FancyEvent::class, function ($event) use ($employee) {
            return $event->employee->is($employee);
        });
        Notification::assertSentTo($employee, checkDetails::class, function ($notification) use ($project) {
            return $notification->project->is($project);
        });
    }
}
