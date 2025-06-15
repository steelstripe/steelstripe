#!/bin/bash

# Copy public directory if it doesn't exist
if [ -e public ]; then
    echo "'public' already exists, skipping copy."
else
    cp -R packages/installer/public public
    echo "Copied 'public' directory."
fi

# Copy app directory if it doesn't exist
if [ -e app ]; then
    echo "'app' already exists, skipping copy."
else
    cp -R packages/installer/app app
    echo "Copied 'app' directory."
fi

# Copy .env.example if .env doesn't exist
if [ ! -f .env ] && [ -f packages/installer/.env.example ]; then
    cp packages/installer/.env.example .env
    echo "Created .env file from .env.example"
fi

echo "App setup complete!"