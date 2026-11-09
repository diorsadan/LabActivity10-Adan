# Barangay Bulletin – Purok Adan

Lab Activity 10 for Full-Stack Web Development. A simple barangay bulletin made with Laravel 12, SQLite and Eloquent where residents can browse, search and filter posts from barangay officials.

## Posts per page
I used **6** posts per page. My last name "Adan" only has 4 letters, so I followed the rule to use 6 if the last name is shorter than 6 letters.

## Custom category
My extra category is **Livelihood**, for posts about livelihood programs and trainings in the barangay.

## Birthday post
My pinned post is **"Purok Adan Clean-up Drive"**, written by Kagawad Dion Ren Adan, with published_at set to **2026-12-03** (my birthday).

## How to run
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve
```
Then open http://127.0.0.1:8000 in the browser.
