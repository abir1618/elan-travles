# ÉLAN Travel Studio — Laravel + MySQL

Premium travel-agency website and admin studio built for local XAMPP development.

## Stack
- Laravel 12 / PHP 8.2+
- MySQL
- Blade + modern CSS + vanilla JavaScript
- GSAP + ScrollTrigger + Lenis via CDN for motion
- Session-based admin authentication + CSRF-protected admin API

## XAMPP setup
1. Install XAMPP with PHP + MySQL.
2. Start **Apache** and **MySQL**.
3. Create a MySQL database named `elan_travel` in phpMyAdmin.
4. Copy this folder into `C:\xampp\htdocs\elan-travel`.
5. Open a terminal in that folder.
6. Run:
   ```bash
   composer install
   copy .env.example .env
   php artisan key:generate
   php artisan storage:link
   php artisan migrate --seed
   php artisan serve
   ```
7. Open `http://127.0.0.1:8000`.

### Admin
Open `http://127.0.0.1:8000/admin/login`

Seeded local credentials:
- Email: `admin@elantravel.test`
- Password: `Admin@2026!`

Change these credentials before production use.

## Production notes
The demo uses remote Unsplash image URLs as placeholders. Replace them with properly licensed image assets or your own CDN. For production, use HTTPS, a managed MySQL instance, queued mail, server-side image uploads, backups, and secrets outside source control.

## Motion system
The public experience includes:
- Cinematic loader
- Inertial smooth scroll
- Masked typography entrances
- Scroll-linked parallax
- Horizontal/drag journey rail
- 3D pointer tilt
- SVG displacement filter for subtle image distortion
- Magnetic UI controls
- Custom cursor states
- Marquee motion
- Reduced-motion accessibility fallback

## Architecture
- Public read endpoints live under `/api/*` and are intentionally stateless.
- Admin read/write endpoints live under `/admin-api/*` behind Laravel session authentication, the admin gate, and CSRF protection.
- The public booking form writes to MySQL through `POST /api/bookings`.
- The admin dashboard reads the same MySQL records and can create/update/delete journeys and journal entries and update booking status.
