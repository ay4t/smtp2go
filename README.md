# PHP SMTP2GO Rest API Client
Library PHP untuk integrasi dengan API SMTP2GO. SMTP2GO dengan API template yang sudah dibuat di dashboard SMTP2GO memberikan keuntungan bagi pengguna dalam mengirim email secara efisien. Dengan API template, pengguna dapat mengatur template email yang siap pakai sesuai dengan kebutuhan bisnis, sehingga memudahkan dalam pengiriman email massal. Selain itu, SMTP2GO juga memberikan kecepatan pengiriman email yang tinggi, kemampuan untuk melacak pengiriman email, dan keamanan tingkat tinggi untuk melindungi email dari spam dan serangan phishing. Semua keuntungan ini membuat SMTP2GO dengan API template menjadi solusi terbaik untuk pengiriman email massal dengan cepat, efisien, dan aman.
# Instalasi
```
composer config repositories.smtp2go vcs git@github.com:ay4t/smtp2go.git
composer require ay4t/smtp2go:main-dev
```
# Contoh Penggunaan
```
$apiKey = 'YOUR_API_KEY';

/** contoh mengirim email biasa */
$email = new \Ay4t\Smtp2go\Email( $apiKey );
$email
    ->setSender('Ayatulloh Ahad R', 'pengirim@email.com')
    ->toAddress('Ayatulloh Ahad R', 'penerima@email.com')
    ->setSubject('coba kirim email lagi')
    ->textBody('hallo ini coba kirim email lagi')
    ->send();
var_dump($email);
```
```
/** contoh mengirim email dengan HTML */
$email = new \Ay4t\Smtp2go\Email( $apiKey );
$email
    ->setSender('Ayatulloh Ahad R', 'pengirim@email.com')
    ->toAddress('Ayatulloh Ahad R', 'penerima@email.com')
    ->setSubject('coba kirim email lagi')
    ->htmlBody('<h1>hallo ini kirim email dengan HTML</h1>')
    ->send();
var_dump($email);
```
```
/** contoh mengirim email dengan template yang sudah ada di dalam dashboard SMTP2GO */
$email = new \Ay4t\Smtp2go\Email( $apiKey );
$email
    ->setSender('Ayatulloh Ahad R', 'pengirim@email.com')
    ->toAddress('Ayatulloh Ahad R', 'penerima@email.com')
    // template ID harus type string bisa dilihat di dashboard SMTP2GO
    ->setTemplateID( (string) 7791324)
    ->setTemplateData([
        'company_name' => 'Indiega',
        'company_logo' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiC7jSFwKT06zyJF9X4llglTkNMeJEJRCwFrCsIrkaTUz1kRQ9VxRR3duyaNdmZqk3gGcJpkUyooNKQ8ukcGy7F0afkQZcVE85o1cAhaQfSE0ehAPAk3AjABA3puVzb8jM9EShy_2iNXjtM7Jw7VMhnR-jxpEOdZYLcL2UzjR8BLIRhgTauzuGgBf2T/s1600/indiega-web-logo-path.png',
        'company_address' => 'Jl. Raya Cikarang',
        'user_fullname' => 'Ayatulloh Ahad R',
        'username' => 'ayatulloh',
        'password' => 'password'
    ])
    ->send();
var_dump($email);
```