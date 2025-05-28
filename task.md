### Pre Dev
- [x] Setup laravel + filament
- [x] buat quote status enum
- [x] buat quote service type enum
- [x] buat quote model dan migration
- [ ] install pest
- [x] install Date Range Filter and Picker
- [ ] install phpstan
- [ ] install pint


### High (MVP)
- [x] user can send quote from frontend using filament form if success show notif 
- [x] View a list of all quotes
- [x] Filter quotes by status, service, created date and booking date
- [x] Search by name, email, phone or address
- [x] Sort by created date or booking date
- [x] Approve a quote, allowing staff to override and set the price if necessary.
- [x] Reject a quote with a reason.
- [x] Mark an approved quote scheduled.
- [x] Mark a scheduled quote as invoiced.
- [x] View full quote details, including an estimated, automatically-generated price.

### Medium
- [x] set .env mail using mailtrap
- [x] Send email to user when quote submitted
- [x] Send email to admin when new quote submitted
- [ ] Send email to user when quote approved with the price
- [ ] Send email to user when quote rejected with the reject reason

### Low
- [ ] look for optimize the code
- [ ] add try and catch in create() Home
- [ ] add throller if submitted to many
- [x] add custom theme
- [ ] add testing for mvp feature
- [ ] See scheduled quotes on a calendar page.
- [x] Store and format dates in UTC.