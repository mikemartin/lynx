# Bitlynx ![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)


Shorten share links with Bit.ly

This addon creates a modifier to shorten urls using the Bit.ly API

## Installation
Install the addon via composer:
```
composer require mikemartin/lynx:dev-v3
```

Add your [Bit.ly Generic Access Token](http://dev.bitly.com/) in your `.env` file:
```
BITLY_ACCESS_TOKEN=your_secret_bitly_access_token
```

Publish the config file:
```
php artisan vendor:publish --provider="Mikemartin\Bitlynx\ServiceProvider" --tag="config"
```

Shorten any url using the new `bitlynx` modifier!
```
{{ permalink | bitlynx }}
```

## Branded Links [TODO: update for v3]

It's best to generate branded links on your production server only to avoid hitting your limit of 500 branded Bitlinks per month. Configure the server you'd like Lynx to run on through the addons settings.

```
environments:
  - production
```