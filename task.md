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
