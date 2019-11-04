<?php

namespace MageMontreal\Mailgun\Mail;

use Http\Adapter\Guzzle6\Client as HttpClient;
use Magento\Framework\Mail\TransportInterface;
use Mailgun\Mailgun;
use Mailgun\Messages\MessageBuilder;
use Mailgun\Messages\Exceptions\TooManyParameters;
use MageMontreal\Mailgun\Helper\Config;

class Transport
{
    /**
     * @var Config
     */
    private $mailgunConfig;

    /**
     * Transport constructor.
     *
     * @param Config $config
     *
     * @throws InvalidArgumentException
     */
    public function __construct(Config $config)
    {
        $this->mailgunConfig = $config;
    }

    /**
     * @param TransportInterface $subject
     * @param callable $proceed
     *
     * @throws MailException
     * @throws Zend_Exception
     */
    public function aroundSendMessage(
        TransportInterface $subject,
        callable $proceed
    ) {
        if ($this->mailgunConfig->enabled()) {
            try {
                $messageBuilder = $this->createMailgunMessage($this->parseMessage());

                $mailgun = new Mailgun($this->config->privateKey(), $this->getHttpClient(), $this->config->endpoint());
                $mailgun->setApiVersion($this->config->version());
                $mailgun->setSslEnabled($this->config->ssl());

                $mailgun->sendMessage($this->config->domain(), $messageBuilder->getMessage(), $messageBuilder->getFiles());
            } catch (\Exception $e) {

            }
        } else {
            $proceed();
        }
    }


    /**
     * @return array
     */
    protected function parseMessage()
    {
        $parser = new MessageParser($this->getMessage());

        return $parser->parse();
    }

    /**
     * @return HttpClient
     */
    protected function getHttpClient()
    {
        return new HttpClient();
    }

    /**
     * @param array $message
     *
     * @return MessageBuilder
     * @throws TooManyParameters
     */
    protected function createMailgunMessage(array $message)
    {
        $builder = new MessageBuilder();
        $builder->setFromAddress(reset($message['from']));
        $builder->setSubject($message['subject']);
        foreach ($message['to'] as $to) {
            $builder->addToRecipient($to);
        }

        foreach ($message['cc'] as $cc) {
            $builder->addCcRecipient($cc);
        }

        foreach ($message['bcc'] as $bcc) {
            $builder->addBccRecipient($bcc);
        }

        if ($message['html']) {
            $builder->setHtmlBody($message['html']);
        }

        if ($message['text']) {
            $builder->setTextBody($message['text']);
        }

        foreach ($message['attachments'] as $attachment) {
            $tempPath = tempnam(sys_get_temp_dir(), 'attachment');
            file_put_contents($tempPath, $attachment->getRawContent());
            $builder->addAttachment($tempPath, $attachment->filename);
        }

        return $builder;
    }
}
