<?php

namespace App\Serializer;

use App\Events\External\UserSignedUp;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Uid\Ulid;

class EventDenormalizer implements DenormalizerInterface
{
    public const EVENT_MAP = [
        'App\Event\User\UserSignedUp' => UserSignedUp::class
    ];

    /**
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     * @return mixed
     */
    public function denormalize(mixed $data, string $type, string $format = null, array $context = [])
    {
        $className = self::EVENT_MAP[$type];

        return new $className(id: Ulid::fromString($data['id']));
    }

    /**
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @return bool
     */
    public function supportsDenormalization(mixed $data, string $type, string $format = null)
    {
        return array_key_exists($type, self::EVENT_MAP);
    }
}