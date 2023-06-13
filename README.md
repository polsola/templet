![alt text](https://github.com/polsola/templet/blob/master/screenshot.png?raw=true)

# Templet

> WordPress Starter Theme Based on Tailwind

## Introduction

Templet is designed to be the foundation to create new WordPress theme, it's not meant to be used as parent child, so just copy it and start editing!

## Requirements

- PHP >=7.2
- [Composer](https://getcomposer.org/)
- [WordPress](https://wordpress.org) >=5.1

## Features

- Includes [Tailwind](https://tailwindcss.com/) configuration for CSS
- Gulp: A gulpfile is included with tasks for Styles, Scripts & BrowserSync
- [PostTypes](https://github.com/jjgrainger/PostTypes) is already included to easly created new Post Types
- WooCommerce Integration
- WPML custom language switcher
- Contact Form Optimitzation functions

## Installation

Clone or download the repository on your theme folder

```
https://github.com/polsola/templet.git
```

Navigate to the folder with terminal and run

```
composer install
```

```
npm install
```

Then open [gulpfile.js](./gulpfile.js) and change the `url` variable to match the one on your local env

```
var project     = 'templet',
    url         = 'templet.localhost';
```

To start editing just type

```
npm start
```
