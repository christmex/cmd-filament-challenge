### Summary
This is a minimal implementation of the quoting system based on the brief. I prioritized core functionality, including public quote submission, admin quote management via Filament, basic filtering, status transitions (approve, reject, schedule, invoice), and email notifications.

The goal was to build a clean, working MVP within the 2-hour constraint, focusing on pragmatic delivery over over-engineered abstractions.


### What you chose not to build and why (if applicable)
Test-driven development (TDD):
Due to time constraints, I did not adopt a TDD approach. However, I included basic business logic tests for core functionality. If extended, the system should include full test coverage using Pest and ideally move side effects like emails into jobs for easier testing.

Database enums for status and service types:
I stored service types and statuses as strings rather than database-level enums to keep schema changes minimal and flexible. This avoids potential migration issues when enum values need to change.

No role-based user management:
Since this is a single-user internal admin panel for now, I did not implement user roles. In a production scenario with multiple staff roles, I would integrate proper role-based access control using Laravel's policies or Spatie Permissions.

Not using Sushi or external config for static data:
I chose PHP enums instead of packages like Sushi because enums are native, simple, and sufficient for this use case.

Email sending not deferred via job queue:
I called email sending directly inside actions to keep it simple and avoid job setup. In production, this should be offloaded to jobs for better performance and testability.

No custom action classes:
For actions like approve/reject/schedule, I used inline logic within Filament's resource actions. If these actions were reused elsewhere or became more complex, I would extract them into custom actions or services.

No audit log:
I did not include admin action tracking (e.g., who approved or rejected a quote). In a production build, I would add an audit_logs table or use an activity logger package to track all status changes for accountability.

No email confirmation for quote submission:
To keep things simple, I skipped customer email confirmation (e.g., to prevent spam). Ideally, the system would require email verification or rate-limiting.

No reminder system:
While helpful, I skipped implementing reminder emails (e.g., day-of-service reminder for staff/customers) to stay within the 2-hour limit. This could be added via scheduled jobs.

Email design limited to tables:
I used simple table-based email layouts due to poor support for CSS Flex/Grid in most email clients.

Admin layout using top navigation instead of sidebar:
Since there are only a few pages, I opted for top navigation for a cleaner and more spacious UI, especially for table-heavy views.

Used SQLite for local development:
Chosen for its simplicity, no setup time, and compatibility with Laravel.

Did not include email-sending tests:
Email logic was directly invoked (not job-dispatched), making it harder to test. In a production-ready app, this would be extracted and tested independently.


### How you would build on the application to make it client-ready
- Implement queue jobs for all email dispatching to improve responsiveness and allow for easier testing.
- Add full test coverage using Pest.
- Build an audit trail system to log every status change and who made it.
- Enable email confirmation & spam protection via token-based confirmation links.
- Enhance dashboard with metrics: pending quotes, revenue from invoiced jobs, approval rates.
- Add service-day reminders using scheduled notifications for customers and staff.