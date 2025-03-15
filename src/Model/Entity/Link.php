<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;
use Maymeow\TinyId\UuidShortener;

/**
 * Link Entity
 *
 * @property int $id
 * @property string $url
 * @property string $short_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class Link extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'url' => true,
        'short_id' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * base62encode
     *
     * @param float $num
     * @return string
     */
    protected function base62encode(float $num): string
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base = strlen($chars);
        $encoded = '';
        while ($num > 0) {
            $encoded = $chars[$num % $base] . $encoded;
            $num = floor($num / $base);
        }
        return $encoded;
    }

    public function setShortId(): void
    {
        $uuid = Text::uuid();
        $this->short_id = UuidShortener::encode($uuid, 36);
    }
}
