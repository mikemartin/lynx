# Lynx ![Statamic 2.0](https://img.shields.io/badge/statamic-2.0-blue.svg?style=flat-square)

Shorten share links with Bit.ly

This addon creates a modifier to shorten urls using the Bit.ly API

## Installation
1. Copy over the files into the `site` folder.
2. Add your [Bit.ly API key](http://dev.bitly.com/) in the `settings/addons/lynx.yaml` `api_key` parameter.
3. Shorten any url using the new `lynx` modifier!

## Example

```
{{ permalink | lynx }}
```
