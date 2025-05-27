### Pre Dev
- [x] Setup laravel + filament
- [x] buat quote status enum
- [x] buat quote service type enum
- [x] buat quote model dan migration
- [ ] install pest
- [ ] install debugbar
- [ ] install phpstan
- [ ] install pint
- [ ] install Date Range Filter and Picker


### High (MVP)
- [x] user can send quote form from frontend using filament form
- [x] user can get success notif with email sent if the form submitted succsfully 
- [x] Listing semua quote (table view)
- [x] Filter: status, service, created date, booking date
- [ ] Search: name, email, phone, address
- [ ] Sort: created date, booking date
- [ ] Show full details + estimasi harga (auto-calc: duration x hourly rate)
- [ ] Approve quote (boleh override harga) + kirim email ke customer
- [ ] Reject quote + email ke customer dengan alasan
- [ ] Tandai sebagai Scheduled
- [ ] Tandai sebagai Invoiced

### Medium
- [ ] Send email to user when quote submitted
- [ ] Send email to admin when new quote submitted

### Low
- [ ] add throller if submitted to many