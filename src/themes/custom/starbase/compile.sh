#!/bin/sh
cd $(dirname "$0");
BASEDIR=$(pwd);

echo -e "\nCompiling source/scss to source/css...\n";
cd $BASEDIR;
sass --update --force --scss -r sass-globbing source/scss/:source/css/

echo -e "\nAggregating pattern JS files to source/js/patterns.js...\n";
cd $BASEDIR/source;
echo -e "JS files found:";
find ./_patterns -type f -name '*.js';
find ./_patterns -type f -name '*.js' -exec cat {} ';' > js/patterns.js

echo -e "\nCompiling Pattern Lab public directory...\n";
cd $BASEDIR/../../../patternlab;
php core/console --generate;

echo -e "\nAdd legacy browser support to our compiled styles...\n";
cd $BASEDIR/source;
npm run prefix-css;

echo -e "\nFinished\n";
