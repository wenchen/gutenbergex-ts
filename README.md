# WordPress Gutenberg Block Example in Typescript

## Requirement
* PHP 8.0+
* nodejs v16+ with yarn

## Installation
1. Clone the project and remove `.git`
2. Edit plugin information in`package.json`, `config.php` and `admin/info.ts`
3. In terminal, execute `yarn` to install all package

### Compile and pack
1. `yarn build` to generate admin and client JS code in `public/{admin|client}`
2. `yarn i18n` to generate pot file under `languages` folder
3. `yarn i18n:json` to generate front-end language json under `languages` folder
3. `yarn plugin-zip` to build zipped package

### Development
1. Put admin JS block code in `admin/`
2. Put client JS code using PlainJS in `client/main.ts`
3. Put Server code in `src`
4. Start webpack-watch `yarn dev` to watch your code and compile it

### i18n
1. `yarn i18n` to generate `template.pot` file under `languages` folder
2. Generate `mo` and `po` file using Poedit or other tools, and put it under languages folder
3. `yarn i18n:json` to generate front-end i18n-json
4. make sure `info.i18nDomain` in `admin/info.tsx` as same as `PROJECT_CONFIG['i18n_domain']` in `config.php`