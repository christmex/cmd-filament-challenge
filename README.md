### 
Saya tidak menggunakan pendekatan TDD, dikarenakan keterbatasan waktu yang ada, sehingga, sya menaruh

- kenapa di database sya menyimpan status dan service type sebagai string dan bukan enum karna jika sya menggunakan enum dimasa depan jika terdapat perubahan, akan sangat susah dan menggangu jika harus merubah-ubah struktur tabel di database, oleh sebab itu, saya rasa ini harus di taruh d luar database
- kenapa saya menggunakan enum dibandingkan sushi untuk menyimpan data static seperti status dan service type, karna menggunakan enum sudah sangat cukup untuk kasus ini.
- kenapa sya melakukan setup menggunakan laravel 11 dan filament 3 di awal? agar lebih mudah setup tailwind, enghindari error yang tidak diperlukan, mengambil versi stabil kmudian sisanya saya tinggal update ke laravel 12, tidak ada perbedaan signifikan di laravel 11 dan 12, yang sya lakukan adalah menghindari melakukan downgrade tailwind4 ke 3 karna akan menghabiskan waktu untuk mengurus bug dari downgrade tailwind
- Kenapa saya menggunakan tabs untuk filter status, secara UX inipendekatan yang lebih tepat karna to the point, sehingga admin yang lht lngsung tau berdasarkan status