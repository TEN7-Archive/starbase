# Compiling Custom Boostrap
Projects should include a custom-built version of bootstrap. This allows you to customize bootstrap defaults for your project.

This directory contains files to compile a custom bootstrap installation for the site being built.
It uses NPM to load bootstrap files and override scss files for overwriting default bootstrap styles.

This also copies js files from the bootstrap node_module to make including bootstrap files in your theme easier.

Additional site theme styles DO NOT belong in this directory. Include them in the theme's SCSS directory files. 

NOTE: if you don't require any bootstrap overrides you can skip the following steps and simply make sure your theme global library includes `bootstrap-build/dist/custom-bootstrap.min.css`

## Compiling instructions
### 1. Install npm modules 
Node modules aren't tracked by git so they need to be imported when a new project is started
Refer to package.json for list of modules to be installed.
In terminal, inside the bootstrap_build directory, run
```npm install```

### 2. Override scss in any of the bootstrap_overrides files
You can updated default variables in any file within the bootstrap_overrides directory.

For example, to change grid breakpoints you would edit variables in `bootstrap_overrideds/_05-grid.scss`

###2b. Update autoprefixer browser support
Autoprefixer defaults are set in `package.json` under the "browserlist" key. Update the list here if this project needs to support older browsers.
 
More info can be found at <https://github.com/browserslist/browserslist>

### 3. Compile new styles: 
Files will need to be compiled after any changes.

In most cases, after you're done making changes you should compile styles and update js files from the bootstrap node_module. 

`npm run all`

Uncompiled: `npm run style` saves to dist/custom-bootstrap.css

Compiled: `npm run style-min` saves to dist/custom-bootstrap.min.css


## Include compiled files in the project
Be sure the custom-bootstrap.min.css file is being included in your project in your theme's global library (`themename.libraries.yml`)



