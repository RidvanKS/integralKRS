# 📚 IntegralKRS — YKS Sınav Hazırlık Platformu

Laravel tabanlı, öğrenci ve eğitimciler için tasarlanmış **öğrenme yönetim sistemi (LMS)**. Kurs yönetimi, ödev takibi, otomatik notlandırma ve sertifika oluşturma gibi özellikleriyle eksiksiz bir online eğitim altyapısı sunar.

> 🎓 Hitit Üniversitesi Bilgisayar Mühendisliği — Web Geliştirme Projesi

🔗 **Canlı:** [integralkrs.com.tr](https://integralkrs.com.tr)

---

## ✨ Özellikler

- 🎓 **Kurs Yönetimi** — ders oluşturma, modül düzenleme, içerik yükleme
- 📝 **Ödev Sistemi** — ödev atama, teslim alma ve otomatik notlandırma
- 📊 **İlerleme Takibi** — öğrenci bazlı kurs tamamlanma yüzdeleri
- 📜 **Sertifika** — kurs tamamlandığında otomatik sertifika oluşturma
- 📅 **Takvim** — ders ve ödev takvimi entegrasyonu
- 🇹🇷 **Tamamen Türkçe** — arayüz ve tüm içerikler Türkçe
- 👥 **Çoklu Rol** — admin, eğitimci ve öğrenci rolleri

---

## 🛠️ Kullanılan Teknolojiler

- **Backend:** Laravel (PHP 8.x)
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Veritabanı:** MySQL
- **Sunucu:** DirectAdmin paylaşımlı hosting
- **Geliştirme Ortamı:** Laragon (Windows)

---

## 🚀 Kurulum (Yerel Geliştirme)

```bash
# Repoyu klonla
git clone https://github.com/RidvanKS/integralKRS.git
cd integralKRS

# Bağımlılıkları yükle
composer install
npm install

# Ortam dosyasını oluştur
cp .env.example .env
php artisan key:generate

# Veritabanını ayarla (.env dosyasında DB bilgilerini düzenle)
php artisan migrate --seed

# Storage linkini oluştur
php artisan storage:link

# Uygulamayı başlat
php artisan serve
```

Tarayıcıda: **http://localhost:8000**

---

## 🔧 Çözülen Teknik Problemler

Proje boyunca karşılaşılan ve çözülen kritik sorunlar:

- **PDO Tip Uyuşmazlığı** — `ATTR_EMULATE_PREPARES=true` ayarı MySQL'den gelen tüm değerleri string döndürüyordu; sertifika ve notlandırma sistemindeki `=== 1` karşılaştırmaları kırılmıştı. Eloquent model `$casts` ile çözüldü.
- **Controller Namespace Çakışması** — `Backend\AssessmentController` farklı modüllerden gelen iki ayrı controller ile çakışıyordu; namespace düzenlemesiyle giderildi.
- **Kurs Tamamlanma Yüzdesi** — `course_module_weightages` tablosundaki bozuk JSON verileri yüzünden ilerleme sürekli %0 gösteriyordu; veri yapısı düzeltildi.
- **Üretim Ortamı Deployment** — DirectAdmin üzerinde storage symlink, PHP upload limitleri, timezone (`Europe/Istanbul`) ve `.env` yapılandırması sorunları çözüldü.

---

## 📁 Proje Yapısı

```
integralKRS/
├── app/                # Model, Controller, Middleware
├── config/             # Uygulama yapılandırması
├── database/           # Migration ve seeder dosyaları
├── public/             # Genel erişim dosyaları
├── resources/          # Blade view'ları, CSS, JS
├── routes/             # Web ve API rotaları
├── storage/            # Yüklenen dosyalar, loglar
├── .env.example        # Örnek ortam değişkenleri
├── composer.json       # PHP bağımlılıkları
└── package.json        # JS bağımlılıkları
```

---

## 📋 Gereksinimler

- PHP ≥ 8.0
- Composer
- Node.js + npm
- MySQL ≥ 5.7
- Laragon veya benzeri yerel sunucu (geliştirme için)

---

## 👤 Geliştirici

**Rıdvan Koçak**
Hitit Üniversitesi — Bilgisayar Mühendisliği

- 📧 kocak.ridvan@hotmail.com
- 🐙 [github.com/RidvanKS](https://github.com/RidvanKS)
