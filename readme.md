


### Installation

```bash
# Clone this repo
git clone https://github.com/raulcostea77/roskilde_camp.git

# Install composer dependencies
composer install

# Create and fill in the [`.env`](.env.example) file with the app url and database credentials
cp .env.example .env

# Generate an application key
php artisan key:generate

# Install Node JS depencies
npm install

# Run webpack to compile styles and scripts
# Read the laravel mix docs here: https://laravel.com/docs/5.4/mix
npm run watch

# Start a local server.
# You can either use WAMP, MAMP, etc.
# or you can start the built-in server:
php artisan serve
```

### Optional installation steps and recommendations

```bash
# Run database migrations (install auth tables)
# Run this command only if you want to use 
# Laravel's built-in authentication.
php artisan migrate
```




### Usage

- Customize foundation by editing [resources/assets/sass/_settings.scss](resources/assets/sass/_settings.scss)
- write your custom styles in [resources/assets/sass/app.scss](resources/assets/sass/app.scss)
- write your custom JavaScript in [resources/assets/js/app.js](resources/assets/js/app.js)
