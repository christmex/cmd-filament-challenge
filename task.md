### Pre Dev
- [x] Setup laravel + filament
- [x] buat quote status enum
- [x] buat quote service type enum
- [x] buat quote model dan migration
- [ ] install pest
- [ ] install phpstan
- [ ] install pint
- [ ] install Date Range Filter and Picker


### High (MVP)
- [x] user can send quote form from frontend using filament form
- [x] user can get success notif with email sent if the form submitted succsfully 

- [x] View a list of all quotes
- [x] Filter quotes by status, service, created date and booking date
- [x] Search by name, email, phone or address
- [x] Sort by created date or booking date
- [ ] View full quote details, including an estimated, automatically-generated price.
- [x] Approve a quote, allowing staff to override and set the price if necessary.
      - [ ] This action should send an email to the customer with the price.
- [ ] Reject a quote with a reason.
      - [ ] This action should send an email to the customer with the reason.
- [ ] Mark an approved quote scheduled.
- [ ] Mark a scheduled quote as invoiced.

### Medium
- [ ] Send email to user when quote submitted
- [ ] Send email to admin when new quote submitted

### Low
- [ ] add throller if submitted to many
- [ ] add custom theme
- [ ] add testing for mvp feature
- [ ] See scheduled quotes on a calendar page.