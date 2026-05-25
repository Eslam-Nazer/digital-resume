# Digital Resume

A personal CV web application built with Laravel and Blade. Displays structured CV data from a JSON file, renders it as a responsive web page using Tailwind CSS, and generates a downloadable PDF.

---

## Tech Stack

- **Laravel 12** — application framework
- **Blade** — templating engine
- **Tailwind CSS** (CDN, browser build) — styling
- **Font Awesome** — icons
- **spatie/browsershot** — PDF generation

---

## Local Development Setup

### Prerequisites

- PHP >= 8.2
- Composer
- Git

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/Eslam-Nazer/digital-resume.git
cd digital-resume

# 2. Install PHP dependencies
composer install

# 3. Copy the environment file
cp .env.example .env

# 4. Generate the application key
php artisan key:generate

# 4. Install npm packages and make sure you have Node.js
npm install

# 6. Start the development server
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000) in your browser.

> **Note:** No database is required. The application reads all data from `storage/app/private/cv.json`.

---

## Updating CV Content

All CV data lives in a single JSON file:

```
storage/app/private/cv.json
```

Open and edit it directly. The structure is:

### Field reference

| Field | Type | Notes |
|---|---|---|
| `experience.to` | `string \| null` | Set to `null` for current job — displays as "Present" |
| `experience.highlights` | `array` | Can be empty `[]` — section is hidden if so |
| `social.platform` | `string` | Must match a Font Awesome brand icon name (e.g. `github`, `linkedin`) |
| `skills` | `object` | Keys become category labels — add or rename freely |
| `personal.summary.extra` | `string` | Optional — omit the key or leave blank to hide |

After editing, clear the cache so changes appear immediately:

```bash
php artisan cache:clear
```

> CV data is cached for 6 hours by default. In local development you can set `CACHE_DRIVER=array` in `.env` to disable caching entirely.

---

## PDF Download

A **Download PDF** button is visible on the web page. It generates an A4 PDF of your CV on the fly via DomPDF.

Direct URL:

```
GET /download
```

The PDF is generated from the same JSON data. If you update `cv.json` and clear the cache, the next download reflects the changes immediately.

---

## Running Tests

```bash
# Run the full test suite
php artisan test

# Run with coverage report (requires Xdebug or PCOV)
php artisan test --coverage
```

Tests are located in `tests/Unit` and `tests/Feature`.

---

## Project Structure

```
storage/app/private/
└── cv.json                 # ← all CV data lives here

app/
├── Http/Controllers/
    └── CvController.php    # index() and download()

resources/views/
├── layouts/
│   └── app.blade.php       # base layout, handles web vs PDF mode
├── cv.blade.php            # main content view
└── cv-header.blade.php     # name, title, contact, social links

routes/
└── web.php                 # GET / and GET /download
```

---
