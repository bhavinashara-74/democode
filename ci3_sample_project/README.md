# CI3 Sample Project for Tooling Checks

This is a minimal **CodeIgniter 3** project with example integrations to:
- GitHub public API (GET)
- OpenWeatherMap (GET, replace API key)
- A mocked Stripe-like charge endpoint (POST, local simulation)

**Notes**
- Replace `OPENWEATHER_API_KEY` in `application/libraries/Thirdparty_lib.php` to make real API calls.
- This project uses simple cURL calls; no external composer deps are required.
- The code is intentionally straightforward and includes comments to help static analysis tools detect structure and deprecated usages.

**How to use**
1. Place the folder under your web server root (e.g. `/var/www/html/ci3_sample_project`).
2. Ensure PHP and cURL extension are installed.
3. Point your browser to the project base URL.

