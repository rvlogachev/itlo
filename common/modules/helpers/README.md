[![Yii2](https://img.shields.io/badge/required-Yii2_v2.0.40-blue.svg)](https://packagist.org/packages/yiisoft/yii2)
[![Downloads](https://img.shields.io/packagist/dt/wdmg/yii2-helpers.svg)](https://packagist.org/packages/wdmg/yii2-helpers)
[![Packagist Version](https://img.shields.io/packagist/v/wdmg/yii2-helpers.svg)](https://packagist.org/packages/wdmg/yii2-helpers)
![Progress](https://img.shields.io/badge/progress-ready_to_use-green.svg)
[![GitHub license](https://img.shields.io/github/license/wdmg/yii2-helpers.svg)](https://github.com/wdmg/yii2-helpers/blob/master/LICENSE)

<img src="./docs/images/yii2-helpers.png" width="100%" alt="Custom helpers for Yii2" />

# Yii2 Helpers
Custom helpers for Yii2

# Requirements 
* PHP 5.6 or higher
* Yii2 v.2.0.40 and newest

# Installation
To install the helpers, run the following command in the console:

`$ composer require "itlo-cms/helpers"`

# Status and version [ready to use]
* v.1.4.8 - Backward compatibility for PHP 5.6
* v.1.4.7 - Added `StringHelper::formatBytes()` method
* v.1.4.6 - Added `ExchangeRates` helper
* v.1.4.5 - Added methods for working with timezones `DateAndTime::getTimezones(...)`
* v.1.4.4 - Fixed `StringHelper::stripTags()`
* v.1.4.3 - Added `keyFirst()` and `keyLast()` methods to `ArrayHelper`
* v.1.4.2 - Added `genUUID()` and `flattenTree()` methods
* v.1.4.1 - Added string detection methods to `StringHelper`
* v.1.4.0 - Added `KeyboardLayoutHelper` and `DbSchemaTrait` for migrations
* v.1.3.6 - Fixed CIDR methods. Added IPv6 methods in `IpAddressHelper`
* v.1.3.5 - IpAddressHelper fixed
* v.1.3.4 - Added IpAddressHelper