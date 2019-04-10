# Magento 2 Mailgun module

Send Magento's transactional e-mails with the [Mailgun API](http://www.mailgun.com/).

### Installation

Install using composer

```bash
composer require magemontreal/mailgun-magento2
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

#### 1.0.0
- Magento 2.2.8 and 2.3.1 compatibility
#### 0.1.9
- Using mailgun-php 2.4 the last version working with magento 2.2 - 2.2.6
- Forked from [Andelux/Mailgun-Magento2](https://github.com/andelux/Mailgun-Magento2)
#### 0.1.7
- Fixed error in attachments

#### 0.1.6
- Forked from [Bogardo/Mailgun-Magento2](https://github.com/Bogardo/Mailgun-Magento2)
- Fixed some bugs about recipients and attachments
 
