# SiteBank v2 — Multi-brand BPR Website Platform

## Stack

- **Laravel 12**, PHP 8.2+, PostgreSQL (dev), SQLite (default/test)
- **Vite** + Bootstrap 5 + Sass + TailwindCSS v4
- **Packages**: DomPDF, Laravel Excel, Jenssegers Agent, Laravel UI

## Quick commands

```bash
composer dev            # runs artisan serve + queue:listen + pail + Vite concurrently
composer test           # config:clear + artisan test (PHPUnit)
npm run build           # Vite production build
./vendor/bin/pint       # Laravel Pint (PSR-12 style fixer)
```

## Multi-brand theme system

The `.env` file selects which frontend brand is active. All brands live under `resources/views/frontend/{brand}/` and `public/frontend/{brand}/`.

- `CUSTOM_PAGE_BERANDA` — homepage view path
- `GLOBAL_INCHEAD`, `GLOBAL_INCHEADER`, `GLOBAL_INCFOOTER` — shared layout partials
- `GLOBAL_LOGO`, `GLOBAL_TOPPAGE`, `GLOBAL_TOPMOBILE` — asset paths
- `GLOBAL_*` vars for every page (sejarah, kantor, kredit, tabungan, deposito, gallery, pengaduan, etc.)
- `SIMULASI_KREDIT`, `SIMULASI_DEPOSITO`, `SIMULASI_TABUNGAN` — simulation form views
- `FORMPENGAJUANKREDIT`, `FORMPENGAJUANDEPOSITO`, `FORMPENGAJUANTABUNGAN` — application form views

To switch brands, comment/uncomment the corresponding block in `.env`. Each brand block has ~30 `GLOBAL_*` vars.

## Admin panel

- **Prefix**: `/salamprofit` (guarded by `admin` middleware)
- `role == 0` → full admin access
- Auth routes have `register => false`, `reset => false`, `verify => false`
- Resources: banner, user, pages, produklayanan, gallery, jaringan-kantor, lelang, profile, rekruitmen, laporan, seo-setting, wbs, master-produk-*, master-jenis-*, dll.

## Frontend routes

- `/` → BerandaController (uses `CUSTOM_PAGE_BERANDA` view)
- `/informasi`, `/kredit`, `/deposito`, `/tabungan`, `/pengajuanonline`, `/lelang-jualaset`, `/rekrutmen`, `/pengaduan`, `/galery`
- `/api/mapi*` — mobile API (read-only, JSON)
- File serving: `/recfil?rf=path&display=true` streams from Storage

## Key conventions

- **Database driver**: SQLite in test (`phpunit.xml`), PostgreSQL in `.env` (active), MySQL/others also configured
- **Session driver**: `database` (needs sessions table migration)
- **Cache driver**: `database`
- **Queue driver**: `database`
- **Visitor tracking**: `CountVisitor` middleware applied globally via `bootstrap/app.php` — tracks unique IP per page per day
- **Locale**: Indonesian locale (`Carbon::setLocale('id')`, `LC_TIME=id_ID.UTF-8`)
- **Helper pseudo-namespace**: `App\Helper\GlobalHelper` (not PSR-4 autoloaded directly under `App\`)
- **Exports**: `App\Exports\MontlyExportExcel` (Maatwebsite/Laravel Excel)
- **PDF charts**: use QuickChart.io external service (requires internet for PDF generation)
- **Code style**: Laravel Pint (`./vendor/bin/pint`)

## Testing

- PHPUnit with Unit + Feature suites
- SQLite in-memory (`:memory:`) for test DB
- Run: `composer test`

## Notable files

| Path | Purpose |
|---|---|
| `bootstrap/app.php` | Middleware registration (CountVisitor global, admin alias) |
| `routes/web.php` | All web routes (admin prefix `/salamprofit`) |
| `routes/api.php` | Mobile API endpoints (`/api/mapi*`) |
| `app/Providers/AppServiceProvider.php` | Global view composer (SEO, kantor, visitor counts) |
| `.env` | Brand selection via `CUSTOM_PAGE_BERANDA` and `GLOBAL_*` vars |

## Multi-brand directories

Brands: `bprana`, `bprapm`, `bprbahari`, `bprbaja`, `bprbhaktiriyadi`, `bprdatagita`, `bprjas`, `bprkotabaru`, `bprphm`, `bprrudo`, `bprsahabattata`, `bprsms`, `bprstaja`, `bprsulawesi`, `bprsuryakencana`, `bprtanadoang`, `bprtaruna`, `nusaintim`.
