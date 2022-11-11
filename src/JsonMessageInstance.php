<?php

declare(strict_types=1);

namespace StackOverflowTwilioPHPExamples;

use JsonSerializable;
use Twilio\Rest\Api\V2010\Account\MessageInstance;

/**
 * JsonMessageInterface is a delegator shim, of sorts, so that a JSON
 * representation of the MessageInstance object which it contains can be
 * retrieved.
 */
class JsonMessageInstance implements JsonSerializable
{
    private MessageInstance $messageInstance;

    public function __construct(MessageInstance $messageInstance)
    {
        $this->messageInstance = $messageInstance;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize(): mixed
    {
        // A list of the properties from MessageInstance to be render in the
        // JSON representation.
        $properties = [
            'accountSid' => '',
            'apiVersion' => '',
            'body' => '',
            'dateCreated' => '',
            'dateSent' => '',
            'dateUpdated' => '',
            'direction' => '',
            'errorCode' => '',
            'errorMessage' => '',
            'from' => '',
            'messagingServiceSid' => '',
            'numMedia' => '',
            'numSegments' => '',
            'price' => '',
            'priceUnit' => '',
            'sid' => '',
            'status' => '',
            'subresourceUris' => '',
            'to' => '',
            'uri' => '',
        ];

        // Retrieve the value of all of the properties above from the MessageInstance object.
        foreach ($properties as $property => &$value) {
            $properties[$property] = $this->messageInstance->$property;
        }

        return $properties;
    }
}