### Summary
This is a minimal implementation of the quoting system based on the brief. I prioritized core functionality, including public quote submission, admin quote management via Filament, basic filtering, status transitions (approve, reject, schedule, invoice), and email notifications.
The goal was to build a clean, working MVP within the 2-hour constraint, focusing on pragmatic delivery over over-engineered abstractions.


### What you chose not to build and why (if applicable)
- Test-driven development (TDD):
Due to time constraints, I did not adopt a TDD approach. However, I included basic business logic tests for core functionality. If extended, the system should include full test coverage using Pest and ideally move side effects like emails into jobs for easier testing.

- Database enums for status and service types:
I stored service types and statuses as strings rather than database-level enums to keep schema changes minimal and flexible. This avoids potential migration issues when enum values need to change.

- No role-based user management:
Since this is a single-user internal admin panel for now, I did not implement user roles. In a production scenario with multiple staff roles, I would integrate proper role-based access control using Laravel's policies or Spatie Permissions.

- Not using Sushi or external config for static data:
I chose PHP enums instead of packages like Sushi because enums are native, simple, and sufficient for this use case.

- Email sending not deferred via job queue:
I called email sending directly inside actions to keep it simple and avoid job setup. In production, this should be offloaded to jobs for better performance and testability.

- No custom action classes:
For actions like approve/reject/schedule, I used inline logic within Filament's resource actions. If these actions were reused elsewhere or became more complex, I would extract them into custom actions or services.

- No audit log:
I did not include admin action tracking (e.g., who approved or rejected a quote). In a production build, I would add an audit_logs table or use an activity logger package to track all status changes for accountability.

- No email confirmation for quote submission:
To keep things simple, I skipped customer email confirmation (e.g., to prevent spam). Ideally, the system would require email verification or rate-limiting.

- No reminder system:
While helpful, I skipped implementing reminder emails (e.g., day-of-service reminder for staff/customers) to stay within the 2-hour limit. This could be added via scheduled jobs.

- Used SQLite for local development:
Chosen for its simplicity, no setup time, and compatibility with Laravel.

- Did not include email-sending tests:
I used Laravel’s defer() function to send emails after the response is returned. Because of this, the email logic can't be tested directly. In a production setup, I would move the email logic into a job to make it testable.


### How you would build on the application to make it client-ready
- Implement queue jobs for all email dispatching to improve responsiveness and allow for easier testing.
- Add full test coverage using Pest.
- Build an audit trail system to log every status change and who made it.
- Enable email confirmation & spam protection via token-based confirmation links.
- Enhance dashboard with metrics: pending quotes, revenue from invoiced jobs, approval rates.
- Add service-day reminders using scheduled notifications for customers and staff.


## Development Task Checklist

### Pre-Development
- [x] Set up Laravel and Filament
- [x] Created `QuoteStatusEnum`
- [x] Created `ServiceTypeEnum`
- [x] Created `Quote` model and migration
- [x] Installed Pest for testing
- [x] Installed Date Range Filter and Date Picker package
- [x] Installed PHPStan for static analysis
- [x] Installed Laravel Pint for code style formatting

### High Priority (MVP)
- [x] Users can submit a quote request via a public Filament form with success notification
- [x] Display a list of all submitted quotes in the admin panel
- [x] Enable filtering by status, service type, created date, and booking date
- [x] Enable searching by name, email, phone number, or address
- [x] Enable sorting by created date and booking date
- [x] Approve quotes with the ability for staff to override the price
- [x] Reject quotes with a required rejection reason
- [x] Mark approved quotes as scheduled
- [x] Mark scheduled quotes as invoiced
- [x] View full quote details including automatically calculated estimated price

### Medium Priority
- [x] Configure email using Mailtrap in `.env`
- [x] Send confirmation email to customer upon quote submission
- [x] Notify admin via email when a new quote is submitted
- [x] Send email to customer when a quote is approved (including the final price)
- [x] Send email to customer when a quote is rejected (including the reason)

### Low Priority
- [x] Store and format all dates in UTC
- [x] Perform code optimization and cleanup
- [x] Implement throttling to prevent spam submissions
- [x] Apply custom theme styling
- [ ] Display scheduled quotes on a calendar view (Pending)
- [x] Add basic test coverage for MVP functionality
- [x] Create setup script for local development
- [ ] Deploy application to a server for live demo (Pending)
