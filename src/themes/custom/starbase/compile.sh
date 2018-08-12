#!/bin/sh
cd $(dirname "$0");
THEMEDIR=$(pwd);

echo -e "\nCompiling source/scss to source/css...\n";
cd $THEMEDIR;
sass --update --force --scss -r sass-globbing source/scss/:source/css/

echo -e "\nAggregating pattern JS files to source/js/patterns.js...\n";
cd $THEMEDIR/source;
echo -e "JS files found:";
find ./_patterns -type f -name '*.js';
find ./_patterns -type f -name '*.js' -exec cat {} ';' > js/patterns.js

echo -e "\nCompiling Pattern Lab public directory...\n";
cd $THEMEDIR/../../../patternlab;
php core/console --generate;

echo -e "\nAdd legacy browser support to our compiled styles...\n";
cd $THEMEDIR;
`npm bin`/postcss --config source/js/postcss.config.js --replace "source/css/style.css";

echo -e "\nFinished\n";
