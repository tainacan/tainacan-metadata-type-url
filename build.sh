echo "Compiling necessary stuff..."
cd ./tainacan-metadata-type-url/metadata_type/
npm install
npm run build
cd ../../

if [ -z "$1" ]
then
    echo "Done!"
else
    echo "Done. Moving files to destination folder: $1"
    rm -rf $1/tainacan-metadata-type-url
    cp -r ./tainacan-metadata-type-url $1
    echo "Cleaning some files not necessary for the plugin to work..."
    rm -f $1/tainacan-metadata-type-url/metadata_type/webpack.config.js
    rm -f $1/tainacan-metadata-type-url/metadata_type/package.json
    rm -f $1/tainacan-metadata-type-url/metadata_type/package-lock.json
    rm -f $1/tainacan-metadata-type-url/metadata_type/*.vue
    rm -f $1/tainacan-metadata-type-url/metadata_type/metadata-type.js
    rm -rf $1/tainacan-metadata-type-url/metadata_type/node_modules
    echo "Done!"
fi