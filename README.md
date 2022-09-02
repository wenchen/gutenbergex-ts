# WordPress Gutenberg Block Example in Typescript

## Installation

1. Clone the project and remove `.git`
2. Edit plugin information in`package.json`, `config.php` and `admin/info.ts`
3. In terminal, execute `yarn` to install all package

### Compile and pack
1. `yarn build` to generate admin and client JS code in `public/{admin|client}`
2. `yarn plugin-zip` to build zipped package

### Development
1. Put admin JS block code in `admin/`
2. Put client JS code using PlainJS in `client/main.ts`
3. Put Server code in `src`
4. Start webpack-watch `yarn dev` to watch your code and compile it