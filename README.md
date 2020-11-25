# Templet
WordPress Starter Theme Based on Foundation Sites

## Introduction
Templet is designed to be the foundation to create new WordPress theme, it's not meant to be used as parent child, so just copy it and start editing!

## Features
- Based on [Foundation Sites](http://foundation.zurb.com/sites/docs/)
- SCSS: All styles are written in SCSS following BEM standards
- Gulp: A gulpfile is included with tasks for Styles, Scripts & BrowserSync
- Compatibility with common plugins: Contact Form 7 or WooCommerce for example have basic layout styles

## Installation

Clone or download the repository on your theme folder
```
https://github.com/polsola/templet.git
```

Navigate to the folder with terminal and run
```
npm install
```

Then open [gulpfile.js](./gulpfile.js) and change the `url` variable to match the one on your local env
```
var project     = 'templet', 
    url         = 'templet.dev';
```

To start editing just type
```
gulp
```