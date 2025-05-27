### 
Saya tidak menggunakan pendekatan TDD, dikarenakan keterbatasan waktu yang ada, sehingga, sya menaruh

- kenapa di database sya menyimpan status dan service type sebagai string dan bukan enum karna jika sya menggunakan enum dimasa depan jika terdapat perubahan, akan sangat susah dan menggangu jika harus merubah-ubah struktur tabel di database, oleh sebab itu, saya rasa ini harus di taruh d luar database
- kenapa saya menggunakan enum dibandingkan sushi untuk menyimpan data static seperti status dan service type, karna menggunakan enum sudah sangat cukup untuk kasus ini.
