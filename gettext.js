let package_info = require('./package.json');
let current_date = new Date();

let execSync = require('child_process').execSync;
const fs = require('fs');

let handler = "", domain = "", handler_name = "name", domain_name = "i18n_domain";
try {
    const phpCode = fs.readFileSync('config.php', 'utf8');
    let nsRegex = /^namespace ([a-zA-z]+) {/gm;
    const phpNS = nsRegex.exec(phpCode)[1];
    let stdout = execSync(`php -r \'namespace ${phpNS};include("config.php"); echo namespace\\PROJECT_CONFIG["${handler_name}"]."#@#".namespace\\PROJECT_CONFIG["${domain_name}"];\'`, {encoding: 'utf8'});
    [ handler, domain ] = stdout.split('#@#');
} catch (err) {
    console.error(err);
}


const config = {
    "js": {
        "parsers": [
            {
                "expression": "__",
                "arguments": {
                    "text": 0,
                    "context": 1
                }
            },
            {
                "expression": "_e",
                "arguments": {
                    "text": 0,
                    "context": 1
                }
            },
            {
                "expression": "_n",
                "arguments": {
                    "text": 0,
                    "textPlural": 1,
                    "context": 3
                }
            }
        ],
        "glob": {
            "pattern": "./@(admin|client)/**/*.@(ts|js|tsx|jsx)",
            "options": {
                "ignore": "./@(admin|client)/**/*.spec.@(ts|js|tsx|jsx)"
            }
        }
    },
    "headers": {
        "Project-Id-Version": `${package_info.name} ${package_info.version}`,
        "MIME-Version": "1.0",
        "Content-Type": "text/plain; charset=UTF-8",
        "Content-Transfer-Encoding": "8bit",
        "POT-Creation-Date": current_date.toISOString(), // 2022-09-09T04:59:37+00:00
        "Language": "",
        "X-Domain": domain,
        "X-Handler": handler,
        "X-Generator": "gettext-extract"
    },
    "output": "languages/template.pot"
};

module.exports = config;
