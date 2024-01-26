<?php

namespace App\Models\Domain;

use App\Models\User\User;
use App\Traits\Helper\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $id
 * @property string $name
 * @property string $user_id
 * @property string $default
 * @property string $belongs_to_system
 */
class Domain extends Model
{
    use HasFactory, Uuid;

    const DEFAULT_DOMAIN_ID = '1db87e74-8b85-404c-9efd-7f62c613d8b3';

    public static function staticCreate(string $name, string $userId, bool $default): static
    {
        $domain = new static();
        $domain->setName($name);
        $domain->setUserId($userId);
        $domain->setDefault($default);

        return $domain;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setUserId(string $userId): void
    {
        $this->user_id = $userId;
    }

    public function setDefault(bool $default): void
    {
        $this->default = $default;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class
        );
    }
}
