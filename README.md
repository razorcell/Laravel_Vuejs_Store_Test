A Test project for the Laravel/Vuejs Stack through a simple store.

Installation:

1 - Clone repository
2 - Navigate to the app directory and run the following to install Laravel packages
`composer install`
In case you have memory limit issues:

```
Error : Fatal error: Allowed memory
```

Use the following command prefix to override composer internal memory limits:

`php -d memory_limit=-1 C:\\composer\\composer.phar install`
Replace composer path if necessary !
3 - Install nodejs packages using
`npm install`
4 - Edit .env file using your local environment settings

5 - Generate Dummy database entries
`php artisan -v migrate:fresh --seed` - Optionally, you could generate your own key using: 'php artisan key:generate'

6 - Run Laravel backend server
`php artisan serve` - Optionally, you could change the listening port using 'php artisan serve --port=8080 // For port 8080'
7 - Run Vue.js Frontend for Development
`npm run dev`
Watching for changes: Running npm run dev every time you make changes to file is inefficient. Hopefully there's command so your changes can be watched and get reflected accordingly.
`npm run watch`
8 - Open your browser and go to `http://127.0.0.1:8000`
