# Magento 2 Mailgun module

[![Latest Stable Version](https://poser.pugx.org/andelux/mailgun-magento2/v/stable?format=flat-square)](https://packagist.org/packages/andelux/mailgun-magento2)
[![Monthly Downloads](https://poser.pugx.org/andelux/mailgun-magento2/d/monthly?format=flat-square)](https://packagist.org/packages/andelux/mailgun-magento2)
[![License](https://poser.pugx.org/andelux/mailgun-magento2/license?format=flat-square)](https://packagist.org/packages/andelux/mailgun-magento2)

Send Magento's transactional e-mails with the [Mailgun API](http://www.mailgun.com/).

### Installation

Install using composer

```bash
composer require andelux/mailgun-magento2
```

### Configuration

Module configuration can be found in:  `Stores -> Configuration -> Services -> Mailgun`

Fill in your Mailgun Domain and your API Keys.
These can be found in your [Mailgun control panel](https://mailgun.com/app/dashboard).

Next, enable the module by setting the `Enabled` option to `Yes`.

### Usage

All transactional email that are send by your Magento application are now send using the Mailgun API.
You can access the mail logs in your [Mailgun control panel](https://mailgun.com/app/logs).

## Changelog

#### 0.0.1
- Forked from [Bogardo/Mailgun-Magento2](https://github.com/Bogardo/Mailgun-Magento2)
- Fixed some bugs about recipients and attachments
 
