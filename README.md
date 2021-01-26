# KAMAR Notices

This is a website built for displaying KAMAR notices it also has a built-in API and caches the responses from KAMAR

### Setting up

To set your portal url you must edit the file ``.env`` and replace YOUR_PORTAL_DOMAIN with the domain of your KAMAR
portal (e.g. portal.your.school.nz)

```dotenv
APP_PORTAL=YOUR_PORTAL_DOMAIN
```

To download the required dependencies you must run:

```console
$ npm install & php composer.phar install
```

Then you must build the assets using the following command:

```console
$ npm run dev
```

### Testing the server

To serve the site locally you can run the following command in the project directory

```console
$ php artisan serve
```

### API

You can access the API by sending a get request to

```
/api/notices/DAY-MONTH-YEAR
```

This will respond with a JSON result similar to this (Responses from KAMAR are cached for 1 hour)

```json
{
    "cache": true,
    "date": "28-02-2020",
    "notices": [
        {
            "place": "Example Place",
            "date": "2020-02-28",
            "time": "1pm",
            "level": "All",
            "subject": "Example Meeting",
            "body": "This notice is an example meeting notice",
            "teacher": "EXA"
        },
        {
            "level": "All",
            "subject": "Example General",
            "body": "This notice is an example general notice",
            "teacher": "EXA"
        }
    ]
}
```

### Clearing the cache
To clear the cache which stores the KAMAR results you can type 
```console
$ php artisan cache:clear
```

### Embedding
To format the document without any buttons and just the notices you can format
your GET request as such
```
/DAY-MONTH-YEAR/embed
```
This will remove the header bar and only show the notices

### Production
To prepare the project for production use you need set the following lines in .env
```dotenv
APP_ENV=production
APP_DEBUG=false
```

Then run the following command to build the production assets
```console
$ npm run prod
```
