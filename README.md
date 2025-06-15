# SteelStripe Framework

A modern PHP framework focused on extensibility and performance.

## Installation

You can install the entire framework using Composer:

```bash
composer create-project steelstripe/installer my-project
```

Or install individual components:

```bash
composer require steelstripe/framework
composer require steelstripe/orm
composer require steelstripe/assets
composer require steelstripe/config
composer require steelstripe/versioning
```

## Project Structure

The SteelStripe framework is organized as a monorepo with the following components:

- `packages/framework`: The core framework
- `packages/orm`: Object-Relational Mapping
- `packages/assets`: Asset management
- `packages/config`: Configuration management
- `packages/versioning`: Version control and management
- `packages/installer`: Project template and installer

## Development

To work on the framework locally:

1. Clone the repository
2. Run `composer install` in the root directory
3. Each package can be developed independently

## Testing

Run tests for all packages:

```bash
composer test
```

Or test individual packages:

```bash
cd packages/framework && composer test
```

## License

Copyright (c) 2025 Damian Mooyman

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

3. Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.